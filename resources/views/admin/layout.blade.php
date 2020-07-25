<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Mr. Cuts | Barber Shop </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">  
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
   <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-gray-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">Inicio</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item  d-sm-inline-block">

        <a class="nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i>                
          
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

      </li> 

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">0</span>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('adminlte/img/Barberies.png')}}" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Mr. Cuts</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            @auth
                {{auth()->user()->name}}
            @endauth
            <br>
            <span class="text-success text-capitalize small">
              @auth
                {{auth()->user()->mroles->nombre}}
              @endauth
            </span>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open ">
            <a href="#" class="nav-link active bg-yellow">
              <i class="nav-icon fas fa fa-wrench"></i>
              <p>
                Administración
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
          @if (auth()->user()->mroles->nombre == 'administrador')

              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Agendamiento</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('servicios.index')}}" class="nav-link">
                  <i class="fas fa-cut nav-icon"></i>
                  <p>Servicios</p>
                </a>
              </li>

              <li class="nav-item">
              <a href="{{route('sedes.index')}}" class="nav-link">
                  <i class="fas fa-city nav-icon"></i>
                  <p>Sedes</p>
                </a>
              </li>
              
          @else

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Agendamiento</p>
                </a>
              </li>
              
          @endif

            </ul>
          </li>
       </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container">

        @if(session('status'))

          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="row">
              <div class="col-1 text-center"><i class="fas fa-check"></i></div>                      
              <div class="col-10">
                {{session('status')}}
              </div>
            </div> 

          </div>

        @endif
          

          @yield('content')        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer bg-gray-dark text-dark">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      do it!
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="#">Erazo Bros.</a></strong> Todos los derechos reservados.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/js/adminlte.min.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>

<script>
  $(function () {

    $('#tabla').removeAttr('width').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "columnDefs": [
        { "width": "85px", "targets": -1 },        
      ],
      "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Registros del _START_ al _END_ de  _TOTAL_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrados _MAX_ registros)",
            "search":"Buscar",
            "paginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            }
        }
    });
  });

</script>

<script>
window.onload=function(){
  $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      action = $('#formDelete').attr('data-action').slice(0,-1)
      
      
      console.log(action+id)
      $('#formDelete').attr('action',action+id)
      var modal = $(this)
      modal.find('.modal-title').text('Vas a eliminar el elemento #: ' + id)
      
  });
};

$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

toastr.options={
  "positionClass": "toast-top-center",
  "showEasing": "swing",
  "hideEasing": "swing",
  "showMethod": "slideDown",
  "hideMethod": "slideUp"
};

@if(Session::Has('success')) 

    toastr.success("{{Session::get('success')}}")

@endif

</script>

</body>

</html>
