@extends('panel.layouts.app')
@section('title','Add server')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            @if (count($getUsersAll) > 0)
            <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable" role="grid" aria-describedby="sampleTable_info">
                <thead>
                  <tr role="row"><th>User</th><th>Passwd</th>
                    <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 114.188px;">Tipo</th>
                    <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 114.188px;">Creado</th><th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 52.3594px;">Expire</th><th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 104.703px;">Dominio</th>
                    <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 104.703px;">ID Usuario</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($getUsersAll as $item)    
                    <tr role="row" class="odd">
                        <td class="sorting_1">{{ $item->user }}</td>
                        <td>{{ $item->passwd }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->created }}</td>
                        <td>{{ $item->expire }}</td>
                        <td>{{ $item->domain }}</td>
                        <td>{{ $item->user_id }}</td>
                      </tr></tbody>
                    @endforeach  
              </table>
              {{ $getUsersAll->links() }}
            @else
              <h4>¡No hay usuario creados!</h4>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
