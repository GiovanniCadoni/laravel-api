<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('type')->paginate(10);
        return response()->json([
            'results' => $posts,
            'success' => true,
        ]);
    }

    public function show($slug) {
        $post = Post::with('type')->where('slug', $slug)->first();
        
        if($post) {
            return response()->json([
                'results' => $post,
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Nessun post trovato',
            ]);
        }
    }
}
