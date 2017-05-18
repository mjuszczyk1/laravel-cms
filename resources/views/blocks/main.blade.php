@extends('layouts.main')

@section('title')
    {{!empty($block->title) ? $block->title : "Page"}}
@endsection

@section('content')

@include('partials.pageHeader')

<article>
    <div class="page-header">
        <h1 class="d-inline-block">{{$block->title}}</h1>
        @if(Auth::user())
            <div class="post-controls d-inline-block float-right mt-2">
                <button class="btn btn-warning p-0"><a href="{{$block->url('edit')}}" class="d-block py-2 px-3 text-white">Edit</a></button>
                <button class="btn btn-danger p-0"><a href="{{$block->url('delete')}}" class="d-block py-2 px-3 text-white">Delete</a></button>
            </div>
        @endif
    </div>
    <div class="page-body">
        <p>{!! nl2br(e($block->body)) !!}</p>
        <hr>
        @if(!empty($block->area))
           <p><strong>Area</strong>: {{$block->area}}</p>
        @endif
        <hr>
        @if(!empty($block->page_slug))
           <p><strong>Page Slug</strong>: <a href="/page/{{$block->page_slug}}">{{$block->page_slug}}</a></p>
        @endif
        <hr>
       <p><strong>Weight</strong>: {{$block->weight}}</p>
    </div>
</article>

@include('partials.pageFooter')

@endsection