@extends('master')
@section('content')
<div class="card-header"><h3 class="text-center font-weight-light my-4">Verification Code</h3></div>
<div class="card-body">
    @include('flash')

    <form class="form" method="post" action="{!! url('email_verify_code') !!}">
        @csrf
        <div class="form-group">
            <label class="small mb-1">Enter Security Code</label>
            <input class="form-control py-4" type="number" name="securitypin" placeholder="Code">
        </div>

        <div class="form-group button">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection
