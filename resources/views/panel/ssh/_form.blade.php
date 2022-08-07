<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
          <label for="exampleInputEmail1">IP</label>
          <input readonly class="form-control  @error('ip') is-invalid @enderror" name="ip" value="{{ request()->ip }}" type="txt" placeholder="IP"><small class="form-text text-muted" ></small>

          <input readonly class="form-control  @error('user') is-invalid @enderror" name="user" value="{{ request()->user }}" type="txt" placeholder="IP"><small class="form-text text-muted" ></small>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="exampleSelect1">Días</label>
            <select class="form-control @error('days') is-invalid @enderror" name="days" id="type" required>
            
            
            <option value="16">15 días</option>  
            
            <option value="32">31 días</option>
            <option value="61">60 días</option>
            </select>
        </div>
    </div>
  </div>