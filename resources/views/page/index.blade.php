@extends('layouts.main')

@section('title')
All Pages
@endsection

@section('content')
    <h1>All Pages</h1>
    @foreach($pages as $page)
        @include('page.teaser', array('type'=> 'main', 'subtitle'=>false, 'byline'=>true, 'headlineSize'=>2))
    @endforeach
@endsection