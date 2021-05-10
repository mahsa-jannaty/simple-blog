@extends('layouts.main')

@section('content')
<div class="post-preview">
    <a href="post.html">
        <h2 class="post-title">{{$post->title}}</h2>
        <h3 class="post-subtitle">{{$post->description}}</h3>
    </a>
    <p class="post-meta">
        پست شده در تاریخ
        {{jDate($post->created_at)->format('%A، %d %B %y')}}
    </p>
</div>
<hr />

@endsection