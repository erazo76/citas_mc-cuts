@extends('admin/layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-8">
              <h1 class="m-0 text-dark">Sedes</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
      <!-- /.content-header -->
    <div class="card card-info">
        <div class="card-header bg-gradient-yellow text-black-50">
          <h3 class="card-title">[{{$sede->id}}]- "{{$sede->nombre}}"</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->


      <form class="form-horizontal" action="{{route("sedes.store" )}}" method="POST">
          @csrf
        <div class="row">
          <div class="card-body col-sm-6">
             
              <div class="form-group row ">
                <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$sede->nombre}}" disabled>
                </div>
              </div>

              <div class="form-group row">
                <label for="direccion" class="col-sm-4 col-form-label">Dirección</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="direccion" name="direccion" value="{{$sede->direccion}}" disabled>
                </div>
              </div>

              <div class="form-group row">
                <label for="telefono" class="col-sm-4 col-form-label">Teléfono</label>
                <div class="col-sm-8">
                  <input type="tel" class="form-control" id="telefono" name="telefono" value="{{$sede->telefono}}" disabled>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="pais" class="col-sm-4 col-form-label">País</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="pais" name="pais" value="{{$sede->pais}}" disabled>
                </div>
              </div> 

          </div>
          <div class="card-body col-sm-6">
            
            <div class="form-group">
              
              <div class="align-self-center text-center">       
              <img src="{{$sede->logo!=null ? Storage::url($sede->logo) : '/storage/default.png'}}" class="img-fluid" style="max-height:280px" alt="Logo">
              </div>

            </div>

          </div>
        </div>    
          <!-- /.card-body -->
          <div class="card-footer bg-yellow">
            <a class="btn btn-default float-right bg-gray-light btn-sm" href="{{route('sedes.index')}}" role="button">Volver</a>
          </div>
          <!-- /.card-footer -->
        </form>
    </div>
      <!-- /.card -->
    
@endsection