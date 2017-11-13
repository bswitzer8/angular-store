/* global angular */
var app = angular.module('store', []);
app.controller("storeController",  function($http, $scope){
 
	console.log("hit");

	
	$scope.init = function(){
		$http.get("get_categories.php").then(function (success){
			console.log(success.data);
			$scope.categories = success.data;
			$scope.assocCats = {};
			angular.forEach($scope.categories, function(c){
				$scope.assocCats[c.id] = c.name;	
			});
	   },function (error){
	
	   });
		
		$http.get("get_products.php").then(function (success){
			console.log(success.data);
			$scope.products = success.data;
	   },function (error){
	
	   });
	}	
	$scope.init();
		
	$scope.add = function () {
		$scope.product = {};
	}
	
	$scope.update = function(up)
	{
		console.log(up);
		$scope.product = up;
	}
	
	$scope.cancel = function () {
		$scope.product = false;
		$scope.deleted = false;
	}
	
	$scope.save = function()
	{
		console.log("SAVEING");
		console.log($scope.product);
		
		function handleError2(argument) {
			console.log(argument);
			 $scope.product = false;
		 
		}
		
		function handleSuccess2(argument){
			console.log(argument);
			
			$scope.products.push(angular.copy($scope.product));
			 $scope.product = false;
		}
		
		function handleSuccess3(argument)
		{
			console.log(argument);
			
			for(var index = 0; index < $scope.products.length; ++index)
			{
				if($scope.products[index].id == $scope.product.id)
				{
		
					$scope.products[index] = angular.copy($scope.product); 
					$scope.product = false;
					return;
				}
			
			}
	
			
		}
		
		if($scope.product.id)
		{
			console.log("test");
		
			var request = $http({
	            method: "post",
	            url: "update_product.php",
	            data: { data: $scope.product },
	           headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	        });
        return( request.then( handleSuccess3, handleError2 ) );
		}
		else
		{
		
			console.log("test");
			console.log($scope.product.id);
			var request = $http({
	            method: "post",
	            url: "add_product.php",
	            data: { data: $scope.product },
	           headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	        });
        return( request.then( handleSuccess2, handleError2 ) );
		
		}
		
	
	}

	$scope.delete = function(selected)
	{
		$scope.deleted = selected;
		
		
	}
	
	$scope.confirmDelete = function(){
		if(!$scope.deleted) return;
		
		
		function handleError(argument) {
		 console.log(argument);
		}
		
		function handleSuccess(argument){
			console.log(argument);
			
				for(var index = 0; index < $scope.products.length; ++index)
		{
			if($scope.products[index].id == $scope.deleted.id)
			{
				$scope.deleted = false;
				
				// $http
				
				$scope.products.splice(index,1);
				return;
				// }
			
			}
		}
		};
		
		 var request = $http({
            method: "post",
            url: "delete_product.php",
            data: {'id': $scope.deleted.id },
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });
        return( request.then( handleSuccess, handleError ) );
		
	
	
	}
});