@extends('layouts.app')

@section('content')
<h1>Manage Quotes</h1>
<a href="{{ route('management.quotes.create') }}">Create New</a>
<ul>
@foreach($quotes as $quote)
    <li>{{ $quote->text }} — {{ $quote->author }}</li>
@endforeach
</ul>
{{ $quotes->links() }}
@endsection
