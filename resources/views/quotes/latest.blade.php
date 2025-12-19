@extends('layouts.app')

@section('content')
<h1>Latest Quotes</h1>
<ul>
@foreach($quotes as $quote)
    <li>{{ $quote->text }} — {{ $quote->author }}</li>
@endforeach
</ul>
@endsection
