@extends('layouts.app')

@section('content')
<h1>Your Favorites</h1>
<ul>
@foreach($favorites as $fav)
    <li>{{ $fav->quote->text }} — {{ $fav->quote->author }}</li>
@endforeach
</ul>
@endsection
