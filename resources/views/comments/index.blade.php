@extends('layouts.panel')
@section('content')

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">نام</th>
      <th scope="col">ایمیل</th>
      <th scope="col">متن</th>
      <th scope="col">عملیات</th>
    </tr>
  </thead>
  <tbody>
    @foreach($comments as $key => $comment)
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$comment->name}}</td>
      <td>{{$comment->email}}</td>
      <td>{{Str::limit($comment->text, 10)}}</td>
      <td>
        <a href="{{url('/posts/'.$comment->post_id)}}" >{{$comment->post->title}}</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{$comments->links()}}

@stop

