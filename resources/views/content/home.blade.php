@extends('layouts.main')

@section('title')
@endsection

@section('content')
    @unless(empty($ctas))
        <div class="row">
            @foreach($ctas as $cta)
                @unless(empty($cta))
                    @include('blocks.embed.cta')
                @endunless
            @endforeach
        </div>
    @endunless

    <form method="POST" action="requestConsult" class="row">
        <div class="col-12">
            <h2>Request a Consultation</h2>
        </div>
        {{csrf_field()}}
        <div class="form-group col-6">
            <label for="fullName">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="fullName" value="{{old('fullName')}}" required>
        </div>
        <div class="form-group col-6">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" required>
        </div>
        <div class="form-group col-6">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" required>
        </div>
        <div class="form-group col-6">
            <label for="unit">OSE Unit / GFI</label>
            <input type="text" class="form-control" id="unit" name="unit" value="{{old('unit')}}" required>
        </div>
        <div class="form-group col-8">
            <label for="need">What is your communication need?</label>
            <input type="text" class="form-control" id="need" name="need" value="{{old('need')}}" required>
        </div>
        <div class="form-group col-4 mt-2">
            <br>
            <button type="submit" class="btn ml-auto">Submit</button>
        </div>
    </form>
</form>
@endsection

@section('scripts')
    <script type="text/javascript">
    </script>
@endsection