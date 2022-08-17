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
            <h1>Add Deposit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Deposit Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Account Information</h3>
            </div>
            <div class="card-body">
               <h5><b>Axis Bank</b></h5>
               <h5><b>Trading Trade Global</b></h5>
               <h5><b>A/C : 20001375230</b></h5>
               <h5><b>IFSC : AXIS0060GL</b></h65>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add New Deposit</h3>
            </div>
             <form method="POST" action="{{ route('deposit.add_deposit') }}" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">

                  <div class="col-md-12">
                    <div class="card border-left-success h-100">
                      <div class="card-body" style="background-color: #d5d9dc">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <p>Please follow the following steps for deposit fund.</p>
                            <hr>
                            <div class="text-xs">
                            <p>1) Scan our OR Code and send money by UPI / PYTM/ GOOGLE PAY Phone Pay etc.</p>
                            <p>2) Enter Your Transaction Id & Upload Your payment receipt and clicl on deposit now button.</p>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-exchange"></i></span>
                    </div>
                    <input type="text" class="form-control" name="transaction_id" placeholder="Transaction ID" required="">
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="text" class="form-control" name="amount" placeholder="Deposit Amount" required="">
                  </div>

                  <div class="form-group">
                    <label for="fileName">Upload Payment Receipt: <span style="color:#ff0000">*</span>  </label>
                    <input type="file" id="fileName" name="deposit_receipt" class="form-control" required="">
                  </div>

                  <div class="form-group">
                   <input type="submit" value="Deposit Now" class="form-control btn btn-secondary float-center">
                  </div>
                </div>
            </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
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
