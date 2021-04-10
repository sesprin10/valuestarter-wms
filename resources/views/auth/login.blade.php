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

        <title>{{ __('Login') }}</title>

        <link rel="stylesheet" href="{{ Constants::COREUI_CSS_STYLE }}">
    </head>
    <body class="c-app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-group">
                        <div class="card p-4">
                            <form method="post" action="{{ route('user.login') }}">@csrf
                                <div class="card-body">
                                    <h1>{{ __('Login') }}</h1>
                                    <p class="text-muted">{{ __('Sign In to your account') }}</p>
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
                                            <label for="input_email" hidden></label>
                                            <span class="input-group-text">
                                                <svg class="c-icon">
                                                    <use xlink:href="{{ Constants::get_svg(Constants::COREUI_ICONS_SVG_FREE, 'cil-at') }}"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <input name="email" id="input_email" class="form-control @if(isset($errors['all']) || isset($errors['email'])) is-invalid @endif" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}">
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
                                        <input name="password" id="input_password" class="form-control @if(isset($errors['all']) || isset($errors['password'])) is-invalid @endif" type="password" placeholder="{{ __('Password') }}">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card text-white bg-primary py-5 d-md-down-none" style="width:45%">
                            <div class="card-body text-center">
                                <div>
                                    <h2>{{ __('Sign Up') }}</h2>
                                    <p>{{ __('New user?') }}</p>
                                    <a href="{{ route('view.register') }}" class="btn btn-lg btn-outline-light mt-5">Register Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ Constants::COREUI_JS_COREUIBUNDLE }}"></script>
        <script src="{{ Constants::COREUI_ICONS_JS_SVGXUSE }}"></script>
    </body>
</html>
