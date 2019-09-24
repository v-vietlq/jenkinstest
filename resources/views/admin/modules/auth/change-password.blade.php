@extends('admin.auth')

@section('content')
<div class="content d-flex justify-content-center align-items-center">

    <!-- Password recovery form -->
    <form class="login-form" method="POST" action="{{ route('auth.post.change_password',['token' => $token]) }}">
        @csrf
        @method('POST')
        
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">{{ __('form.change_pass.change_pass') }}</h5>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-right">
                    <input type="password" class="form-control" name="password" placeholder="{{ __('form.change_pass.password') }}">
                    <div class="form-control-feedback">
                        <i class="icon-mail5 text-muted"></i>
                    </div>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-right">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="{{ __('form.change_pass.password_confirm') }}">
                        <div class="form-control-feedback">
                            <i class="icon-mail5 text-muted"></i>
                        </div>
                    </div>

                <button type="submit" class="btn bg-blue btn-block"><i class="icon-spinner11 mr-2"></i> {{ __('form.change_pass.change') }}</button>
            </div>
        </div>
    </form>
    <!-- /password recovery form -->

</div>
@endsection