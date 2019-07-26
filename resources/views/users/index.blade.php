@extends('layouts.default')

@section('content')
    USERS
    @forelse ($users as $user)
        @include('components.users.user-card', [ 'user' => $user ])
    @empty
        <p>@lang('erors.no-data')</p>
    @endforelse

@endsection