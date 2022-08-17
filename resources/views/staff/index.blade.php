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
            <h1>All Position</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">all position</li>
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
                <h3 class="card-title"><i class="fas fa-chart-line" style="margin-right: 5px;"></i> All Position</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="user-dataTable" class="table table-bordered table-hover table-responsive" width="100%">
                  <thead>
                            <tr>
                              <th>S.NO.</th>
                              <th>User Name</th>
                              <th>Market Name</th>
                              <th>Bid Amount</th>
                              <th>P & L Amount</th>
                              <th>Date | Time</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                     </thead>
                     <tbody>
                      <?php $i = 1; ?>
                      @foreach($data as $position)
                        <tr>
                           <td>{{ $i }}</td>
                           <td>{{ $user->first_name??'NA' }}</td>
                           <td>{{ $position->market_name }}</td>
                           <td>{{ $position->bid_amount }}</td>
                           <td>{{ $position->p_l_amount }}</td>
                           <td>{{ $position->date_time }}</td>
                           <td>
                            @if($position->status == 1 )
                              <span class="badge badge-success">Open</span>
                           @else
                              <span class="badge badge-warning">Closed</span>
                            @endif
                          </td>
                           <td>Process...wait
                              <!-- <a href="#" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a> -->
                         </td>
                        </tr>
                        <?php $i++; ?>
                       @endforeach
                      </tbody>
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
