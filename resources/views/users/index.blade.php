@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-0.5">
                <h3>{{ $user->name }}</h3>
                @if(Auth::user()->isNot($user))
                    @if(Auth::user()->isFollowing($user))
                        <a href="{{route('user.unfollow', $user)}}">Unfollow</a>
                    @else
                        <a href="{{route('user.follow', $user)}}">Follow</a>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection