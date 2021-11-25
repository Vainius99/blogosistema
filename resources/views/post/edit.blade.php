@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>
                    <form class="white form-group" action="{{route('post.update', [$post])}}" method="post">
                        <div class="form-group row">
                            <label for="post_title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                            <input class="gray form-control col-md-6" type="text" name="post_title" value="{{$post->title}}" />
                        </div>
                        <div class="form-group row">
                            <label for="post_text" class="col-md-4 col-form-label text-md-right"> text: </label>
                            <div class="col-md-6">
                                <textarea name="post_text" cols="5" rows="5">{{$post->text}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="post_category_id" class="col-md-4 col-form-label text-md-right"> Category: </label>
                            <select class="form-control col-md-6 @error('post_category_id') is-invalid @enderror" name="post_category_id">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" @if($category->id == $post->category_id) selected @endif>{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Edit category</button>
                    </form>
                                <a class="btn btn-link"style="color: red" href="{{ url('/posts')}}">Back</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
