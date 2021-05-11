@extends('layouts.main')

@section('content')

<form action="{{url('/posts/store')}}" method="post">
    @csrf()
    <div class="form-group">
        <label for="titleInput">عنوان پست</label>
        <input name="title" id="titleInput" type="text" class="form-control" value="{{old('title')}}">
        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="descriptionInput">متن پست</label>
        <textarea name="description" id="descriptionInput" type="text" class="form-control">{{old('description')}}</textarea>
        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">ثبت</button>
    </div>
</form>

@endsection