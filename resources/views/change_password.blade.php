@extends('master')
@section('content')
<section class="contact-us section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Contact Form -->
                <div class="contact-form-area m-top-30">
                    @include('flash')
                    <h4>Login</h4>
                    <form class="form" method="post" action="{!! url('change_password') !!}">
                        @csrf
                        @if(\Illuminate\Support\Facades\Session::get('users')!=null)
                        <input type="hidden" name="token" value="{!! \Illuminate\Support\Facades\Session::get('users')->remember_token !!}" >
                        @endif
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <div class="icon"><i class="fa fa-envelope"></i></div>
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <div class="icon"><i class="fa fa-lock"></i></div>
                                    <input type="password" name="confirm_password" placeholder="Confirm Password">
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group button">
                                    <button type="submit" class="bizwheel-btn theme-2">Submit</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--/ End contact Form -->
            </div>

        </div>
    </div>
</section>
@endsection
