<div class="user-card">
    <div class="user-card__photo">
        <a href="{{ route('user.profile', $user->route ?? $user->username) }}" title="{{ $user->username }}">
            <img src="{{ UserHelper::get_avatar($user->profile->avatar) }}" alt="{{ $user->username }}">
            @if( $user->is_online() )
                <span class="user-card__dot-status user-card__dot-status--online"></span>
            @else
                <span class="user-card__dot-status"></span>
            @endif
        </a>
    </div>
    <div class="user-card__information">
        <a class="user-card__name" href="{{ route('user.profile', $user->route ?? $user->username) }}" title="{{ $user->username }}">
            {{ $user->username }}
        </a>

        @if($user->is_online())
            <div class="user-card__status">онлайн</div>
        @else
            <div class="user-card__status">
                {{ UserHelper::getOnlineTime($user->profile->gender, $user->profile->offline_at->diffForHumans()) }}
            </div>
        @endif
    </div>
</div>