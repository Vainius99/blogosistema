@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Create New Post') }} </div>
                    <form class="gray form-group" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="post_title" class="col-md-4 col-form-label text-md-right"> {{ __('Title:') }} </label>
                            <input class="gray form-control col-md-6 @error('post_title') is-invalid @enderror" required="required" type="text" name="post_title" value="" />
                            @error('post_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="post_text" class="col-md-4 col-form-label text-md-right"> {{ __('Text:') }} </label>
                            <div class="col-md-6">
                                <textarea class="summernote @error('post_text') is-invalid @enderror" name="post_text" cols="5" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row categoryList">
                            <label for="post_category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category:') }} </label>
                            <select class="form-control col-md-6" name="post_category_id">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="addCategory d-none">
                            <div class="card-header">{{ __('Create New Category') }} </div>
                                <div class="form-group ">
                                    <div class="form-group row">
                                        <label for="category_title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                                        <input class="gray form-control col-md-6 @error('category_title') is-invalid @enderror" type="text" name="category_title" value="" />
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
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" name="new" id="new" value="new" class="btn btn-warning addButton">Add new Category</button>
                                <button type="submit" name="addB" id="addB" value="new" class="btn btn-primary addSubmit"> {{ __('Submit') }}</button>
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

<script>
    $(document).ready(function() {
        // $("#new").click(function() {
        $("#new").on('click', function() {
            $(".addCategory").toggleClass("d-none");
            $(".categoryList").toggleClass("d-none");
            $(".addButton").toggleClass("new");
            if($(".addButton").hasClass('new')){
                $(".addButton").toggleClass("btn-danger");
                $(".addButton").toggleClass("btn-warning");
                $("#new").html('Remove New Category');
                $("#addB").val('remove');
            } else {
                $(".addButton").toggleClass("btn-danger");
                $(".addButton").toggleClass("btn-warning");
                $("#new").html('Add new Category');
                $("#addB").val('new');
            }
        });
    });
</script>

@endsection
