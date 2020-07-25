
          @csrf
        <div class="row">
          <div class="card-body col-sm-6">
             
              <div class="form-group row ">
                <label for="name" class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="name" name="name" value="{{old('name',$user->name)}}" placeholder="Indica el nombre del usuario">
                  @error('name')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="mroles_id" class="col-sm-4 col-form-label">Rol</label>
                <div class="col-sm-8">
                  <select class="form-control" name="mroles_id" id="mroles_id">
                   @foreach ($roles as $nombre => $id)
                  <option {{$user->mroles_id == $id ? 'selected="selected"' : ''}} value={{$id}}>{{$nombre}}</option>
                   @endforeach                    
                  </select>  
                  @error('mroles_id')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div> 

              <div class="form-group row">
                <label for="msedes_id" class="col-sm-4 col-form-label">Sede</label>
                <div class="col-sm-8">
                  <select class="form-control" name="msedes_id" id="msedes_id">
                   @foreach ($sedes as $nombre => $id)
                  <option {{$user->msedes_id == $id ? 'selected="selected"' : ''}} value={{$id}}>{{$nombre}}</option>
                   @endforeach                    
                  </select>  
                  @error('msedes_id')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div> 

              <div class="form-group row">
                <label for="telefono" class="col-sm-4 col-form-label">Teléfono</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="telefono" name="telefono" value="{{old('telefono',$user->telefono)}}" placeholder="Indica el teléfono del usuario">
                  @error('telefono')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">Correo-e</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="email" name="email" value="{{old('email',$user->email)}}" placeholder="Indica el correo-e del usuario">
                  @error('email')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>


              @if ($pasw)

                <div class="form-group row">
                  <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" name="password" value="{{old('password',$user->password)}}" placeholder="Indica una contraseña">
                    @error('password')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                </div>

              @endif

          </div>

          <div class="card-body col-sm-6">

            <div class="form-group">
              <label for="descripcion" class="form-label">Descripción</label>             
                <textarea class="form-control" id="descripcion" name="descripcion"  placeholder="Descripción del usuario" rows="4">{{old('descripcion',$user->descripcion)}}</textarea>
                @error('descripcion')
                  <small class="text-danger">{{ $message }}</small>
                @enderror              
            </div> 

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
              <img src="{{$user->imagen!=null ? Storage::url($user->imagen) : '/storage/default3.png'}}" class="img-fluid" style="max-height:280px" alt="Imagen">
              </div>

            </div>


          </div>

        </div>    
          <!-- /.card-body -->
          <div class="card-footer bg-yellow">
            <button type="submit" class="btn bg-gradient-dark bg-gray-dark btn-sm">Guardar</button>
            <a class="btn btn-default float-right bg-gray-light btn-sm" href="{{route('users.index')}}" role="button">Volver</a>
          </div>
          <!-- /.card-footer -->
        </form>
    </div>
      <!-- /.card -->  
