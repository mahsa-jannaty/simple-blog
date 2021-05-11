@extends('layouts.main')

@section('title')
پست ها
@endsection

@section('content')

@foreach($posts as $post)    
<div class="post-preview">
    <a href="post.html">
        <h2 class="post-title">{{$post->title}}</h2>
        <h3 class="post-subtitle">{{Str::limit($post->description, 240)}}</h3>
        <div class="text-left">
        <a class="btn btn-primary" href="{{url('/posts/'.$post->id)}}">ادامه مطلب</a>
        <a class="btn btn-danger" href="{{url('/posts/delete/'.$post->id)}}">حذف</a>
        <a class="btn btn-default" href="{{url('/posts/edit/'.$post->id)}}">ویرایش</a>
        </div>
    </a>
    <p class="post-meta">
        پست شده در تاریخ
        {{jDate($post->created_at)->format('%A، %d %B %y')}}
    </p>
</div>
<hr />
@endforeach
<div class="clearfix"><a class="btn btn-primary float-right" href="#!">Older Posts →</a></div>


@endsection