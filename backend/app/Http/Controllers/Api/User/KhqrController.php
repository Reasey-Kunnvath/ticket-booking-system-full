<?php

namespace App\Http\Controllers\Api\User;

use App\Services\KhqrService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class KhqrController extends Controller
{
    protected $khqrService;

    public function __construct(KhqrService $khqrService)
    {
        $this->khqrService = $khqrService;
    }

    public function generate(Request $request): JsonResponse
    {
        $data = $request->validate([
            'type' => 'required|in:merchant,individual',
            'accountId' => 'required|string',
            'merchantName' => 'required_if:type,merchant|string',
            'merchantCity' => 'required_if:type,merchant|string',
            'merchantId' => 'required_if:type,merchant|string',
            'merchantBIC' => 'required_if:type,merchant|string',
            'username' => 'required_if:type,individual|string',
            'city' => 'required_if:type,individual|string',
            'optional.currency' => 'nullable|in:khr,usd',
            'optional.amount' => 'nullable|numeric|min:0',
            'optional.billNumber' => 'nullable|string',
            'optional.mobileNumber' => 'nullable|string',
            'optional.storeLabel' => 'nullable|string',
            'optional.terminalLabel' => 'nullable|string',
            'optional.expirationTimestamp' => 'nullable|integer',
        ]);

        $response = $this->khqrService->generateKhqr($data);
        return response()->json($response, $response['success'] ? 200 : 400);
    }

    public function verify(Request $request): JsonResponse
    {
        $data = $request->validate([
            'khqrString' => 'required|string',
        ]);

        $response = $this->khqrService->verifyKhqr($data['khqrString']);
        return response()->json($response, $response['success'] ? 200 : 400);
    }

    public function decode(Request $request): JsonResponse
    {
        $data = $request->validate([
            'khqrString' => 'required|string',
        ]);

        $response = $this->khqrService->decodeKhqr($data['khqrString']);
        return response()->json($response, $response['success'] ? 200 : 400);
    }

    public function deeplink(Request $request): JsonResponse
    {
        $data = $request->validate([
            'khqrString' => 'required|string',
            'callbackUrl' => 'required|url',
            'source.appIconUrl' => 'required|url',
            'source.appName' => 'required|string',
            'source.appDeepLinkCallback' => 'required|string',
        ]);

        $response = $this->khqrService->generateDeeplink($data);
        return response()->json($response, $response['success'] ? 200 : 400);
    }

    public function checkAccount(string $accountId): JsonResponse
    {
        $response = $this->khqrService->checkBakongAccount($accountId);
        return response()->json($response, $response['success'] ? 200 : 400);
    }
}