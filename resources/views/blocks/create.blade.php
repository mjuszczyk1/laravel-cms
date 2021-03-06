@extends('layouts.main')

@section('title')
Add Block
@endsection

@section('content')
<h1>Add Block</h1>
@include ('partials.errors')

<form method="POST">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
    </div>
    <div class="form-group">
        <label for="body">Body<sup>*</sup>:</label>
        <textarea class="form-control" id="body" name="body" required>{{old('body')}}</textarea>
    </div>
    <div class="form-group">
        <label for="page_slug">Page Slug:</label>
        <input type="text" class="form-control" id="page_slug" name="page_slug" value="{{old('page_slug')}}">
    </div>
    <div class="form-group">
        <label for="area">Area:</label>
        <input type="text" class="form-control" id="area" name="area" value="{{old('area')}}">
    </div>
    <div class="form-group">
        <label for="weight">Weight:</label>
        <input type="text" class="form-control" id="weight" name="weight" value="{{old('weight')}}">
    </div>
    <div class="form-group">
        <button type="submit" class="btn">Submit</button>
    </div>
</form>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function(){
            $('input#page_slug').keyup(function(e){
                if (e['key'] == ' ') {
                    this.value = this.value.replace(/ /g, "-");
                }
            });
        });
    </script>
@endsection