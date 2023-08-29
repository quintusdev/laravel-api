<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        /* Metto tutti i valori della classe Post dentro la variabile */
        $posts = Post::with('type', 'tecnologies')->get();

        return response()->json([
            /* imposto il valore success su true */
            'success' => true,
            /* dentro a results metto tutti i post */
            'results' => $posts
        ]);
    }
}
