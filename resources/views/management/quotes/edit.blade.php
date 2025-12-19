@extends('layouts.app')

@section('content')
<h1>Edit Quote</h1>
<form method="POST" action="{{ route('management.quotes.update', $quote) }}">
    @csrf
    @method('PUT')
    <textarea name="text" required>{{ $quote->text }}</textarea>
    <input type="text" name="author" value="{{ $quote->author }}">
    <button type="submit">Update</button>
</form>
@endsection
