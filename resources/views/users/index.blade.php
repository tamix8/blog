@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile: </div>

                <div class="card-body">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                          <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @endif
                    
                    
                    <div class="row">
                        <div class="form-group col-md-12">
                            Name: {{ $user->name }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            Email: {{ $user->email }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            Username: {{ $user->username }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            Created At: {{ $user->created_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection