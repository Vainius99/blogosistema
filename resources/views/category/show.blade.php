@extends('layouts.app')

@section('content')
<div class="container container-show">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('category Info') }}</div>
                    <div class="card-body">
                        <div class="form-group center">
                            <p> ID Number: {{$category->id}}</p>
                        </div>
                        <div class="form-group center">
                            <p> Title: {{$category->title}}</p>
                        </div>
                        <div class="form-group center">
                            <p>Description: {{$category->description}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-header posts-list">{{ __('Post List') }}</div>
            </div>


                @if ($postCount != 0)

                <table class="table table-bordered table-hover gray posts">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Text</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                        @foreach ($posts as $post)
                        <tr class="post">
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->text}}</td>
                            <td>
                                <form method="POST" action="{{route('post.destroy',[$post])}}">
                                    @csrf
                                    <button type="submit" class="btn btn-dark">DELETE </button>
                                </form>
                                <button class="btn btn-danger postDelete" data-postid="{{$post->id}}">DELETE AJAX</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                @else
                    <div class="alert alert-danger">
                        <p>The Category has no Posts</p>
                    </div>
                @endif
        </div>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $(".postDelete").click(function() {
            var postID = $(this).attr("data-postid");
            $(this).parents(".post").remove();
            $.ajax({
                type: 'POST',
                url: '/posts/deleteAjax/' + postID ,
                success: function(data) {
                    alert(data.success);
                    console.log(data.postCount);
                    if(data.postCount == 0) {
                        $(".posts").remove();
                        $(".posts-list").remove();
                        $(".container-show").append("<div class='alert alert-danger'><p>The category has no Posts</p></div> ")

                    }
                }
            });
        });
    });
</script>

@endsection
