<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    @if (Auth::guest())
        <li><a href="{{ url('/login') }}">@lang('layouts/nav.login')</a></li>
        <li><a href="{{ url('/register') }}">@lang('layouts/nav.register')</a></li>
    @else
        <li>
            <a href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                @lang('layouts/nav.logout')
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {!! csrf_field() !!}
            </form>
        </li>
    @endif
</ul>

<nav>
    <div class="nav-wrapper">
        <a href="{{ url('/') }}" class="brand-logo">
            {!! config('app.name', 'Laravel') !!}
        </a>
        <a href="#!" data-activates="mobile-demo" class="button-collapse">
            <i class="material-icons">menu</i>
        </a>
        
        <ul class="hide-on-med-and-down nav-left-align">
            <li><a href="#">Some</a></li>
            <li><a href="#">Random</a></li>
            <li><a href="#">Pages</a></li>
            
            <li>
                <a class="dropdown-button" href="#!" data-activates="dropdown1">
                    {{ Auth::guest() ? trans('layouts/nav.account') : Auth::user()->name }}
                    <i class="material-icons right">arrow_drop_down</i>
                </a>
            </li>
        </ul>

        <ul class="side-nav" id="mobile-demo">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">Javascript</a></li>
            <li><a href="mobile.html">Mobile</a></li>
        </ul>
    </div>
</nav>
          