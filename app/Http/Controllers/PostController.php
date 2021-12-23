<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display posts.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {

            $posts = Post::cursor();
            $result = [];
            foreach ($posts as $post) {
                $post['category'] = $post->category;
                $post['media'] = $post->media;
                $post['content'] = $post->content;
                array_push($result, $post);
            }

            return response()->json(
                [
                    'posts' => $result
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
