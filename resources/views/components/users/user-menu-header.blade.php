@guest

@else
<div class="user-menu-header" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <a class="user-menu-header__name" href="{{ route('user.profile', Auth::user()->route ?? Auth::user()->username) }}" title="{{ Auth::user()->username }}">
        {{ Auth::user()->username }}
    </a>
    <div class="user-menu-header__photo">
        <img  src="{{ UserHelper::get_avatar(Auth::user()->profile->avatar) }}" alt="{{ Auth::user()->username }}">
    </div>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
    </div>
</div>
@endguest