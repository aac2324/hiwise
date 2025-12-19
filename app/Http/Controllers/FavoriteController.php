<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $favorites = $user ? $user->favorites()->with('quote')->get() : collect();
        return view('favorites.index', compact('favorites'));
    }

    public function store(Request $request, Quote $quote)
    {
        $user = Auth::user();
        if (! $user) {
            return redirect()->route('login');
        }

        $user->favorites()->firstOrCreate([
            'quote_id' => $quote->id,
        ]);

        return back();
    }

    public function destroy(Quote $quote)
    {
        $user = Auth::user();
        if ($user) {
            $user->favorites()->where('quote_id', $quote->id)->delete();
        }
        return back();
    }
}
