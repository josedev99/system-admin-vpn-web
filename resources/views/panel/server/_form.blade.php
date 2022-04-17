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
          <select name="country" class="form-control" required>
            <option value="" id="AF">Elegir un pais</option>
            <option value="Afganistán" id="AF">Afganistán</option>
            <option value="Albania" id="AL">Albania</option>
            <option value="Alemania" id="DE">Alemania</option>
            <option value="Andorra" id="AD">Andorra</option>

            <option value="Argentina" id="AR">Argentina</option>
            <option value="Australia" id="AU">Australia</option>

            <option value="Barbados" id="BB">Barbados</option>
            <option value="Bélgica" id="BE">Bélgica</option>
            <option value="Belice" id="BZ">Belice</option>

            <option value="Bermudas" id="BM">Bermudas</option>
  
            <option value="Brasil" id="BR">Brasil</option>

            <option value="Canada" id="CA">Canadá</option>
            <option value="Chile" id="CL">Chile</option>
            <option value="China" id="CN">China</option>
            <option value="Chipre" id="CY">Chipre</option>

            <option value="Colombia" id="CO">Colombia</option>

            <option value="Corea" id="KR">Corea</option>
            <option value="Corea del Norte" id="KP">Corea del Norte</option>

            <option value="Costa Rica" id="CR">Costa Rica</option>

            <option value="Cuba" id="CU">Cuba</option>
            <option value="Dominica" id="DM">Dominica</option>
            <option value="Ecuador" id="EC">Ecuador</option>
            <option value="España" id="ES">España</option>
            <option value="estados-unidos" id="US">Estados Unidos</option>

            <option value="Francia" id="FR">Francia</option>


            <option value="Guatemala" id="GT">Guatemala</option>

            <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
            <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
            <option value="Haití" id="HT">Haití</option>
            <option value="Holanda" id="NL">Holanda</option>
            <option value="Honduras" id="HN">Honduras</option>

            <option value="India" id="IN">India</option>
            <option value="Indonesia" id="ID">Indonesia</option>

            <option value="Israel" id="IL">Israel</option>
            <option value="Italia" id="IT">Italia</option>
            <option value="Jamaica" id="JM">Jamaica</option>
            <option value="Japón" id="JP">Japón</option>

            <option value="Nicaragua" id="NI">Nicaragua</option>

            <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
            <option value="Panamá" id="PA">Panamá</option>
            <option value="Paraguay" id="PY">Paraguay</option>
            <option value="Perú" id="PE">Perú</option>

            <option value="Puerto Rico" id="PR">Puerto Rico</option>

            <option value="Reino Unido" id="UK">Reino Unido</option>

            <option value="República Dominicana" id="DO">República Dominicana</option>
            <option value="Rusia" id="RU">Rusia</option>

            <option value="Singapur" id="SG">Singapur</option>

            <option value="Suecia" id="SE">Suecia</option>
            <option value="Suiza" id="CH">Suiza</option>
 
            <option value="Tailandia" id="TH">Tailandia</option>
            <option value="Taiwán" id="TW">Taiwán</option>

            <option value="Turquía" id="TR">Turquía</option>
            <option value="Ucrania" id="UA">Ucrania</option>
            <option value="Uganda" id="UG">Uganda</option>
            <option value="Uruguay" id="UY">Uruguay</option>
            </select>

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