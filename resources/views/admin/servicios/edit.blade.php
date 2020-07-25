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
        <h3 class="card-title">Editar servicio</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

    <form class="form-horizontal" action="{{route('servicios.update',$servicio->id)}}" method="POST" enctype="multipart/form-data">
      @method('PUT')

@include('admin.servicios._form')   

@endsection