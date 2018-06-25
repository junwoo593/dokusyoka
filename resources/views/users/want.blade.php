@extends('layouts.app')

@section('content')
    <div class="user-profile">
        <div class="icon text-center">
            <img src="{{ Gravatar::src($user->email, 100) . '&d=mm' }}" alt="" class="img-circle">
        </div>
        <div class="name text-center">
            <h1>{{ $user->name }}</h1>
        </div>
        @include('user_follow.follow_button', ['user' => $user])
            <ul class="nav nav-tabs nav-justified">
               <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">books <span class="badge">{{ $count_books }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">Followings <span class="badge">{{ $count_followings }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/want') ? 'active' : '' }}"><a href="{{ route('users.want', ['id' => $user->id]) }}">want <span class="badge">{{ $count_want }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/have') ? 'active' : '' }}"><a href="{{ route('users.have', ['id' => $user->id]) }}">have <span class="badge">{{ $count_have }}</span></a></li>
            </ul>
    </div>
    @include('books.books', ['books' => $want_books])
    {!! $want_books->render() !!}
@endsection