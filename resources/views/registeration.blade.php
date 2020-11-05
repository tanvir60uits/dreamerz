@extends('master')
@section('content')
<section class="contact-us section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-12">
                <!-- Contact Form -->
                <div class="contact-form-area m-top-30">
                    <h4>Registration</h4>
                    @include('flash')

                    <form class="registerForm" method="post" action="{!! url('registration_submit') !!}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <input type="text" name="name" placeholder="Name">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <div class="icon"><i class="fa fa-envelope"></i></div>
                                    <input type="email" name="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <div class="icon"><i class="fa fa-phone"></i></div>
                                    <input type="tel" name="phone" placeholder="phone">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <div class="icon"><i class="fa fa-lock"></i></div>
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <div class="icon"><i class="fa fa-lock"></i></div>
                                    <input type="password" name="confirmPassword" placeholder="Confirm Password">
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group button">
                                    <button type="submit" class="bizwheel-btn theme-2">Submit</button>
                                    <a href="{!! url('/') !!}">Registered? Click Here.</a>

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
