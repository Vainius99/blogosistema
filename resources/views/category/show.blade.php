@extends('layouts.app')

@section('content')
<div class="container">
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
            </div>
        </div>
    </div>
</div>

@endsection
