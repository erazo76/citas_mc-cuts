@extends('admin/layout')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-8">
        <h1 class="m-0 text-dark">Servicios</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="card">
    <div class="card-header bg-gradient-yellow text-black-50">
      <h3 class="card-title">Servicios activos</h3>
      <a class="btn bg-gradient-dark bg-gray-dark btn-lg float-right" href="{{route('servicios.create')}}"><i class="fas fa-plus"></i></a>
    </div>
    <div class="card-body">
      <table id="tabla" class="table table-bordered table-striped">
        
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Duración</th>
              <th>Descripción</th>
              <th>Sede</th>
              <th>Acciones</th>              
            </tr>        
          </thead>

          <tbody>
              @foreach ($servicios as $servicio)
                  <tr>
                    <th>{{$servicio->id}}</th>
                    <th>{{$servicio->nombre}}</th>
                    <th>{{$servicio->precio}}</th>
                    <th>{{$servicio->duracion}}</th>                    
                    <th>{{$servicio->descripcion}}</th>
                    <th>{{$servicio->msedes->nombre}}</th>  
                  <th>
                    <div class="row">
                      <a href="{{ route('servicios.show', $servicio->id)}}" class="btn btn-outline-dark btn-xs m-1"><i class="fas fa-eye"></i></a>
                      <a href="{{ route('servicios.edit', $servicio->id)}}" class="btn btn-outline-primary btn-xs m-1"><i class="fas fa-edit"></i></a>                    

                    <button class="btn btn-outline-danger btn-xs m-1" data-toggle="modal" data-target="#deleteModal" data-id="{{$servicio->id}}"><i class="fas fa-skull"></i></button>

                    </div>
                  </th>
                  </tr>        
              @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Duración</th>
              <th>Descripción</th>
              <th>Sede</th>
              <th>Acciones</th>               
            </tr>
          </tfoot>
      </table>
    </div>

    <div class="card-footer bg-gradient-yellow">
      
      
     
    </div>
  </div>
  <!-- modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-gradient-yellow">          
          <h4 class="modal-title" id="modalLabel"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body text-center">
              <h5>¿Deseas eliminar el servicio seleccionado?</h5>
        </div>
        <div class="modal-footer bg-gradient-yellow">
          
          <form id="formDelete"  method="POST" action="{{ route('servicios.destroy',0)}}" data-action="{{ route('servicios.destroy',0)}}" >
            @method('DELETE')
            @csrf     
            <button type="submit" class="btn bg-gradient-danger btn-sm" style="width:36.35px">SI</button>
          </form>

          <button type="button" class="btn btn-default float-right bg-gray-light btn-sm" data-dismiss="modal">NO</button>
          
        </div>
      </div>
    </div>
  </div>

@endsection