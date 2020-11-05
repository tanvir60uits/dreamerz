@extends('master')
@section('content')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=197726911039738&autoLogAppEvents=1" nonce="q1oeKG00"></script>
<section class="contact-us section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Contact Form -->
                <div class="contact-form-area m-top-30">

                    @if(\Illuminate\Support\Facades\Session::get('token')!=null && \Illuminate\Support\Facades\Session::get('users')!=null)
                    @if(\Illuminate\Support\Facades\Session::get('token') == \Illuminate\Support\Facades\Session::get('users')->remember_token)
                        <h4>Mr {!! \Illuminate\Support\Facades\Session::get('users')!=null ? \Illuminate\Support\Facades\Session::get('users')->name: null !!} Successfully Login.</h4>
                            <br> <a href="{!! url('logout') !!}">Logout</a><br>

                        @endif
                    @else
                        @include('flash')
                        <h4>Login</h4>
                        <form class="loginForm" method="post" action="{!! url('login_submit') !!}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <div class="icon"><i class="fa fa-envelope"></i></div>
                                        <input type="email" name="email" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <div class="icon"><i class="fa fa-lock"></i></div>
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-group button">
                                        <button type="submit" class="bizwheel-btn theme-2">Submit</button>
                                        <a href="{!! url('registration') !!}">Not Registered? Click Here.</a><br>
                                        <a href="{!! url('email_check_view') !!}">Forget Password? Click Here.</a><br>
                                        <div class="fb-login-button" data-size="small" data-button-type="login_with" data-layout="rounded" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif

                </div>
                <!--/ End contact Form -->
            </div>

        </div>
    </div>
</section>
@endsection

@section('js')


    <script>
        $(document).ready(function() {
            $('.loginForm').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    email: {
                        message: 'The Email is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Email is required and cannot be empty'
                            },

                        }
                    },

                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Password is required'
                            }
                        }
                    }
                }
            });
        });
    </script>

@endsection
