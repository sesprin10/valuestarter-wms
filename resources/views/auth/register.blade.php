@php
    use \Illuminate\Support\Facades\Session;
    $errors = Session::get('validation_errors');
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>{{ __('Register') }}</title>

        <link rel="stylesheet" href="{{ asset(Constants::COREUI_CSS_STYLE) }}">
    </head>
    <body class="c-app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="post" action="{{ route('user.register') }}">@csrf
                        <div class="card mx-4">
                            <div class="card-body p-4">
                                <h1>{{ __('Register') }}</h1>
                                <p class="text-muted">{{ __('Create your account') }}</p>
                                @if($errors != null && count($errors) > 0)
                                    <div class="card-body border-danger mb-3 text-danger">
                                        <h6 class="h6">{{ __('Registration failed') }}</h6>
                                        <ul>
                                            @foreach($errors as $error)
                                                <li>{{ $error[0] }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label for="input_name" hidden></label>
                                        <span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="{{ Constants::get_svg(Constants::COREUI_ICONS_SVG_FREE, 'cil-user') }}"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <input name="name" id="input_name" class="form-control @if(isset($errors['name'])) is-invalid @endif" type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label for="input_email" hidden></label>
                                        <span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="{{ Constants::get_svg(Constants::COREUI_ICONS_SVG_FREE, 'cil-at') }}"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <input name="email" id="input_email" class="form-control @if(isset($errors['email'])) is-invalid @endif" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label for="input_password" hidden></label>
                                        <span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="{{ Constants::get_svg(Constants::COREUI_ICONS_SVG_FREE, 'cil-lock-locked') }}"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <input name="password" id="input_password" class="form-control @if(isset($errors['password'])) is-invalid @endif" type="password" placeholder="{{ __('Password') }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label for="input_confirm" hidden></label>
                                        <span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="{{ Constants::get_svg(Constants::COREUI_ICONS_SVG_FREE, 'cil-lock-locked') }}"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <input name="password_confirmation" id="input_confirm" class="form-control @if(isset($errors['password'])) is-invalid @endif" type="password" placeholder="{{ __('Confirm Password') }}">
                                </div>
                                <button name="password_c" class="btn btn-primary btn-block" type="submit">{{ __('Create Account') }}</button>
                            </div>
                            <div class="card-footer p-4">
                                <div class="row justify-content-center">
                                    <span>{{ __('Already have an account?') }}</span>
                                    &nbsp;{{ 'Log in' }}&nbsp;
                                    <a href="{{ route('view.login') }}">{{ __('here') }}</a>.
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="{{ asset(Constants::COREUI_JS_COREUIBUNDLE) }}"></script>
        <script src="{{ asset(Constants::COREUI_ICONS_JS_SVGXUSE) }}"></script>
    </body>
</html>
