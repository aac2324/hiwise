@extends('layouts.app')

@section('content')
<h1>Create Quote</h1>
<form method="POST" action="{{ route('management.quotes.store') }}">
    @csrf
    <textarea name="text" required></textarea>
    <input type="text" name="author">
    <button type="submit">Save</button>
</form>
@endsection
