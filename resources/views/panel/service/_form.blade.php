<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
          <label for="exampleInputEmail1">Protocol</label>
          <input class="form-control @error('protocol') is-invalid @enderror" name="protocol" value="{{ old('protocol',$service->protocol) }}" type="txt" placeholder="Ejem: Estados Unidos"><small class="form-text text-muted" ></small>
        </div>

        <div class="form-group">
          <label for="country">Pais</label>
          <select name="country" class="form-control" required>
            @if($service->country != "")
            <option value="{{ $service->country }}" >{{ $service->country }}</option>
            @else
            <option value="" id="AF">Elegir un pais</option>
            @endif
            
            <option value="Afganistán" id="AF">Afganistán</option>
            <option value="Albania" id="AL">Albania</option>
            <option value="Alemania" id="DE">Alemania</option>
            <option value="Andorra" id="AD">Andorra</option>

            <option value="Argentina" id="AR">Argentina</option>
            <option value="Australia" id="AU">Australia</option>

            <option value="Barbados" id="BB">Barbados</option>
            <option value="Bélgica" id="BE">Bélgica</option>
            <option value="Belice" id="BZ">Belice</option>
            <option value="Mexico" id="AU">Mexico</option>
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
            <option value="Estados Unidos" id="US">Estados Unidos</option>

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
          <label for="exampleInputEmail1">Bandera icon</label>
          <input class="form-control @error('flag') is-invalid @enderror" name="flag" value="{{ old('flag',$service->flag) }}" type="file" placeholder="Ejem: Estados Unidos"><small class="form-text text-muted" ></small>
        </div>

        
      </div>
  </div>