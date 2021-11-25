@extends('layouts.app')

@section('content')

<div class="container">
    <a style="color:rgb(121, 95, 26);" href="{{ url('/categorys/create')}}">Create category</a>
    <table class="table table-bordered table-hover gray">
        <thead class="thead-dark">
        <tr>
            <th> @sortablelink('id', 'ID') </th>
            <th> @sortablelink('title', 'Title') </th>
            <th> @sortablelink('description', 'Description')</th>
            <th>Action</th>
        </tr>
        </thead>

        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td><a class="intgray" href="{{route('category.show', [$category])}}">{{ $category->title }}</a></td>
            <td>{!! $category->description !!}</td>
            <td>
                <a class="btn btn-dark intgray" href="{{route('category.edit', [$category]) }}">Edit</a>
                <form method="category" action="{{route('category.destroy', [$category]) }}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection
