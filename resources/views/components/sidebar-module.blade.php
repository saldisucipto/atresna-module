<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('indexModule') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('indexModule') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="/storage/company-info/{{$companyInfo->company_logo_info}}" alt="">
            </a>
        </div>
        <ul class="sidebar-menu">
        <li class="menu-header">DASHBOARD</li>
         <li class="{{ Request::routeIs('indexModule') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('indexModule') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
        </ul>
    </aside>
</div>
