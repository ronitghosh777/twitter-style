@extends('layouts.app')

@section('content')
    <div class="container" xmlns:v-bind="http://www.w3.org/1999/xhtml">
        <div class="row" id="timeline">
            <div class="col-md-5 col-md-offset-0.5">
                <form action="#" v-on:submit="postStatus">
                    <div class="form-group">
                        <textarea class="form-control" maxlength="140" rows="6" v-model="post"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <p class="lead" v-if="!posts.length">No Posts To See . . .</p>
                <div class="media" v-for="post in posts" track-by="id">
                    <blockquote>
                        <div class="media-left"><img v-bind:src="post.user.avatar"></div>
                        <div class="user">
                        <div class="media-body"><a :href="post.user.profileUrl">@{{ post.user.name }}</a> <small style="display: inline">@{{ post.humanCreatedAt }}</small>
                        </div><p class="lead">@{{ post.body }}</p></div>
                    </blockquote>
                </div>
                <hr>
                <a href="#" class="btn btn-primary" v-if="total>posts.length" v-on:click="getMorePosts($event)">Get More...</a>
            </div>
        </div>
    </div>
@endsection
