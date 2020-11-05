@extends('master')
@section('content')
<div class="card-header"><h3 class="text-center font-weight-light my-4">New Register</h3></div>
<div class="card-body">
    @include('flash')

    <form class="registerForm" method="post" action="{!! url('registration_submit') !!}">
        @csrf

        <div class="form-group">
            <label class="small mb-1">Enter Name</label>
            <input class="form-control py-4" type="text" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label class="small mb-1">Enter Email</label>
            <input class="form-control py-4" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label class="small mb-1">Enter Phone</label>
            <input class="form-control py-4" type="tel" name="phone" placeholder="phone">
        </div>

        <div class="form-group">
            <label class="small mb-1">Enter Password</label>
            <input class="form-control py-4" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label class="small mb-1">Confirm Password</label>
            <input class="form-control py-4" type="password" name="confirmPassword" placeholder="Confirm Password">
        </div>

        <div class="form-group button">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{!! url('/') !!}">Already Registered? Login Here</a>

        </div>

    </form>
</div>

@endsection

@section('js')


<script>
    $(document).ready(function() {
        $('.registerForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The name is required and cannot be empty'
                        },

                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'The phone is required and cannot be empty'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Password is required'
                        },
                        identical: {
                            field: 'confirmPassword',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                },
                confirmPassword: {
                    validators: {
                        notEmpty: {
                            message: 'Confirm password is required'
                        },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                }
            }
        });
    });
</script>

@endsection
