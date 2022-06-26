<div class="container pb-5">
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
                    {{ session([
                        'price' => $server[0]->price,
                        'server_id' => request()->id,
                        'days' => $server[0]->days,
                        'host' => $server[0]->ip,
                        'vps_user' => $server[0]->vps_user,
                        'vps_passwd' => $server[0]->vps_passwd,
                        'conection_limit' => $server[0]->limit
                    ]) }}
                    @auth
                    @if ($server[0]->type == "premium")
                    
                    
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