<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display authors.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {

            $authors = Author::cursor();

            return response()->json(
                [
                    'authors' => $authors,
                ],
                200
            );
        } catch (\Exception $e) {
            $message = __('Something went wrong');

            Log::error($e->getMessage(), [
                'method' => __METHOD__,
                'error' => $e
            ]);

            return response()->json(
                [
                    'error' => [
                        'message' => $message,
                    ],
                ],
                500
            );
        }
    }
}
