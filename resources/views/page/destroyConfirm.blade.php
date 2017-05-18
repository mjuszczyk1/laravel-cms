@extends('layouts.main')

@section('title')
Delete {{!empty($data[0]->title) ? $data[0]->title : "Page"}}
@endsection

@section('content')
<div class="col-sm-12">
    <h1>Are you sure you would like to delete <span class="text-danger">{{$page->title}}</span>?</h1>
    <button class="btn btn-info d-inline-block p-0"><a href="/page/{{!empty($page->slug) ? $page->slug : $page->id}}" class="d-block px-3 py-2 text-white">Never mind!</a></button>
    <form method="POST" class="d-inline-block">
        {{csrf_field()}}
        <div class="form-group">
            <button type="submit" class="btn btn-danger">I'm sure, delete!</button>
        </div>
    </form>
</div>
@endsection