@extends('master')
@section('content')
<section class="contact-us section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Contact Form -->
                <div class="contact-form-area m-top-30">
                    <h4>Forget Password</h4>
                    <form class="form" method="post" action="{!! url('email_check') !!}">

                        @include('flash')

                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <div class="icon"><i class="fa fa-envelope"></i></div>
                                    <input type="email" name="email" placeholder="Email">
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
