@extends('admin.auth')

@section('content')
<div class="content d-flex justify-content-center align-items-center">

    <!-- Login form -->
    <form class="login-form" method="POST" action="{{ route('auth.post.login') }}">
        @csrf
        @method('POST')
        
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">{{ __('form.login.login') }}</h5>
                    <span class="d-block text-muted">{{ __('form.login.enter_info') }}</span>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control" name="email" placeholder="{{ __('form.login.email') }}">
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" class="form-control" name="password" placeholder="{{ __('form.login.password') }}">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('form.login.login') }} <i class="icon-circle-right2 ml-2"></i></button>
                </div>

                <div class="text-center">
                    <a href="{{ route('auth.get.forgot') }}">{{ __('form.login.forgot') }}</a>
                </div>
            </div>
        </div>
    </form>
    <!-- /login form -->

</div>
@endsection