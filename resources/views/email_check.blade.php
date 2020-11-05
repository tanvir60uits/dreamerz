@extends('master')
@section('content')
<div class="card-header"><h3 class="text-center font-weight-light my-4">Forget Password</h3></div>
<div class="card-body">
    @include('flash')
    <form class="form" method="post" action="{!! url('email_check') !!}">
        @csrf
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="form-group">
                    <label class="small mb-1">Enter Email</label>
                    <input class="form-control py-4" type="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group button">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!--/ End contact Form -->

@endsection
