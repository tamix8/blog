@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of Post</div>

                <div class="card-body">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                          <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @endif
                    
                    
                    <div class="row">
                        <div class="form-group col-md-12">
                            <a class="btn btn-primary" href="{{ route('blogs.create') }}">
                                {{ __('Create New Post') }}
                            </a>
                        </div>
                    </div>
                    
                    <div class="bs-component" ng-controller="public_listdata as data">
                            <table class="table table-striped table-hover">
                                    <thead>
                                            <tr>
                                                    <th>Id</th>
                                                    <th>Title</th>
                                                    <th>User ID</th>
                                                    <th>Status</th>
                                                    <th colspan="2">Action</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                            <tr ng-show="data.blogs.length <= 0"><td colspan="5" style="text-align:center;">Loading new data!!</td></tr>
                                            <tr ng-style="blog.status == 'Published' && {'background-color':'white'} 
                                                        || blog.status == 'Draft' && {'background-color':'antiquewhite'}
                                                        || blog.status == 'Pending' && {'background-color':'buttonface'}" dir-paginate="blog in data.blogs|itemsPerPage:data.itemsPerPage" total-items="data.total_count">
                                                    <td><% blog.id %></td>
                                                    <td><% blog.title %></td>
                                                    <td><% blog.user_id %></td>
                                                    <td><% blog.status %></td>
                                                    <td><a ng-href="blogs/<% blog.id %>/edit" class="btn btn-warning">Edit</a></td>
                                                    <td>
                                                      <button class="btn btn-danger" ng-click="deletePost(blog)">Delete</button>
                                                    </td>
                                            </tr>
                                    </tbody>
                            </table> 
                            <dir-pagination-controls
                                    max-size="8"
                                    direction-links="true"
                                    boundary-links="true" 
                                    on-page-change="data.getData(newPageNumber)" >
                            </dir-pagination-controls>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="{{ asset('lib/angular/angular.js') }}"></script>
<script src="{{ asset('lib/dirPagination.js') }}"></script>
<script src="{{ asset('js/angularjs_app.js') }}" defer></script>
                
@endsection