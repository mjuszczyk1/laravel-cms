@extends('layouts.main')

@section('title')
All Blocks
@endsection

@section('content')
    <h1>All Blocks</h1>
    @foreach($blocks as $block)
        @include('blocks.teaser', array('type'=> 'main', 'subtitle'=>false, 'byline'=>true, 'headlineSize'=>2))
    @endforeach
@endsection