


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
     
                    <div class="bs-component" ng-controller="public_listdata as data">
                            <div ng-show="data.blogs.length <= 0"><div colspan="5" style="text-align:center;">Loading new data!!</div></div>
                            <div dir-paginate="blog in data.blogs|itemsPerPage:data.itemsPerPage" total-items="data.total_count">
                                    <h1><a ng-href="blog_detail/<% blog.id %>"><% blog.title %></a></h1>
                                    <p style="text-align: right;">Author: <% blog.author %> - Date: <% blog.created_at %></p>
                                    <div><% blog.content %></div>
                                    <hr/>
                            </div>
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
</div>




<script src="{{ asset('lib/angular/angular.js') }}"></script>
<script src="{{ asset('lib/dirPagination.js') }}"></script>
<script src="{{ asset('js/angularjs_app.js') }}" defer></script>
@endsection