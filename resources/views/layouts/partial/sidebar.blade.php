<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">

      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          Admin Dashboard
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ Request::is('admin/dashboard') ? 'active': '' }}">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ Request::is('admin/slide*') ? 'active': '' }}">
            <a class="nav-link" href={{ route('slide.index') }}>
              <i class="material-icons">slideshow</i>
              <p>Sliders</p>
            </a>
          </li>
          <li class="{{ Request::is('admin/category*') ? 'active': '' }}">
            <a class="nav-link" href={{ route('category.index') }}>
              <i class="material-icons">content_paste</i>
              <p>Categories</p>
            </a>
          </li>
          <li class="{{ Request::is('admin/item*') ? 'active': '' }}">
            <a class="nav-link" href={{ route('item.index') }}>
              <i class="material-icons">library_books</i>
              <p>Items</p>
            </a>
          </li>
          <li class="{{ Request::is('admin/reservation') ? 'active': '' }}">
            <a class="nav-link" href={{ route('reservation.index') }}>
              <i class="material-icons">bubble_chart</i>
              <p>Reservation</p>
            </a>
          </li>
          <li class="{{ Request::is('admin/contact') ? 'active': '' }}">
            <a class="nav-link" href={{ route('contact.index') }}>
              <i class="material-icons">notifications</i>
              <p>Messages</p>
            </a>
          </li>

        </ul>
      </div>
    </div>