<?php
namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class KhqrService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.khqr.base_url');
        $this->apiKey = config('services.khqr.api_key');
    }

    /**
     * Generate a KHQR code (Merchant or Individual)
     */
    public function generateKhqr(array $data): array
    {
        return $this->post('/khqr/generate', $data);
    }

    /**
     * Verify a KHQR code
     */
    public function verifyKhqr(string $khqrString): array
    {
        return $this->post('/khqr/verify', ['khqrString' => $khqrString]);
    }

    /**
     * Decode a KHQR code
     */
    public function decodeKhqr(string $khqrString): array
    {
        return $this->post('/khqr/decode', ['khqrString' => $khqrString]);
    }

    /**
     * Generate a deeplink for payment apps
     */
    public function generateDeeplink(array $data): array
    {
        return $this->post('/khqr/deeplink', $data);
    }

    /**
     * Check Bakong account validity
     */
    public function checkBakongAccount(string $accountId): array
    {
        return $this->get("/account/check?accountId={$accountId}");
    }

    /**
     * Generic POST request to KHQR API
     */
    protected function post(string $endpoint, array $data): array
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer " . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post("{$this->baseUrl}{$endpoint}", $data);

            return $this->handleResponse($response);
        } catch (\Exception $e) {
            Log::error('KHQR API POST Error', ['endpoint' => $endpoint, 'error' => $e->getMessage()]);
            return [
                'success' => false,
                'error' => 'Server error occurred',
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * Generic GET request to KHQR API
     */
    protected function get(string $endpoint): array
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer {$this->apiKey}",
                'Content-Type' => 'application/json',
            ])->get("{$this->baseUrl}{$endpoint}");

            return $this->handleResponse($response);
        } catch (\Exception $e) {
            Log::error('KHQR API GET Error', ['endpoint' => $endpoint, 'error' => $e->getMessage()]);
            return ['success' => false, 'error' => 'Server error occurred'];
        }
    }

    /**
     * Handle API response and rate limiting
     */
    protected function handleResponse(Response $response): array
    {
        if ($response->successful()) {
            return $response->json();
        }

        if ($response->status() === 429) {
            $resetInSeconds = $response->header('X-RateLimit-Reset') ?? 60;
            return [
                'success' => false,
                'error' => "Rate limit exceeded. Try again in {$resetInSeconds} seconds.",
            ];
        }

        return [
            'success' => false,
            'error' => $response->json()['error']['message'] ?? 'Unknown error',
        ];
    }
}