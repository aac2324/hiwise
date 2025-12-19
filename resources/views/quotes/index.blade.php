@extends('layouts.app')

@section('content')
<h1>Quotes</h1>
<ul>
@foreach($quotes as $quote)
    <li><a href="{{ route('quotes.show', $quote) }}">{{ $quote->text }}</a> — {{ $quote->author }}</li>
@endforeach
</ul>
{{ $quotes->links() }}
@endsection
