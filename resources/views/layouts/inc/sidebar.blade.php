<aside
      class="
        sidenav
        navbar navbar-vertical navbar-expand-xs
        border-0 border-radius-xl
        my-3
        fixed-start
        ms-3
        bg-gradient-dark
      "
      id="sidenav-main"
    >
      <div class="sidenav-header">
        <i
          class="
            fas
            fa-times
            p-3
            cursor-pointer
            text-white
            opacity-5
            position-absolute
            end-0
            top-0
            d-none d-xl-none
          "
          aria-hidden="true"
          id="iconSidenav"
        ></i>
        <a
          class="navbar-brand m-0"
          href="{{ url('/') }}"
        >
          
          <span class="ms-1 font-weight-bold text-white"
            >Coupon Crush</span
          >
        </a>
      </div>
      <hr class="horizontal light mt-0 mb-2" />
      <div
        class="w-auto max-height-vh-100"
        id="sidenav-collapse-main"
      >
        <ul class="navbar-nav">
          <li class="nav-item {{ Request::is('categories') ? 'active bg-gradient-primary' : ''; }} ">
            <a class="nav-link text-white" href="{{ url('categories') }}">
              <div
                class="
                  text-white text-center
                  me-2
                  d-flex
                  align-items-center
                  justify-content-center
                "
              >
              <i class="fa fa-list-alt"></i>
              </div>
              <span class="nav-link-text ms-1">Categories</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('add-category') ? 'active bg-gradient-primary' : ''; }}">
            <a class="nav-link text-white" href="{{ url('add-category') }}">
              <div
                class="
                  text-white text-center
                  me-2
                  d-flex
                  align-items-center
                  justify-content-center
                "
              >
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">Add Category</span>
            </a>
          </li>

          <li class="nav-item {{ Request::is('products') ? 'active bg-gradient-primary' : ''; }}">
            <a class="nav-link text-white" href="{{ url('products') }}">
              <div
                class="
                  text-white text-center
                  me-2
                  d-flex
                  align-items-center
                  justify-content-center
                "
              >
                <i class="material-icons opacity-10">receipt_long</i>
              </div>
              <span class="nav-link-text ms-1">Products</span>
            </a>
          </li>

          <li class="nav-item {{ Request::is('add-products') ? 'active bg-gradient-primary' : ''; }}">
            <a class="nav-link text-white" href="{{ url('add-products') }}">
              <div
                class="
                  text-white text-center
                  me-2
                  d-flex
                  align-items-center
                  justify-content-center
                "
              >
                <i class="material-icons opacity-10">content_paste</i>
              </div>
              <span class="nav-link-text ms-1">Add Products</span>
            </a>
          </li>


          <li class="nav-item {{ Request::is('orders') ? 'active bg-gradient-primary' : ''; }}">
            <a class="nav-link text-white" href="{{ url('orders') }}">
              <div
                class="
                  text-white text-center
                  me-2
                  d-flex
                  align-items-center
                  justify-content-center
                "
              >
                <i class="fa fa-shopping-cart"></i>
              </div>
              <span class="nav-link-text ms-1">Orders</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link text-white" href=href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
            <div
                class="
                  text-white text-center
                  me-2
                  d-flex
                  align-items-center
                  justify-content-center
                "
              >
              <i class="fa fa-sign-out"></i>
              </div>
              <span class="nav-link-text ms-1">Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </div>
    </aside>