@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Post</div>

                <div class="card-body">
                    <form method="post" action="{{url('blogs')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12"></div>
                      <div class="form-group col-md-12">
                        <label for="Title">Title:</label>
                        <input type="text" class="form-control" name="title">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12"></div>
                        <div class="form-group col-md-12">
                            <label for="Content">Content:</label>
                            <textarea rows="4" cols="50" class="form-control" name="content"></textarea> 
                        </div>
                      </div>
                     <div class="row">
                      <div class="col-md-12"></div>
                        <div class="form-group col-md-12">
                            <lable>Status</lable>
                            <select name="status">
                              <option value="0">Draft</option>
                              <option value="1">Pending</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12"></div>
                      <div class="form-group col-md-12" style="margin-top:60px">
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection