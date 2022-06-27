@extends('layouts.app')

@section('title','Recargar | hive-vpn.tk')
@section('content')
    <div class="recargar__saldo py-5">
        <div class="container">
            @include('partials.alert')
            <h1 class="title-1 text-center my-4">Recarga para comprar tu cuenta premium</h1>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="recargar__content">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4>Hacer un pago de PayPal</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('create-payment') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text badge-success">$</div>
                                              </div>
                                              <input type="number" name="amount" step="0.01" class="form-control" min="2" placeholder="Monto a recargar">
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary btn-sm mb-2">Recargar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="recargar__content">
                        <div class="card">
                            <div class="card-header">
                                <h4>Información</h4>
                            </div>
                            <div class="card-body">
                                <p><b>Pagos seguros: </b>PayPal</p>
                                <p><b>Impuesto: </b>Incluido</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection