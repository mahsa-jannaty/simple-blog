@extends('layouts.main')

@section('content')
@include('includes.post')

@foreach($comments as $comment)
<div class="card">
  <div class="card-body">
{{$comment->name}}
 
 {{jDate($comment->created_at)->ago()}}
گفته:
{{$comment->text}}
</div>
</div>
@endforeach





<form action="{{url('/comments/store/'.$post->id)}}" method="POST" class="row">
    @csrf
    <!-- <input type="hidden" value="{{$post->id}}"> -->
    <div class="form-group col-6">
        <label for="nameInput">نام</label>
        <input id="nameInput" name="name" class="form-control">
    </div>
    <div class="form-group col-6">
        <label for="emailInput">ایمیل</label>
        <input id="emailInput" name="email" class="form-control">
    </div>
    <div class="form-group col-12">
        <label for="textInput">متن نظر</label>
        <textarea class="form-control" name="text" id="textInput" cols="30" rows="4"></textarea>
    </div>
    <div class="form-group col-12 text-left">
        <button class="btn btn-primary" type="submit">ثبت</button>
    </div>
</form>

@endsection