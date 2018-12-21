@extends('layouts.app')

@section('content')
<div class="container">


            <div class="form">



                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="form">{{ __('Reset mot de passe') }}</div>

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">



                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group">



                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group">

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                        </div>

                        <div class="form-group">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset mot de passe') }}
                                </button>

                        </div>
                    </form>

            </div>
    </div>


</div>
@endsection
