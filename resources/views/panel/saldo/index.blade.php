@extends('panel.layouts.app')
@section('title','Saldos')
@section('content')
@include('panel.partials.alert')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="text-success text-center">Lista de saldo de usuarios</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-outline-info" href="{{ route('saldo.create') }}">Crear saldo <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
            <table class="table table-striped table-bordered dataTable no-footer table-responsive-sm" id="table-saldo">
                <thead>
                    <th class="text-center text-info">ID</th>
                    <th  class="text-center text-info">SALDO</th>
                    <th  class="text-center text-info">USUARIO</th>
                    <th  class="text-center text-info">FECHA</th>
                    <th  class="text-center text-info">EDITAR</th>
                    <th  class="text-center text-info">ELIMINAR</th>
                </thead>
                <tbody>
                    @foreach ($saldos as $saldo)
                        <tr>
                            <td class="text-center">{{$saldo->id}}</td>
                            <td class="text-center">${{$saldo->saldo}}</td>
                            <td class="text-center">{{$saldo->name}}</td>
                            <td class="text-center">{{$saldo->created_at}}</td>
                            <td class="text-center"><a href="{{ route('saldo.edit',$saldo) }}" class="btn btn-outline-dark"><i class="fa fa-pencil" aria-hidden="true"></i>Editar</a></td>
                            <td class="text-center">
                                <form action="{{ action('SaldoController@destroy',$saldo->id) }}" method="POST" role="form">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{$saldos->links()}}
</div>
    
<script>
    //DataTables
    var tableUser = new DataTable("#table-saldo");
</script>
@endsection