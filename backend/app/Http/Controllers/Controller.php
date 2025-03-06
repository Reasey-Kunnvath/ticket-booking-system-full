<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //base response
    public function successResponse($data, $message = "Success", $status = 200)
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];

        if ($data) {
            $response['data'] = $data;
        }

        return response()->json($response, $status);
    }

    public function forbiddenResponse($message = "Forbidden Resource")
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], 403);
    }


    public function unauthorizedResponse($message = "Unauthorized")
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], 401);
    }

    public function notFoundResponse($message = "Not Found!")
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], 404);
    }

    public function badRequestResponse($errors, $message = "Bad Request")
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ], 400);
    }

    public function conflictResponse($message = "Conflict")
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], 409);
    }
}
