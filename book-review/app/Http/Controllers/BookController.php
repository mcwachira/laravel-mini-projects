<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = $request->input('title');
        $filter = $request->input('filter');


        // Step 1: Build the base query
        $books = Book::when($title, fn($query, $title) => $query->title($title));

        // Step 2: Apply any filters

        $books = match($filter) {
            'popular_last_month' => $books->popularLastMonth(),
            'popular_last_6months' => $books->popularLast6Months(),
            'highest_rated_month' => $books->highestRatedLastMonth(),
                'highest_rated_6months' => $books->highestRatedLast6Months(),
            default => $books->latest()->WithAverageRating()->withReviewsCount(),
        };

        // Step 3: Create a unique cache key
        $cacheKey = 'books:' . ($filter ?? 'default') . ':' . ($title ?? 'all');

        // Step 4: Use Cache::remember() before executing query
        $books = Cache::remember($cacheKey, 3600, function () use ($books) {
//            dd('Not from cache');
            return $books->get();
        });

        // Step 5: Return the view
        return view('books.index', ['books' => $books]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $cacheKey = 'book:' . $id;
        $book = Cache::remember($cacheKey, 3600, function () use ($id) {
         return Book::with([
               'reviews' => fn($query) => $query->latest()
           ])->WithAverageRating()->withReviewsCount()->findOrFail($id);
        });
        return view(
            'books.show',
            [
                'book' => $book
    ]
    );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
