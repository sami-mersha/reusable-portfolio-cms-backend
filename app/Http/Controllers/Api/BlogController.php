<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    /**
     * Get paginated blogs (optionally filter by category)
     */
    public function index(Request $request)
    {
        $query = Blog::query()
            ->with(['category'])
            ->withCount('comments')
            ->where('is_published', true)
            ->latest();

        // Filter BEFORE pagination
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // PAGINATE FIRST (important)
        $blogs = $query->paginate(10);

        // Transform after pagination
        $blogs->getCollection()->transform(function ($blog) {
            if ($blog->cover_image) {
                $blog->cover_image = Storage::url($blog->cover_image);
            }

            return $blog;
        });

        return response()->json($blogs);
    }

    /**
     * Get single blog by slug with approved comments
     */
    public function show(string $slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('is_published', true)
            ->with([
                'category',
                'comments' => function ($query) {
                    $query->where('is_approved', true)
                          ->latest();
                }
            ])
            ->firstOrFail();

        if ($blog->cover_image) {
            $blog->cover_image = Storage::url($blog->cover_image);
        }

        return response()->json($blog);
    }

    /**
     * Search blogs by title or content
     */
    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required|string|min:2'
        ]);

        $q = $request->q;

        $blogs = Blog::query()
            ->where('is_published', true)
            ->where(function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                      ->orWhere('content', 'like', "%{$q}%")
                      ->orWhere('excerpt', 'like', "%{$q}%");
            })
            ->with(['category'])
            ->latest()
            ->paginate(10);

        //fix cover image URLs after pagination
        $blogs->getCollection()->transform(function ($blog) {
            if ($blog->cover_image) {
                $blog->cover_image = Storage::url($blog->cover_image);
            }
            return $blog;
        });

        return response()->json($blogs);
    }
}
