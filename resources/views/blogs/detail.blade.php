@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$blog->title}}</div>

                <div class="card-body">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                          <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @endif
                    <div class="row">
                        <div class="col-md-12" style="text-align: right;">Author: {{ $blog->author }} - Date: {{ $blog->created_at }}</div>
                    </div>
                    <div class="row">
                      {{ $blog->content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection