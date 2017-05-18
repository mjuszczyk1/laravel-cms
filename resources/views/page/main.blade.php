@extends('layouts.main')

@section('title')
    {{!empty($data[0]->title) ? $data[0]->title : "Page"}}
@endsection

@section('content')

@include('partials.pageHeader')

<article>
    <div class="page-header">
        <h1 class="d-inline-block">{{$data[0]->title}}</h1>
        @if(Auth::user())
            <div class="post-controls d-inline-block float-right mt-2">
                <button class="btn btn-warning p-0"><a href="{{$data[0]->url('edit')}}" class="d-block py-2 px-3 text-white">Edit</a></button>
                <button class="btn btn-danger p-0"><a href="{{$data[0]->url('delete')}}" class="d-block py-2 px-3 text-white">Delete</a></button>
            </div>
        @endif
        @if(!empty($data[0]->sub_title))
            <h2 class="">{{$data[0]->sub_title}}</h2>
        @endif
    </div>
    <div class="page-body">
        <p>{!! nl2br(e($data[0]->body)) !!}</p>
    </div>
</article>

@include('partials.pageFooter')

@endsection