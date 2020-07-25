
@extends('layouts.app')
@section('content')
  <div>
    <h1>BIENVENIDO</h1>
    @auth
    {{ auth()->user()->name }}
    @endauth
    
  </div>
  <!-- /.row -->
@endsection