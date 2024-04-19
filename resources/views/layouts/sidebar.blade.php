  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('/')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Supl-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Attractions</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Supl-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        @if(session('prefix') == 'admin')
          <li>
            <a href="{{ route(session('prefix', 'agent') . '.all_attraction') }}">
              <i class="bi bi-circle"></i><span>List Attractions</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route(session('prefix', 'agent') . '.view_attraction') }}">
              <i class="bi bi-circle"></i><span>View All Attraction</span>
            </a>
          </li>
          @endif
        </ul>
      </li><!-- End Supplier Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#order-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Bookings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="order-nav" class="nav-content collapse " data-bs-parent="#order-nav">
          <li>
            <a href="{{ route(session('prefix', 'agent') . '.all_booking') }}">
              <i class="bi bi-circle"></i><span>All Bookings</span>
            </a>
          </li>
          <!-- <li>
            <a href="addneworder.php">
              <i class="bi bi-circle"></i><span>Add New Order</span>
            </a>
          </li> -->
        </ul>
      </li>
      <!--==========  End Order----------------->
       <?php if(session('prefix')=='admin'){?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Agents</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route(session('prefix', 'agent') . '.all_agent') }}">
              <i class="bi bi-circle"></i><span>All Agents</span>
            </a>
          </li>
          <li>
            <a href="{{ route(session('prefix', 'agent') . '.add_agent') }}">
              <i class="bi bi-circle"></i><span>Add New Agents</span>
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
      <!-- End User Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Subcri-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cash-coin"></i><span>Subscription</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Subcri-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Subscription.php">
              <i class="bi bi-circle"></i><span>All Subscription</span>
            </a>
          </li>
        </ul>
      </li> -->

      <!-- End Subscription Nav -->




      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route(session('prefix', 'agent') . '.topup') }}">
          <i class="bi bi-phone-fill"></i>
          <span>Top Up</span>
        </a>
      </li>

      <!-- End top op Nav-->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route(session('prefix', 'agent') . '.admin_invoice') }}">
          <i class="bi bi-receipt"></i>
          <span>Invoice</span>
        </a>
      </li>

      <!-- End Invoice Nav-->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route(session('prefix', 'agent') . '.all_chat') }}">
          <i class="bi bi-chat-dots"></i>
          <span>Chat</span>
        </a>
      </li>

      <!-- End Chat Nav-->

      <li class="nav-item">
        <a class="nav-link collapsed" href="report.php">
          <i class="bi bi-file-text"></i>
          <span>Report</span>
        </a>
      </li>

      <!-- End Report Nav-->

      <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="feedback.php">
              <i class="bi bi-receipt"></i>
              <span>Feedback/Reviews</span>
            </a>
          </li> -->

      <!-- End Feedback Nav-->

      <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="delivery.php">
              <i class="bi bi-receipt"></i>
              <span>All Delivery</span>
            </a>
          </li> -->

      <!-- End Invoice Nav-->

      <!--<li class="nav-item">-->
      <!--  <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">-->
      <!--    <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>-->
      <!--  </a>-->
      <!--  <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">-->
      <!--    <li>-->
      <!--      <a href="tables-general.php">-->
      <!--        <i class="bi bi-circle"></i><span>General Tables</span>-->
      <!--      </a>-->
      <!--    </li>-->
      <!--    <li>-->
      <!--      <a href="tables-data.php">-->
      <!--        <i class="bi bi-circle"></i><span>Data Tables</span>-->
      <!--      </a>-->
      <!--    </li>-->
      <!--  </ul>-->
      <!--</li> End Tables Nav -->

      <!--<li class="nav-item">-->
      <!--  <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">-->
      <!--    <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>-->
      <!--  </a>-->
      <!--  <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">-->
      <!--    <li>-->
      <!--      <a href="charts-chartjs.php">-->
      <!--        <i class="bi bi-circle"></i><span>Chart.js</span>-->
      <!--      </a>-->
      <!--    </li>-->
      <!--    <li>-->
      <!--      <a href="charts-apexcharts.php">-->
      <!--        <i class="bi bi-circle"></i><span>ApexCharts</span>-->
      <!--      </a>-->
      <!--    </li>-->
      <!--    <li>-->
      <!--      <a href="charts-echarts.php">-->
      <!--        <i class="bi bi-circle"></i><span>ECharts</span>-->
      <!--      </a>-->
      <!--    </li>-->
      <!--  </ul>-->
      <!--</li> End Charts Nav -->

      <!--<li class="nav-item">-->
      <!--  <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">-->
      <!--    <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>-->
      <!--  </a>-->
      <!--  <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">-->
      <!--    <li>-->
      <!--      <a href="icons-bootstrap.php">-->
      <!--        <i class="bi bi-circle"></i><span>Bootstrap Icons</span>-->
      <!--      </a>-->
      <!--    </li>-->
      <!--    <li>-->
      <!--      <a href="icons-remix.php">-->
      <!--        <i class="bi bi-circle"></i><span>Remix Icons</span>-->
      <!--      </a>-->
      <!--    </li>-->
      <!--    <li>-->
      <!--      <a href="icons-boxicons.php">-->
      <!--        <i class="bi bi-circle"></i><span>Boxicons</span>-->
      <!--      </a>-->
      <!--    </li>-->
      <!--  </ul>-->
      <!--</li> End Icons Nav -->

      <!--<li class="nav-heading">Pages</li>-->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="register.php">
          <i class="bi bi-card-list"></i>
          <span>Register Agent</span>
        </a>
      </li>  -->
      <!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route(session('prefix', 'agent') . '.profile') }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="faq.php">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li> --><!-- End F.A.Q Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="contact.php">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li> --><!-- End Contact Page Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" href="login.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="error-404.php">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li> --><!-- End Error 404 Page Nav -->

      <!--  <li class="nav-item">
        <a class="nav-link collapsed" href="blank.php">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li> --><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->