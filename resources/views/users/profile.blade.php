@extends('layouts.profile')

@section('profile')
    <img src="{{ UserHelper::get_avatar($user->profile->avatar) }}" alt="" width="100%">
    <h4>{{ $user->username }}</h4>
    <div>125</div>
    <div>11</div>
    <div>234</div>


@endsection


@section('content')
    USER PROFILE

@endsection