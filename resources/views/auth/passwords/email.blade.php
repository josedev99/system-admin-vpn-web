@extends('layouts.app')

@section('content')
<div class="login">
    <div class="transparent-color">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        @if (session('success'))
                        <div class="alert alert-success">
                            <div class="checked__send-link d-flex justify-content-start align-items-center">

                                <img src="{{ asset('images/icons/checked.png') }}" alt="">
                                
                                <h4>{{ session('success') }}</h4>
                                
                            </div>
                        </div>
                        @else
                        <div class="card-header">{{ __('Restablecer contraseña') }}</div>
        
                        <div class="card-body">
                            @if (session('error'))
                            <div class="checked__send-link d-flex justify-content-start align-items-center">

                                <img src="{{ asset('images/icons/checked.png') }}" alt="">
                                
                                <h5>{{ session('error') }}</h5>
                                
                            </div>
                            @endif
        
                            <form method="POST" action="{{ route('password.reset') }}">
                                @csrf
        
                                <div class="form-group">
                                    <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
        
                                    
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    
                                </div>
        
                                <div class="form-group">
                                    
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                   
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
