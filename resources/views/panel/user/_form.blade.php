<div class="row">
    <div class="col-lg-6">

        <div class="form-group">
          <label for="country">Estado</label>
          <select name="status" class="form-control" required>
            
            
            <option value="{{ $user->status }}" >
                @if($user->status == 1)
                    Activo
                @else
                    Desactivado
                @endif
            </option>
            
            <option value="1" id="AF">Activar</option>
            <option value="0" id="AF">Desactivar</option>

            </select>

        </div>
        
      </div>
      <div class="col-lg-4 offset-lg-1">

            <div class="form-group">
              <label for="exampleSelect1">Rol</label>
              <select class="form-control @error('type') is-invalid @enderror" name="rol_id" id="type" required>
                @foreach ($getRolsAll as $item)
                    @if($user->rol_id == $item->id)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
                
              </select>
            </div>

  </div>