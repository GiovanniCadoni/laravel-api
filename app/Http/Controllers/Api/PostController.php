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
}