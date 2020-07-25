
          @csrf
        <div class="row">
          <div class="card-body col-sm-6">
             
              <div class="form-group row ">
                <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre',$servicio->nombre)}}" placeholder="Indica el nombre del servicio">
                  @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="precio" class="col-sm-4 col-form-label">Precio</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="precio" name="precio" value="{{old('precio',$servicio->precio)}}" placeholder="Indica el precio del servicio">
                  @error('precio')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="duracion" class="col-sm-4 col-form-label">Duración</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="duracion" name="duracion" value="{{old('duracion',$servicio->duracion)}}" placeholder="Indica la duración del servicio">
                  @error('duracion')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div> 

              <div class="form-group row">
                <label for="msedes_id" class="col-sm-4 col-form-label">Sede</label>
                <div class="col-sm-8">
                  <select class="form-control" name="msedes_id" id="msedes_id">
                   @foreach ($sedes as $nombre => $id)
                  <option {{$servicio->msedes_id == $id ? 'selected="selected"' : ''}} value={{$id}}>{{$nombre}}</option>
                   @endforeach                    
                  </select>  
                  @error('msedes_id')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div> 

              <div class="form-group row">
                <label for="descripcion" class="col-sm-4 col-form-label">Descripción</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="descripcion" name="descripcion"  placeholder="Describe el servicio" rows="4">{{old('descripcion',$servicio->descripcion)}}</textarea>
                  @error('descripcion')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div> 

          </div>

          <div class="card-body col-sm-6">

            <div class="form-group">
             <!-- <label for="imagen">Imagen</label>                           
                  <input type="file" id="imagen" name="imagen">  --> 

                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imagen" name="imagen">
                    <label class="custom-file-label" for="imagen">Elige una imagen</label>
                  </div>  
                  @error('imagen')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror                
              
            </div>

            <div class="form-group">
              
              <div class="align-self-center text-center">       
              <img src="{{$servicio->imagen!=null ? Storage::url($servicio->imagen) : '/storage/default2.png'}}" class="img-fluid" style="max-height:280px" alt="Imagen">
              </div>

            </div>


          </div>

        </div>    
          <!-- /.card-body -->
          <div class="card-footer bg-yellow">
            <button type="submit" class="btn bg-gradient-dark bg-gray-dark btn-sm">Guardar</button>
            <a class="btn btn-default float-right bg-gray-light btn-sm" href="{{route('servicios.index')}}" role="button">Volver</a>
          </div>
          <!-- /.card-footer -->
        </form>
    </div>
      <!-- /.card -->  
