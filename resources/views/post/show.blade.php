@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('post Info') }}</div>
                    <div class="card-body">
                        <div class="form-group center">
                            <p> ID Number: {{$post->id}}</p>
                        </div>
                        <div class="form-group center">
                            <p> Title: {{$post->title}}</p>
                        </div>
                        <div class="form-group center">
                            <p>Text: {{$post->text}}</p>
                        </div>
                        <div class="card-header gray">{{ __('Category Info') }}</div>
                        <div class="form-group center">
                            <p>{{$post->postCategory->title}} </p><br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
