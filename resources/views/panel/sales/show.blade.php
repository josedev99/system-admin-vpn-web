@extends('panel.layouts.app')
@section('title','Compras')
@section('content')
@include('panel.partials.alert')
<div class="tile">
    <h3 class="tile-title">Compras realizadas</h3>
    <table class="table table-striped table-responsive-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Usuario</th>
          <th>Fecha de ingreso</th>
          <th>Total</th>
          <th>PayPal ID</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($getSalesAll as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->user_id }}</td>
            <td>{{ $item->date }}</td>
            <td>{{ $item->total }}</td>
            <td>{{ $item->paypal_data }}</td>
            <td>
                
            </td>
          </tr> 
          @endforeach
        
      </tbody>
    </table>
  </div>
@endsection