@extends('admin/layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-8">
              <h1 class="m-0 text-dark">Servicios</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
      <!-- /.content-header -->
    <div class="card card-info">
        <div class="card-header bg-gradient-yellow text-black-50">
          <h3 class="card-title">[{{$servicio->id}}]- "{{$servicio->nombre}}"</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->


      <form  class="form-horizontal" action="{{route("servicios.store" )}}" method="POST">
          @csrf
        <div class="row">
          <div class="card-body col-sm-6">
             
              <div class="form-group row ">
                <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$servicio->nombre}}" disabled>
                </div>
              </div>

              <div class="form-group row">
                <label for="precio" class="col-sm-4 col-form-label">Precio</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="precio" name="precio" value="{{$servicio->precio}}" disabled>
                </div>
              </div>

              <div class="form-group row">
                <label for="duracion" class="col-sm-4 col-form-label">Duración</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="duracion" name="duracion" value="{{$servicio->duracion}}" disabled>
                </div>
              </div> 

              <div class="form-group row">
                <label for="msedes_id" class="col-sm-4 col-form-label">Sede</label>
                <div class="col-sm-8">
                  <select class="form-control" name="msedes_id" id="msedes_id" disabled>
                   @foreach ($sedes as $nombre => $id)
                  <option {{$servicio->msedes_id == $id ? 'selected="selected"' : ''}} value={{$id}}>{{$nombre}}</option>
                   @endforeach                    
                  </select>  
                </div>
              </div> 

              <div class="form-group row">
                <label for="descripcion" class="col-sm-4 col-form-label">Descripción</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="descripcion" name="descripcion" disabled >{{$servicio->descripcion}}</textarea>
                </div>
              </div> 

          </div>
          <div class="card-body col-sm-6">

            <div class="form-group">
              
              <div class="align-self-center text-center">       
              <img src="{{$servicio->imagen!=null ? Storage::url($servicio->imagen) : '/storage/default2.png'}}" class="img-fluid" style="max-height:280px" alt="Imagen">
              </div>

            </div>

          </div>
        </div>    
          <!-- /.card-body -->
          <div class="card-footer bg-yellow">
            <a class="btn btn-default float-right bg-gray-light btn-sm" href="{{route('servicios.index')}}" role="button">Volver</a>
          </div>
          <!-- /.card-footer -->
        </form>
    </div>
      <!-- /.card -->
    
@endsection