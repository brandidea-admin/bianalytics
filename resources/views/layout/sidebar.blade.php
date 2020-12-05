<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            INV.<span>CONNECT</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Investors</li>

            @if(Auth::user()->access_type == 'Admin')
                    <li class="nav-item {{ active_class(['user']) }}">
                        <a href="{{ url('/user') }}" class="nav-link">
                            <i class="link-icon" data-feather="search"></i>
                            <span class="link-title">List</span>
                        </a>
                    </li>
            @endif

            
            
            <!-- <li class="nav-item {{ active_class(['search_list/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#search_list" role="button" aria-expanded="{{ is_active_route(['search_list/*']) }}" aria-controls="search_list">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Search-List</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['search_list/*']) }}" id="search_list">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/search_list') }}" class="nav-link {{ active_class(['search_list']) }}">Google Search</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/email_permut') }}" class="nav-link {{ active_class(['email_permut']) }}">E-Mail Permutation</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/news_read') }}" class="nav-link {{ active_class(['news_read']) }}">News Read</a>
                        </li>
                    </ul>
                </div>
            </li> -->


            <!-- <li class="nav-item {{ active_class(['lead']) }}">
                <a href="{{ url('/lead') }}" class="nav-link">
                    <i class="link-icon" data-feather="activity"></i>
                    <span class="link-title">Leads</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['companies']) }}">
                <a href="{{ url('/companies') }}" class="nav-link">
                    <i class="link-icon" data-feather="briefcase"></i>
                    <span class="link-title">Companies</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['events']) }}">
                <a href="{{ url('/events') }}" class="nav-link myspin">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">News</span>
                </a>
            </li> -->

            <!-- <li class="nav-item {{ active_class(['api']) }}">
                <a href="{{ url('/api') }}" class="nav-link">
                    <i class="link-icon" data-feather="cloud"></i>
                    <span class="link-title">API</span>
                </a>
            </li> -->

            <!-- <li class="nav-item {{ active_class(['settings/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#master_keyword" role="button" aria-expanded="{{ is_active_route(['master_keyword/*']) }}" aria-controls="master_keyword">
                    <i class="link-icon" data-feather="tool"></i>
                    <span class="link-title">Settings</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['master_keyword/*']) }}" id="master_keyword">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/master_keyword') }}" class="nav-link {{ active_class(['master_keyword']) }}">Master Keywords</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/country') }}" class="nav-link {{ active_class(['country']) }}">Countries</a>
                        </li>
                        @if(Auth::user()->type == 'Admin')
                        <li class="nav-item">
                            <a href="{{ url('/user') }}" class="nav-link {{ active_class(['user']) }}">Users</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li> -->
        </ul>
    </div>
</nav>
