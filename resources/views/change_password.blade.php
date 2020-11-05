@extends('master')
@section('content')
<div class="card-header"><h3 class="text-center font-weight-light my-4">Set Password</h3></div>
<div class="card-body">
    @include('flash')
    <form class="form" method="post" action="{!! url('change_password') !!}">
        @csrf
        @if(\Illuminate\Support\Facades\Session::get('users')!=null)
        <input type="hidden" name="token" value="{!! \Illuminate\Support\Facades\Session::get('users')->remember_token !!}" >
        @endif

        <div class="form-group">
            <label class="small mb-1">Enter Password</label>
            <input class="form-control py-4" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label class="small mb-1">Confirm Password</label>
            <input class="form-control py-4" type="password" name="confirm_password" placeholder="Confirm Password">
        </div>

        <div class="form-group button">
            <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </form>
</div>
<!--/ End contact Form -->

@endsection
