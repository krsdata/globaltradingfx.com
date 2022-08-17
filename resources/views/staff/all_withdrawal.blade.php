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
            <h1>Withdrawals</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">All Withdrawals Request</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      @include('layouts.notification')
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-database" style="margin-right: 5px;"></i> All Withdrawals Request</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="user-dataTable" class="table table-bordered table-hover" width="100%">
                  <thead>
                            <tr>
                              <th>S.NO.</th>
                              <th>Request-ID</th>
                              <th>Req. By</th>
                              <th>Amount</th>
                              <th>Date | Time</th>
                              <th>Status</th>
                            </tr>
                     </thead>
                     <tbody>
                      <?php $i = 1; ?>
                      @foreach($data as $position)
                        <tr>
                           <td>{{ $i }}</td>
                           <td>{{ $position->request_id }}</td>
                           <td>{{ $position->first_name }}</td>
                           <td>{{ $position->amount }}</td>   
                           <td>{{ $position->date_time }}</td>
                           <td>
                            @if($position->status == 1 )
                              <span class="badge badge-success">Open</span>
                           @else
                              <span class="badge badge-warning">Closed</span>
                            @endif
                          </td>
                        </tr>
                        <?php $i++; ?>
                       @endforeach
                </table>
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

   <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '.dltBtn', function(e) {
             e.preventDefault();

            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>

   <!-- ajax dataTable -->
 <script type="text/javascript">
   $(document).ready(function(){
      $('#user-dataTable').DataTable({
          
      });

    });
</script>            
</body>
</html>
