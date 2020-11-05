@extends('master')
@section('content')
<section class="contact-us section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Contact Form -->
                <div class="contact-form-area m-top-30">
                    <h4>Verify Email</h4>
                    @include('flash')

                    <form class="passwordVerify" method="post" action="{!! url('password_verify_code') !!}">
                        @if(\Illuminate\Support\Facades\Session::get('users')!=null)
                            <input type="hidden" name="token" value="{!! \Illuminate\Support\Facades\Session::get('users')->remember_token !!}" >
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <div class="icon"><i class="fa fa-envelope"></i></div>
                                    <input type="number" name="securitypin" placeholder="Code">
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

@section('js')


    <script>
        $(document).ready(function() {
            $('.passwordVerify').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    securitypin: {
                        message: 'The Security Pin Is Required',
                        validators: {
                            notEmpty: {
                                message: 'The Security Pin Is Required'
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
