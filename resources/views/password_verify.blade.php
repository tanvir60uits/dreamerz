@extends('master')
@section('content')
<div class="card-header"><h3 class="text-center font-weight-light my-4">Verification Code</h3></div>
<div class="card-body">
    @include('flash')

    <form class="passwordVerify" method="post" action="{!! url('password_verify_code') !!}">
        @if(\Illuminate\Support\Facades\Session::get('users')!=null)
        <input type="hidden" name="token" value="{!! \Illuminate\Support\Facades\Session::get('users')->remember_token !!}" >
        @endif
        @csrf

        <div class="form-group">
            <label class="small mb-1">Enter Security Code</label>
            <input class="form-control py-4" type="number" name="securitypin" placeholder="Code">
        </div>
        <div class="form-group button">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div>
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
