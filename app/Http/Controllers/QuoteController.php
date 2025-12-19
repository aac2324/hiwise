<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::latest()->paginate(10);
        return view('quotes.index', compact('quotes'));
    }

    public function latest()
    {
        $quotes = Quote::latest()->take(10)->get();
        return view('quotes.latest', compact('quotes'));
    }

    public function show(Quote $quote)
    {
        return view('quotes.show', compact('quote'));
    }
}
