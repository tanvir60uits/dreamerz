@extends('master')
@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=197726911039738&autoLogAppEvents=1" nonce="q1oeKG00"></script>


@if(\Illuminate\Support\Facades\Session::get('token')!=null && \Illuminate\Support\Facades\Session::get('users')!=null)
@if(\Illuminate\Support\Facades\Session::get('token') == \Illuminate\Support\Facades\Session::get('users')->remember_token)
<h4>Mr {!! \Illuminate\Support\Facades\Session::get('users')!=null ? \Illuminate\Support\Facades\Session::get('users')->name: null !!} Successfully Login.</h4>
<br> <a href="{!! url('logout') !!}">Logout</a><br>

@endif
@else
<div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
<div class="card-body">
    @include('flash')

    <form class="loginForm" method="post" action="{!! url('login_submit') !!}">
        @csrf
        <div class="form-group">
            <label class="small mb-1">Email</label>
            <input class="form-control py-4" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label class="small mb-1">Password</label>
            <input class="form-control py-4" type="password" name="password" placeholder="Password">
        </div>

        <div class="form-group button">
            <button type="submit" class="btn btn-primary">Login</button><br>
            <a href="{!! url('email_check_view') !!}">Forget Password?</a><br>
            <a href="{!! url('registration') !!}">Not Registered?</a><br>
            <div class="fb-login-button" data-size="small" data-button-type="login_with" data-layout="rounded" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>
        </div>
    </form>
</div>
@endif

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
