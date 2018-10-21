@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <div class="row">
                      <div class="col-md-12"></div>
                      <div class="form-group col-md-12">
                        <a class="btn btn-link" href="{{ route('admin.blogs.index') }}">
                            {{ __('View List of Post') }}
                        </a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
