@extends('layouts.app')

@section('content')

<div class="container">
    <div class="form_control col-12 row">
        <form action="{{route('post.index')}}" method="GET">
            <label class="text-md-right" for="category_sort"> Category </label>
            <select class="form-control" name="category_sort">
                <option value="all" @if ("all" == $category_sort) selected  @else @endif > All </option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if ($category->id == $category_sort) selected @endif >{{$category->title}}</option>
                @endforeach
            </select>
            <button type="submit" class="form-control col-4 btn btn-warning">Filter</button>
            <a class="btn btn-danger" href="{{ url('/posts')}}">Clear Filter</a>
        </form>
    <a style="color:rgb(121, 95, 26);" href="{{ url('/posts/create')}}">Create post</a>
    <table class="table table-bordered table-hover gray">
        <thead class="thead-dark">
        <tr>
            <th> @sortablelink( 'id', 'ID') </th>
            <th> @sortablelink('title', 'Title') </th>
            <th> @sortablelink( 'text', 'Text') </th>
            <th> @sortablelink( 'category_id', 'Category') </th>
            <th>Action</th>
        </tr>
        </thead>

        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td><a class="intgray" href="{{route('post.show', [$post])}}">{{ $post->title }}</a></td>
            <td>{!! $post->text !!}</td>
            <td>
                {{$post->postCategory->title}}
            </td>
            <td>
                <a class="btn btn-dark intgray" href="{{route('post.edit', [$post]) }}">Edit</a>
                <form method="post" action="{{route('post.destroy', [$post]) }}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection
