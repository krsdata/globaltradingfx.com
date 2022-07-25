@include('layouts.head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('layouts.header')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    @include('layouts.sidebar')
  </aside>

 <div class="content-wrapper">
  <br><br><br>
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Profile</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
             <li class="breadcrumb-item active">User Profile</li>
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
         <div class="col-md-3">
           <!-- Profile Image -->
           <div class="card card-primary card-outline">
             <div class="card-body box-profile">
               <div class="text-center">
                @if($profile->image)
                 <img class="profile-user-img img-fluid img-circle"
                      src="{{asset($profile->image)}}"
                      alt="User profile picture">
                @else 
                 <img class="profile-user-img img-fluid img-circle"
                      src="{{asset('backend/img/avatar.png')}}"
                      alt="User profile picture">
                @endif
               </div> 
               <h3 class="profile-username text-center">{{$profile->first_name}}</h3>
               <p class="text-muted text-center">{{$profile->email}} </p>
               @if(Auth()->user()->id)
                <span class="badge badge-success text-center">Online</span>
                @else
                <span class="badge badge-success text-center">Offline</span>
                @endif
             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->

           <!-- About Me Box -->
           <div class="card card-primary">
             <div class="card-header">
               <h3 class="card-title">About Me</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <strong><i class="fas fa-book mr-1"></i> User-ID</strong>

               <p class="text-muted">#{{$profile->email}}</p>
               <hr>
               <strong><i class="fas fa-envelope mr-1"></i> Email:</strong>

               <p class="text-muted">{{$profile->email}}</p>

               <hr>

               <strong><i class="fas fa-phone mr-1"></i> Contact Number</strong>

               <p class="text-muted">{{$profile->phone}}</p>

               <hr>
               <strong>Reg. @: </strong><p>{{$profile->created_at}}</p>
               <strong>Reg. Ip: </strong><p>127.158.11.10.2</p>
               <strong>Current Status </strong>
               <p>
                @if(Auth()->user()->id)
                <span class="badge badge-success">Online</span>
                @else
                <span class="badge badge-success">Offline</span>
                @endif
                </p>
             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->
         </div>
         <!-- /.col -->
         <div class="col-md-9">
           <div class="card">
             <div class="card-header p-2">
               <ul class="nav nav-pills">
                 <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">KYC Details</a></li>
                 <li class="nav-item"><a class="nav-link" href="#bank_detail" data-toggle="tab">Bank Details</a></li>
                 <li class="nav-item"><a class="nav-link" href="#profile_details" data-toggle="tab">Change Avatar & Detail</a></li>
                 <li class="nav-item"><a class="nav-link" href="#Change_password" data-toggle="tab">Change Password</a></li>
               </ul>
             </div><!-- /.card-header -->
             <div class="card-body">
               <div class="tab-content">
                 <div class="active tab-pane" id="activity">
                  <div>
                    <img src="{{asset('backend/img/addhar_default.jpg')}}" class="img-fluid center" alt="docxc">
                  </div>
                 </div>
                 <!-- /.tab-pane -->
                 <div class="tab-pane" id="bank_detail">
                   <!-- The timeline -->
                       @csrf
                   <form class="form-horizontal border px-4 pt-2 pb-3" method="POST" action="{{route('profile-update',$profile->id)}}"
                       enctype="multipart/form-data">
                       @csrf
                       <input type="hidden" name="mode" value="bank_details">
                     <div class="form-group row">
                       <label for="inputName" class="col-sm-2 col-form-label">Bank Name:</label>
                       <div class="col-sm-10">
                         <input type="text" class="form-control" id="inputName" name="bank_name" placeholder="Bank Name" value="{{ $profile->bank_name ?? ''}}" required>
                       </div>
                     </div>
                     <div class="form-group row">
                       <label for="inputAccount" class="col-sm-2 col-form-label">Account Number:</label>
                       <div class="col-sm-10">
                         <input type="text" class="form-control" id="inputAccount" name="account_number" placeholder="Account number" value="{{ $profile->account_number ?? ''}}" required>
                       </div>
                     </div>
                     <div class="form-group row">
                       <label for="inputIfsc" class="col-sm-2 col-form-label">IFSC:</label>
                       <div class="col-sm-10">
                         <input type="text" class="form-control" id="inputIfsc" name="ifsc_code" placeholder="ifsc code" value="{{ $profile->ifsc_code ?? ''}}" required>
                       </div>
                     </div>
                     <div class="form-group row">
                       <div class="offset-sm-2 col-sm-10">
                         <button type="submit" class="btn btn-danger">Update</button>
                       </div>
                     </div>
                   </form>
                 </div>
                 <!-- /.tab-pane -->

                 <div class="tab-pane" id="profile_details">
                   <form class="border px-4 pt-2 pb-3" method="POST" action="{{route('profile-update',$profile->id)}}"
                       enctype="multipart/form-data">
                       @csrf
                       <input type="hidden" name="mode" value="personal_info">
                       <div class="form-group">
                           <label for="inputTitle" class="col-form-label">First Name</label>
                         <input id="inputTitle" type="text" name="first_name" placeholder="Enter First name"  value="{{$profile->first_name}}" class="form-control" required>
                         @error('first_name')
                         <span class="text-danger">{{$message}}</span>
                         @enderror
                         </div>
                          <div class="form-group">
                           <label for="inputTitle" class="col-form-label">Last Name</label>
                         <input id="inputTitle" type="text" name="last_name" placeholder="Enter Last name"  value="{{$profile->last_name}}" class="form-control" required>
                         @error('last_name')
                         <span class="text-danger">{{$message}}</span>
                         @enderror
                         </div>
                   
                         <div class="form-group">
                             <label for="inputEmail" class="col-form-label">Email</label>
                           <input id="inputEmail" disabled type="email" name="email" placeholder="Enter email"  value="{{$profile->email}}" class="form-control">
                           @error('email')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                         </div>
                   
                         <div class="form-group">
                         <label for="inputPhoto" class="col-form-label">Photo</label>
                         <div class="input-group">
                             <input id="inputPhoto" id="thumbnail" class="form-control" type="file" name="image" />
                         </div>
                           @error('image')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                         </div>
                         <div class="form-group">
                             <label for="role" class="col-form-label">Role</label>
                           <input id="role" disabled type="text"  placeholder="Enter email"  value="{{$profile->role_id == 1 ? 'Admin' : 'Staff'}}" class="form-control">
                           @error('role')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                           </div>

                           <button type="submit" class="btn btn-success btn-sm">Update</button>
                   </form>
                 </div>

                 <div class="tab-pane" id="Change_password">
                   <form method="POST" action="{{ route('change.password') }}">
                        @csrf  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                @error('current_password')
                                    <span class="text-danger">{{$message}}</span>
                                     @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                @error('new_password')
                                    <span class="text-danger">{{$message}}</span>
                                     @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                @error('new_confirm_password')
                                    <span class="text-danger">{{$message}}</span>
                                     @enderror
                            </div>
                        </div>
   
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </form>
                 </div>
                 <!-- /.tab-pane -->
               </div>
               <!-- /.tab-content -->
             </div><!-- /.card-body -->
           </div>
           <!-- /.card -->
         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>
  <!-- /.content-wrapper -->
  @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- Page specific script -->
<script>
  $(function () {
    // $("#example1").DataTable({
    //   "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#user-dataTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



 
</body>
</html>
