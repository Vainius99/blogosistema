@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-group row mb-0">
                <div class="col-md-12">

                    <button type="button" name="addPostB" id="addPostB" value="new" class="btn btn-warning addButton">Add new Post</button>
                    <button class="btn btn-success addMorePost d-none" type="button" name='add-more-post' id="add-more-post"> Add More Posts</button>
                    <a class="btn btn-link"style="color: red" href="{{ url('/categories')}}">Back</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Create Category') }} </div>
                    <form class="white form-group" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary submitB" value="new">Create category</button>
                        </div>
                        <div class="form-group row">
                            <label for="category_title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                            <input class="gray form-control col-md-6 @error('category_title') is-invalid @enderror" required="required" type="text" name="category_title" value="" />
                            @error('category_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="category_description" class="col-md-4 col-form-label text-md-right"> Description: </label>
                            <div class="col-md-6">
                                <textarea class="summernote @error('category_description') is-invalid @enderror" name="category_description" cols="5" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="addPost d-none">
                            <div class="card-header">{{ __('Create Post') }}</div>
                                <div class="form-group row">
                                    <label for="post_title" class="col-md-4 col-form-label text-md-right"> {{ __('Title:') }} </label>
                                    <input class="gray form-control col-md-6 @error('post_title') is-invalid @enderror" type="text" name="post_title[]" value="" />
                                    @error('post_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="post_text" class="col-md-4 col-form-label text-md-right"> {{ __('Text:') }} </label>
                                    <div class="col-md-6">
                                        <textarea class="summernote @error('post_text') is-invalid @enderror" name="post_text[]" cols="5" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                                @csrf
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="post-template d-none">
    <div class="removePost">
        <div class="card-header">{{ __('Create Post') }}</div>
            <div class="form-group row">
                <label for="post_title" class="col-md-4 col-form-label text-md-right"> {{ __('Title:') }} </label>
                <input class="gray form-control col-md-6 @error('post_title') is-invalid @enderror" type="text" name="post_title[]" value="" />
                @error('post_title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <label for="post_text" class="col-md-4 col-form-label text-md-right"> {{ __('Text:') }} </label>
                <div class="col-md-6">
                    <textarea class="summernote @error('post_text') is-invalid @enderror" name="post_text[]" cols="5" rows="5"></textarea>
                </div>
            </div>
            <button class="btn btn-danger removePost-B" type="button" name='removePost-B' id="removePost-B"> Remove Post</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#addPostB").click(function() {
            $(".addPost").toggleClass("d-none");
            $(".addMorePost").toggleClass("d-none");
            $(".addButton").toggleClass("new");
            if($(".addButton").hasClass('new')){
                $(".addButton").toggleClass("btn-danger");
                $(".addButton").toggleClass("btn-warning");
                $("#addPostB").html('Remove New Post');
                $("#submitB").val('remove');
            } else {
                $(".addButton").toggleClass("btn-danger");
                $(".addButton").toggleClass("btn-warning");
                $("#addPostB").html('Add new Post');
                $("#submitB").val('new');
            }
        });
        $("#add-more-post").click(function() {
            $(".addPost").append($(".post-template").html());
        })
        $(document).on("click", ".removePost-B", function() {
            $(this).parents('.removePost').remove();
        });
    });
</script>

@endsection
