<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'OKDFS') }}</title>
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
            <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-8 mx-auto">
                        <h2 class="text-center mb-4">Register</h2>
                        <div class="auto-form-wrapper">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="first_name">{{ __('First name') }}</label>
                                        <div class="input-group">
                                            <input id="first_name" type="text"
                                                class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                name="first_name" value="{{ old('first_name') }}" required autofocus>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="mdi mdi-check-circle-outline"></i>
                                                </span>
                                            </div>
                                            @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="middle_name">{{ __('Middle name') }}</label>
                                        <div class="input-group">
                                            <input id="middle_name" type="text"
                                                class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}"
                                                name="middle_name" value="{{ old('middle_name') }}" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="mdi mdi-check-circle-outline"></i>
                                                </span>
                                            </div>
                                            @if ($errors->has('middle_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('middle_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="last_name">{{ __('Last name') }}</label>
                                        <div class="input-group">
                                            <input id="last_name" type="text"
                                                class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                name="last_name" value="{{ old('last_name') }}" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="mdi mdi-check-circle-outline"></i>
                                                </span>
                                            </div>
                                            @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="phone">{{ __('Phone number') }}</label>
                                        <div class="input-group">
                                            <input id="phone" type="text"
                                                class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                name="phone" value="{{ old('phone') }}" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="mdi mdi-check-circle-outline"></i>
                                                </span>
                                            </div>
                                            @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="medical_status">{{ __('Medical status') }}</label>
                                        <div class="input-group">
                                            <input id="medical_status" type="text"
                                                class="form-control{{ $errors->has('medical_status') ? ' is-invalid' : '' }}"
                                                name="medical_status" value="{{ old('medical_status') }}" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="mdi mdi-check-circle-outline"></i>
                                                </span>
                                            </div>
                                            @if ($errors->has('medical_status'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('medical_status') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="hospital_id">{{ __('Hospital') }}</label>
                                        <div class="input-group">
                                        <select id="hospital_id" class="form-control{{ $errors->has('hospital_id') ? ' is-invalid' : '' }}" name="hospital_id" value="{{ old('hospital_id') }}" required>
                                            @foreach($hospitals as $hospital)    
                                                <option value="{{$hospital->id}}">{{$hospital->name}}</option>
                                            @endforeach
                                        </select>
                                            @if ($errors->has('hospital_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('hospital_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <div class="input-group">
                                        <input id="email" type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ old('email') }}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="password">{{ __('Password') }}</label>
                                        <div class="input-group">
                                            <input id="password" type="password"
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password" value="{{ old('password') }}" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="mdi mdi-check-circle-outline"></i>
                                                </span>
                                            </div>
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <div class="input-group">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="mdi mdi-check-circle-outline"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group d-flex justify-content-center">
                                    <div class="form-check form-check-flat mt-0">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" checked> I agree to the
                                            terms
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="btn btn-primary submit-btn btn-block">{{ __('Register') }}</button>
                                </div>
                                <div class="text-block text-center my-3">
                                    <span class="text-small font-weight-semibold">Already have and account ?</span>
                                    <a href="/login" class="text-black text-small">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.addons.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>