<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard-') }}" class="app-brand-link">
            
            <span class="app-brand-text demo menu-text fw-bold">IKONIC</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
      



      

        <li class="menu-item {{ Request::url() == route('admin-home') ? 'active' : '' }}">
            <a href="{{ route('admin-home') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-home"></i>
                <div data-i18n="">Dashboard</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">FEED</span>
        </li>
        <li class="menu-item {{ Request::url() == route('admin-users') ? 'active' : '' }}">
            <a href="{{ route('admin-users') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="">Users</div>
            </a>
        </li>
        
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li>

        <li class="menu-item {{ Request::url() == route('admin-feedback') ? 'active' : '' }}">
            <a href="{{ route('admin-feedback') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-file"></i>
                <div data-i18n="">Feedbacks</div>
            </a>
        </li>


        <li class="menu-item {{ Request::url() == route('admin-enable-comment') ? 'active' : '' }}">
            <a href="{{ route('admin-enable-comment') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-message-circle"></i>
                <div data-i18n="">Enable Comment</div>
            </a>
        </li>
     

        
       

       

      

       
    </ul>
</aside>
