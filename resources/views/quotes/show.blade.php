@extends('layouts.app')

@section('content')
<article>
    <p>{{ $quote->text }}</p>
    <p><em>{{ $quote->author }}</em></p>
</article>
@endsection
