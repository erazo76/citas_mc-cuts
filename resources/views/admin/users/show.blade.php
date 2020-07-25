@extends('admin/layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-8">
              <h1 class="m-0 text-dark">Usuarios</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
      <!-- /.content-header -->
    <div class="card card-info">
        <div class="card-header bg-gradient-yellow text-black-50">
          <h3 class="card-title">[{{$user->id}}]- "{{$user->name}}"</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->


      <form  class="form-horizontal" action="{{route("users.store" )}}" method="POST">
          @csrf
        <div class="row">
          <div class="card-body col-sm-6">
             
              <div class="form-group row ">
                <label for="name" class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" disabled>
                </div>
              </div>

              <div class="form-group row">
                <label for="mroles_id" class="col-sm-4 col-form-label">Rol</label>
                <div class="col-sm-8">
                  <select class="form-control" name="mroles_id" id="mroles_id" disabled>
                   @foreach ($roles as $nombre => $id)
                  <option {{$user->msedes_id == $id ? 'selected="selected"' : ''}} value={{$id}}>{{$nombre}}</option>
                   @endforeach                    
                  </select>  
                </div>
              </div> 

              <div class="form-group row">
                <label for="msedes_id" class="col-sm-4 col-form-label">Sede</label>
                <div class="col-sm-8">
                  <select class="form-control" name="msedes_id" id="msedes_id" disabled>
                   @foreach ($sedes as $nombre => $id)
                  <option {{$user->msedes_id == $id ? 'selected="selected"' : ''}} value={{$id}}>{{$nombre}}</option>
                   @endforeach                    
                  </select>  
                </div>
              </div> 

              <div class="form-group row ">
                <label for="telefono" class="col-sm-4 col-form-label">Teléfono</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{$user->telefono}}" disabled>
                </div>
              </div>

              <div class="form-group row ">
                <label for="email" class="col-sm-4 col-form-label">Correo-e</label>
                <div class="col-sm-8">
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" disabled>
                </div>
              </div>


              <div class="form-group row">
                <label for="descripcion" class="col-sm-4 col-form-label">Descripción</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="descripcion" name="descripcion" disabled >{{$user->descripcion}}</textarea>
                </div>
              </div> 

          </div>
          <div class="card-body col-sm-6">

            <div class="form-group">
              
              <div class="align-self-center text-center">       
              <img src="{{$user->imagen!=null ? Storage::url($user->imagen) : '/storage/default3.png'}}" class="img-fluid" style="max-height:280px" alt="Imagen">
              </div>

            </div>

          </div>
        </div>    
          <!-- /.card-body -->
          <div class="card-footer bg-yellow">
            <a class="btn btn-default float-right bg-gray-light btn-sm" href="{{route('users.index')}}" role="button">Volver</a>
          </div>
          <!-- /.card-footer -->
        </form>
    </div>
      <!-- /.card -->
    
@endsection