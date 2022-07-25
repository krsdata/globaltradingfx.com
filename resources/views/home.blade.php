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

    <div class="container-fluid">
    @include('layouts.notification')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h3 class="">{{ Auth::user()->role_id == 1 ? 'Admin' : 'Staff'}} Dashboard</h3>
    </div>

    <!-- Content Row -->
    <div class="row">
      @if(Auth::user()->role_id == 1)
      <!--  All Staff count  -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Withdrawal</div>
                <div id="staff" class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['allWithdrawal'] }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-sitemap fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
     <!-- All users count  -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Deposit</div>
                <div id="customer" class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['allDeposit'] }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-sitemap fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>

          
      @elseif(Auth::user()->role_id == 2)
        <!--  All Staff count  -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Withdrawal</div>
                <div id="staff" class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['allWithdrawal'] }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-sitemap fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
     <!-- All users count  -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Deposit</div>
                <div id="customer" class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['allDeposit'] }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-sitemap fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>        <!--  <div class="col-md-12">
            <div class="card card-danger">
            
              </div>
              <div class="card-body">
                <canvas id="donutChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
      </div> -->
      @endif
             </div>
        </div>
       
     </div> 
    
  
  <!-- /.content-wrapper -->
  @include('layouts.footer')
</div>

  
 <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Page specific script -->
<script type="text/javascript">
  
   //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var staff = $("#staff").text();
    var customer = $("#customer").text();
    var complete = $("#complete").text();
    var pending =  $("#pending").text();
    var assign_data =  $("#assign_data").text();  
    var all_data_record =  $("#all_data_record").text();
   
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Staff',
          'Customer',
          'Complete',
          'Pending',
          'AassignData',
          'Data Record',
          
      ],
      datasets: [
        {
          data: [staff,customer,pending,complete,assign_data,all_data_record],
          backgroundColor : ['blue', 'green', 'orange', 'red','info','#900C3F'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
</script>
<script type="text/javascript">
  
   //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var complete = $("#complete_staff").text();
    var pending =  $("#pending_staff").text();
    var records_staff =  $("#records_staff").text();
    var assign_records_staff =  $("#assign_records_staff").text();

   
    var donutChartCanvas = $('#donutChart2').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Complete',
          'Pending',
          'Staff Records',
          'Assign Data',
      ],
      datasets: [
        {
          data: [complete,pending,records_staff,assign_records_staff],
          backgroundColor : [ 'green', 'orange','blue','#900C3F'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
</script>
</body>
</html>
