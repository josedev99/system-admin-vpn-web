@extends('panel.layouts.app')
@section('title','Saldos')
@section('content')


<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="text-center text-info">Crear saldo al usuario</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('saldo.store') }}" method="POST" role="form">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="number" name="saldo" id="saldo" class="form-control" placeholder="Ingresa el saldo del usuario">
                        @error('saldo')
                            <small class="text-danger">
                                <strong>
                                    {{$message}}
                                </strong>
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <select name="user_id" id="user_id" class="form-control">
                            <option selected>Selecciona al usuario</option>
                            @foreach ($users as $user)
                                <option value="{{$user['id']}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <small class="text-danger">
                                <strong>
                                    {{$message}}
                                </strong>
                            </small>
                        @enderror
                        
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="date" name="created_at" id="created_at" class="form-control">
                        @error('created_at')
                            <small class="text-danger">
                                <strong>
                                    {{$message}}
                                </strong>
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="submit" value="Guardar" class="btn btn-outline-success btn-bordered btn-sm">
                        <a class="btn btn-dark btn-sm" href="{{ route('saldo.index') }}">Regresar</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection