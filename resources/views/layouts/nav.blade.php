<!-- Dropdown Structure -->
<ul id="dropdown_nav_menu" class="dropdown-content">
    @if (Auth::guest())
        <li><a href="{!! url('/login') !!}">Login</a></li>
        <li><a href="{!! url('/register') !!}">Register</a></li>
    @else
        <li><a href="{!! url('/settings') !!}">Settings</a></li>
        <li><a href="{!! url('/logout') !!}" id="logout_anchor">Logout</a></li>
    @endif
</ul>

<nav>
    <div class="nav-wrapper">
        <a href="{!! url('/') !!}" class="brand-logo">
            {!! config('app.name', 'Laravel') !!}
        </a>
        <a href="#nav_mobile" data-activates="nav_mobile" class="button-collapse">
            <i class="material-icons">menu</i>
        </a>
        
        <ul class="hide-on-med-and-down nav-left-align">
            @include('layouts.menu')
            
            <li>
                <a class="dropdown-button" href="#!" data-activates="dropdown_nav_menu">
                    {{ Auth::guest() ? 'Account' : Auth::user()->name }}
                    <i class="material-icons right">arrow_drop_down</i>
                </a>
            </li>
        </ul>

        <ul class="side-nav" id="nav_mobile">
            @include('layouts.menu')
        </ul>
    </div>
</nav>
          