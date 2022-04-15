<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
          <label for="exampleInputEmail1">Nombre</label>
          <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$getServer->name) }}" type="txt" placeholder="Enter name"><small class="form-text text-muted" ></small>
        </div>

        <div class="form-group">
          <label for="payload">Payload</label>
          <textarea name="payload" class="form-control @error('payload') is-invalid @enderror" rows="3">{{ old('payload',$getServer->payload) }}
            </textarea>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">IP</label>
          <input class="form-control @error('ip') is-invalid @enderror" name="ip" value="{{ old('ip',$getServer->ip) }}" type="txt" placeholder="Enter IP"><small class="form-text text-muted" ></small>
        </div>

        <div class="form-group">
          <label for="country">Pais</label>
          <input class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country',$getServer->country) }}" type="txt" placeholder="Enter country"><small class="form-text text-muted" ></small>
        </div>
        
        <div class="form-group">
            <label for="province">Estado/Provincia</label>
            <input class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province',$getServer->province) }}" type="txt" placeholder="Enter province"><small class="form-text text-muted" ></small>
          </div>

          <div class="form-group">
            <label for="province">VPS User</label>
            <input class="form-control @error('province') is-invalid @enderror" name="vps_user" value="{{ old('vps_user',$getServer->vps_user) }}" type="txt" placeholder="Enter user"><small class="form-text text-muted" ></small>
          </div>

          <div class="form-group">
            <label for="province">VPS PASSWD</label>
            <input class="form-control @error('province') is-invalid @enderror" name="vps_passwd" value="{{ old('vps_passwd',$getServer->vps_passwd) }}" type="txt" placeholder="Enter passwd"><small class="form-text text-muted" ></small>
          </div>
      </div>
      <div class="col-lg-4 offset-lg-1">
  
            <div class="form-group">
              <label for="days">Días de actividad</label>
              <input class="form-control @error('days') is-invalid @enderror" name="days" type="number" value="{{ old('days',$getServer->days) }}" placeholder="Enter act"><small class="form-text text-muted" ></small>
            </div>

            <div class="form-group">
              <label for="days">Precio</label>
              <input class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price',$getServer->price) }}" type="number" placeholder="Enter act"><small class="form-text text-muted" ></small>
            </div>
  
            <div class="form-group">
              <label for="exampleSelect1">Tipo</label>
              <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
                <option value="free">Account free</option>
                <option value="premium">Account Premium</option>
              </select>
            </div>
            
            <div class="form-group">
              <label for="days">Conexiones</label>
              <input class="form-control @error('limit') is-invalid @enderror" name="limit" value="{{ old('limit',$getServer->limit) }}" type="txt" placeholder="Enter limit conecct"><small class="form-text text-muted" ></small>
            </div>
            <div class="form-group">
              <label for="days">Dominio</label>
              <input class="form-control @error('domain') is-invalid @enderror" name="domain" type="txt" value="{{ old('domain',$getServer->domain) }}" placeholder="ejem: hive-vpn.tk"><small class="form-text text-muted" ></small>
            </div>
      </div>
  </div>