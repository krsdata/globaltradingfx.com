<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link elevation-4">
      <img src="{{asset('backend/img/logo.png')}}" alt="GlobalFX" class="brand-image    ">
      <span class="brand-text font-weight-light">GlobalFX</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item" style="background:#007bff">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Dashboard
              </p>
            </a>
          </li>
          @if (Auth::user()->role_id == 1)
          <li class="nav-item">
            <a href="{{route('position.index')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Position
                <span class="right badge badge-warning">Position</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('deposit.getdeposit')}}" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Deposits
                <span class="right badge badge-warning">Deposits<i class="fas fa-angle-left right"></i></span>
                <!-- <i class="fas fa-angle-left right">Deposits</i> -->
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a href="{{route('deposit.add')}}" class="nav-link">
                  <i class="nav-icon fas fa-arrow-right left" aria-hidden="true"></i>
                   <p>Add Deposits</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('deposit.getdeposit')}}" class="nav-link">
                  <i class="nav-icon fas fa-arrow-right left"></i>
                  <p>All Deposits</p>
                </a>
              </li>           
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{route('withdrawal.getwithdrawal')}}" class="nav-link">
             <i class="nav-icon fas fa-database left"></i>
              <p>
                Withdrawals
                <span class="right badge badge-warning">Withdr<i class="fas fa-angle-left right"></i></span>
                <!-- <i class="fas fa-angle-left right">Deposits</i> -->
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a href="{{route('withdrawal.add')}}" class="nav-link">
                  <i class="nav-icon fas fa-arrow-right left"></i>
                   <p>Withdrawal Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('withdrawal.getwithdrawal')}}" class="nav-link">
                  <i class="nav-icon fas fa-arrow-right left"></i>
                  <p>ALL Withdrawals</p>
                </a>
              </li>           
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{route('admin-profile')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Account
                <span class="right badge badge-warning">Account</span>
              </p>
            </a>
          </li>
          @else

          <li class="nav-item">
            <a href="{{route('position.index')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Position
                <span class="right badge badge-warning">Position</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('position.index')}}" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Deposits
                <span class="right badge badge-warning">Deposits<i class="nav-icon fas fa-angle-left right"></i></span>
                <!-- <i class="fas fa-angle-left right">Deposits</i> -->
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a href="{{route('deposit.add')}}" class="nav-link">
                  <i class="nav-icon fas fa-arrow-right left" aria-hidden="true"></i>
                   <p>Add Deposit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('deposit.getdeposit')}}" class="nav-link">
                  <i class="nav-icon fas fa-arrow-right left"></i>
                  <p>All Deposit</p>
                </a>
              </li>           
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{route('withdrawal.getwithdrawal')}}" class="nav-link">
             <i class="nav-icon fas fa-database left"></i>
              <p>
                Withdrawals
                <span class="right badge badge-warning">Withdrawal<i class="nav-icon fas fa-angle-left right"></i></span>
                <!-- <i class="fas fa-angle-left right">Deposits</i> -->
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a href="{{route('withdrawal.add')}}" class="nav-link">
                  <i class="nav-icon fas fa-arrow-right left"></i>
                   <p>Withdrawal Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('withdrawal.getwithdrawal')}}" class="nav-link">
                  <i class="nav-icon fas fa-arrow-right left"></i>
                  <p>All Withdrawals</p>
                </a>
              </li>           
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{route('admin-profile')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Account
                <span class="right badge badge-warning">Account</span>
              </p>
            </a>
          </li>

          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
