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
      



      

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">FEED</span>
        </li>
        <li class="menu-item {{ Request::url() == route('dashboard-feedback') ? 'active' : '' }}">
            <a href="{{ route('dashboard-feedback') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-file"></i>
                <div data-i18n="">Submit Feedback</div>
            </a>
        </li>
        
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li>
        <li class="menu-item {{ Request::url() == route('dashboard-feedback-list') ? 'active' : '' }}">
            <a href="{{ route('dashboard-feedback-list') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-file"></i>
                <div data-i18n="">Feedback's</div>
            </a>
        </li>

        
       

       

      

       
    </ul>
</aside>
