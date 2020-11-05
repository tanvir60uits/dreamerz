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

                    <form class="form" method="post" action="{!! url('email_verify_code') !!}">
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
