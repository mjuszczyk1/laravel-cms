@extends('layouts.main')

@section('title')
Different titles can go here.
@endsection

@section('content')
    @if(!empty($ctas))
        <div class="row">
            @foreach($ctas as $cta)
                <div class="col-4 text-center">
                    <h1>{{$cta[0]->title}}</h1>
                    <p>{{$cta[0]->body}}</p>
                </div>
            @endforeach
        </div>
    @endif
@endsection

@section('scripts')
    <script type="text/javascript">
    </script>
@endsection