<div class="menu-auth">
    <ul class="menu-auth__list">
        @guest
        <li class="menu-auth__item">
            <a href="{{ route('login') }}" class="menu-auth__link">
                @lang('menu.login')
            </a>
        </li>
        @if (Route::has('register'))
        <li class="menu-auth__item">
            <a href="{{ route('register') }}" class="menu-auth__link">
                @lang('menu.register')
            </a>
        </li>
        @endif
        @else
        <li class="menu-auth__item">
            <a href="{{ route('logout') }}" class="menu-auth__link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                @lang('menu.logout')
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        @endguest
    </ul>
</div>
