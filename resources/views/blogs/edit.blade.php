@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post {{ $id }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('blogs.update',$id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-12"></div>
                      <div class="form-group col-md-12">
                        <label for="Title">Title:</label>
                        <input type="text" class="form-control" name="title" value="{{$blog->title}}">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12"></div>
                        <div class="form-group col-md-12">
                            <label for="Content">Content:</label>
                            <textarea rows="4" cols="50" class="form-control" name="content">{{$blog->content}}</textarea> 
                        </div>
                      </div>
                     <div class="row">
                      <div class="col-md-12"></div>
                        <div class="form-group col-md-12">
                            <lable>Status</lable>
                            <select name="status">
                              <option value="0" @if($blog->status==0) selected @endif>Draft</option>
                              <option value="1" @if($blog->status==1) selected @endif>Pending</option>
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