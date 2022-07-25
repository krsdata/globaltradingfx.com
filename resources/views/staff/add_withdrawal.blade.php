@include('layouts.head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('layouts.header')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    @include('layouts.sidebar')
  </aside>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br><br><br>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Withdrawals Request</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Withdrawals Request</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!--  Add Withdrawals -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-database" style="margin-right: 5px;"></i>Withdrawals Request</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <form method="POST" action="{{ route('withdrawal.add_withdrawal') }}" enctype="multipart/form-data">
                  @csrf
                 <div class="row">
                     <div class="input-group col-4 mb-3">
                       <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                       </div>
                       <input type="text" class="form-control" name="amount" placeholder="Withdrawal Amount" required="">
                     </div>
                     <div class="input-group col-4 mb-3">
                         <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-key"></i></span>
                         </div>
                         <input type="password" class="form-control" name="password" placeholder="Account Password" required="">
                     </div>

                     <div class="input-group col-4 mb-3">
                         <input type="submit" value="Send Request" class="form-control btn btn-secondary float-center">
                     </div>
                 </div>
               </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>            
</body>
</html>
