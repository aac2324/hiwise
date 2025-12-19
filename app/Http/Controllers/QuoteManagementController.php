<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteManagementController extends Controller
{
    public function index()
    {
        $quotes = Quote::paginate(20);
        return view('management.quotes.index', compact('quotes'));
    }

    public function create()
    {
        return view('management.quotes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'text' => 'required|string',
            'author' => 'nullable|string',
        ]);

        Quote::create($data);

        return redirect()->route('management.quotes.index');
    }

    public function edit(Quote $quote)
    {
        return view('management.quotes.edit', compact('quote'));
    }

    public function update(Request $request, Quote $quote)
    {
        $data = $request->validate([
            'text' => 'required|string',
            'author' => 'nullable|string',
        ]);

        $quote->update($data);

        return redirect()->route('management.quotes.index');
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();
        return redirect()->route('management.quotes.index');
    }
}
