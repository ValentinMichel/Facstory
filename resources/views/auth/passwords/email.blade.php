@extends('layouts.app')

@section('content')
<div class="container">





                <div class="form-group">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form">{{ __('Reset mot de passe') }}</div>
                        <div class="form-group">


                            <div class="input">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email adresse" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('reset mot de passe') }}
                                </button>

                        </div>
                    </form>
                </div>


</div>
@endsection
