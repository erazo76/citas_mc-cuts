
          @csrf
        <div class="row">
          <div class="card-body col-sm-6">
             
              <div class="form-group row ">
                <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre',$sede->nombre)}}" placeholder="Indica nombre de la nueva sede">
                  @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="direccion" class="col-sm-4 col-form-label">Dirección</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="direccion" name="direccion" value="{{old('direccion',$sede->direccion)}}" placeholder="Indica dirección de la nueva sede">
                  @error('direccion')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="telefono" class="col-sm-4 col-form-label">Teléfono</label>
                <div class="col-sm-8">
                  <input type="tel" class="form-control" id="telefono" name="telefono" value="{{old('telefono',$sede->telefono)}}" placeholder="Indica un número de contacto">
                  @error('telefono')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>     

              <div class="form-group row">
                <label for="pais" class="col-sm-4 col-form-label">País</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="pais" name="pais" value="{{old('pais',$sede->pais)}}" placeholder="Indica el país">
                  @error('pais')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div> 
                     
          </div>

          <div class="card-body col-sm-6">

            <div class="form-group">
             <!-- <label for="logo">Logo</label>
                <input type="file" name="logo" id="logo"> -->

                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="logo" name="logo">
                  <label class="custom-file-label" for="logo">Elige tu logo</label>
                </div>


                @error('logo')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group align-self-center text-center">
            <img src="{{$sede->logo!=null ? Storage::url($sede->logo) : '/storage/default.png'}}" class="img-fluid" style="max-height:280px" alt="Logo">
            </div>

          </div>
        </div>    
          <!-- /.card-body -->
          <div class="card-footer bg-yellow">
            <button type="submit" class="btn bg-gradient-dark bg-gray-dark btn-sm">Guardar</button>
            <a class="btn btn-default float-right bg-gray-light btn-sm" href="{{route('sedes.index')}}" role="button">Volver</a>
          </div>
          <!-- /.card-footer -->
        </form>
    </div>
      <!-- /.card -->  
