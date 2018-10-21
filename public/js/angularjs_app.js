var app = angular.module('angularTable', ['angularUtils.directives.dirPagination'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('listdata',function($scope, $http){
	var vm = this;
	vm.blogs = []; //declare an empty array
	vm.pageno = 1; // initialize page no to 1
	vm.total_count = 0;
	vm.itemsPerPage = 10; //this could be a dynamic value from a drop down
	
	vm.getData = function(pageno){
		vm.blogs = [];
		$http.get("/admin/blog_list?page="+pageno).success(function(response){ 
			vm.blogs = response.data;  //ajax request to fetch data into vm.data
			vm.total_count = response.total_count;
		});
	};
	vm.getData(vm.pageno); 
        
        $scope.deletePost = function(blog) {
            $scope.blog = blog;
            $http({
                method: 'DELETE',
                url: '/admin/blogs/' + blog.id
            }).then(function successCallback(response) {
                window.location.reload();
            }, function errorCallback(response) {

            });
        };
});

app.controller('public_listdata',function($scope, $http){
	var vm = this;
	vm.blogs = []; //declare an empty array
	vm.pageno = 1; // initialize page no to 1
	vm.total_count = 0;
	vm.itemsPerPage = 10; //this could be a dynamic value from a drop down
	
	vm.getData = function(pageno){
		vm.blogs = [];
		$http.get("/blog_list?page="+pageno).success(function(response){ 
			vm.blogs = response.data;  //ajax request to fetch data into vm.data
			vm.total_count = response.total_count;
		});
	};
	vm.getData(vm.pageno); 
        
        $scope.deletePost = function(blog) {
            $scope.blog = blog;
            $http({
                method: 'DELETE',
                url: '/blogs/' + blog.id
            }).then(function successCallback(response) {
                window.location.reload();
            }, function errorCallback(response) {

            });
        };
});