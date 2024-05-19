<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category1;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');

        if (!empty($category)) {
            // Filter by category ID
            $postData = Post::where('status', 'Published')
                ->where('category1_id', $category)
                ->paginate(10);
        } elseif (!empty($query)) {
            // Perform search query
            $postData = Post::where('status', 'Published')
                ->where(function ($queryBuilder) use ($query) {
                    $queryBuilder->where('title', 'like', '%' . $query . '%')
                        ->orWhere('category1_id', 'like', '%' . $query . '%');
                })
                ->paginate(10);
        } else {
            // Default case: show all published posts
            $postData = Post::where('status', 'Published')->paginate(10);
        }

        $categories = Category1::all();
        return view('homescreen', compact('postData', 'categories'));
    }

    public function masterPage($slug)
    {
        $data = Post::where('slug', $slug)->first();
        return view('masterPage', compact('data'));
    }
}
