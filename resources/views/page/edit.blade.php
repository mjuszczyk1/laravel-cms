@extends('layouts.main')

@section('title')
Edit Page
@endsection

@section('content')
<h1>Add Page</h1>
@include ('partials.errors')
<form method="POST">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">Title<sup>*</sup>:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$page->title}}" required autofocus>
    </div>
    <div class="form-group">
        <label for="sub_title">Sub title:</label>
        <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{$page->sub_title}}">
    </div>
    <div class="form-group">
        <label for="body">Body<sup>*</sup>:</label>
        <textarea class="form-control" id="body" name="body" required>{{$page->body}}</textarea>
    </div>
    <div class="form-group">
        <label for="abstract">Abstract<sup>*</sup>:</label>
        <textarea class="form-control" id="abstract" name="abstract">{{$page->abstract}}</textarea>
    </div>
    <div class="form-group">
        <label for="slug">Slug:</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{$page->slug}}">
    </div>
    <div class="form-group">
        <button type="submit" class="btn">Submit</button>
    </div>
</form>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function(){
            $('input#slug').keyup(function(e){
                if (e['key'] == ' ') {
                    this.value = this.value.replace(/ /g, "-");
                }
            });
        });
    </script>
@endsection