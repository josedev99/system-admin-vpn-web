@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="text-center py-4">Crear servidor WebSocket</h1>
        <div class="col-sm-12 col-md-4 mx-auto">
            @if (session('status'))
                <div class="alert alert-warning">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-warning">
                    {{ session('error') }}
                </div>
            @endif               
        
            <div class="card border-0 shadow-lg">
                <h5 class="py-3 text-center m-0 p-0">Crear nueva cuenta</h5>
                <div class="card-body">
                    @if ($server[0]->type == "premium")
                        <form id="form" method="POST" action="{{ route('create-payment') }}">
                    @else
                        <form id="form" method="POST" action="{{ route('ws_prem_usa1',request()->id) }}">
                    @endif
                    @csrf
                    <div class="form-group">
                        <input type="text" id="user" name="user" placeholder="Usuario" class="form-control rounded-pill @error('user') is-invalid @enderror" value="{{ old('user') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" id="passwd" name="passwd" placeholder="Password" class="form-control rounded-pill @error('passwd') is-invalid @enderror" value="{{ old('passwd') }}">
                        </div>
                        
                        <div class="recapcha mb-2">
                            {!! htmlFormSnippet() !!}
                            @error('g-recaptcha-response') <span class="text-danger">verificaión fallida</span> @enderror
                        </div>
                        
                        @auth
                        @if ($server[0]->type == "premium")
                        
                        {{ session([
                            'price' => $server[0]->price,
                            'server_id' => request()->id,
                            'days' => $server[0]->days
                        ]) }}
                        
                            <input name="amount" placeholder="Amount" value="{{ $server[0]->price }}" type="hidden">
                            
                            <button type="submit" class="btn btn-outline-success btn-block">COMPRAR</button>
                            @else
                            <button type="submit" class="btn btn-outline-success btn-block">CREAR</button>
                            @endif
                            @else
                            <a class="btn btn-outline-secondary btn-block" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    
                        @endauth
                                    
                     </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        const formData = document.getElementById('form')
        const user = document.getElementById('user');
        const passwd = document.getElementById('passwd');
        addEventListener('submit', (e)=>{
            
            if(/\s/.test(user.value) || /\s/.test(passwd.value)){
                swal('Error','No puede contener espacios','error');
                return 0;
            }
        })
       
       
   </script>
@endsection