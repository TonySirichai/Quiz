angular.module('myApp', []).controller('userCtrl', function($scope, $http) {
	$scope.fName = '';
	$scope.lName = '';
	$scope.Gender = '';
	$scope.BirthDate = '';
	$scope.Zipcode = '';
	$scope.Phone = '';
	$scope.UEmail = '';
	$scope.Address = '';
	$scope.District = '';
	$scope.Province = '';
	$scope.Amphoe = '';
	$scope.ID_code = '';
	$scope.hideform = true;
	$scope.add_form = false;
	$scope.edit = true;
	$scope.error = false;
	$scope.incomplete = false; 
	
	$http.get("api/customers_mysql.php").then(function (response) {
		$scope.users = response.data.records;
	});
	
	
	
	$scope.editUser = function(id) {
		$scope.hideform = false;
		$scope.add_form = true;
		
		if (id == 'new') {
			  $scope.edit 		= true;
			  $scope.incomplete = true;
			  $scope.ID_code 	= '';
			  $scope.fName 		= '';
			  $scope.lName 		= '';
			  $scope.Gender 	= '';
			  $scope.BirthDate 	= new Date();
			  $scope.Zipcode 	= '';
			  $scope.Phone 		= '';
			  $scope.UEmail 	= '';
			  $scope.Address 	= '';
			  $scope.District 	= '';
			  $scope.Province 	= '';
			  $scope.Amphoe 	= '';
		} else {
			  $scope.edit 		= false;
			  $scope.BirthDate 	= new Date();
			  $scope.ID_code 	= $scope.users[id-1].ID_code;
			  $scope.fName 		= $scope.users[id-1].fName;
			  $scope.lName 		= $scope.users[id-1].lName; 
			  $scope.Gender		= $scope.users[id-1].Gender; 
			  $scope.BirthDate 	= $scope.users[id-1].BirthDate; 
			  $scope.Zipcode 	= $scope.users[id-1].Zipcode; 
			  $scope.Phone 		= $scope.users[id-1].PhoneNumber; 
			  $scope.UEmail 	= $scope.users[id-1].Email; 
			  $scope.Address 	= $scope.users[id-1].Address; 
			  $scope.District 	= $scope.users[id-1].District; 
			  $scope.Province 	= $scope.users[id-1].Province; 
			  $scope.Amphoe 	= $scope.users[id-1].Amphoe; 
		}
	};
	
	
	$scope.Clear = function() {
		$scope.hideform		= true;
		$scope.add_form 	= false;
		$scope.edit 		= true;
		$scope.fName 		= '';
		$scope.lName 		= '';
		$scope.Gender 		= '';
		$scope.BirthDate 	= new Date();
		$scope.Zipcode 		= '';
		$scope.Phone 		= '';
		$scope.UEmail 		= '';
		$scope.Address 		= '';
		$scope.District 	= '';
		$scope.Province 	= '';
		$scope.Amphoe 		= '';
	};
	
	
	$scope.$watch('fName',function() {$scope.test();});
	$scope.$watch('lName',function() {$scope.test();});
	$scope.$watch('Phone',function() {$scope.test();});
	$scope.$watch('UEmail',function() {$scope.test();});
	$scope.$watch('Address',function() {$scope.test();});
	$scope.$watch('District',function() {$scope.test();});
	$scope.$watch('Amphoe',function() {$scope.test();});
	$scope.$watch('Province',function() {$scope.test();});
	$scope.$watch('Zipcode',function() {$scope.test();});
	$scope.$watch('Gender',function() {$scope.test();});
	
	$scope.test = function() {
		if ($scope.fName.length || $scope.lName.length || $scope.Phone.length || $scope.UEmail.length || $scope.Address.length || $scope.District.length || $scope.Province.length || $scope.Amphoe.length || $scope.Zipcode.length || $scope.Zipcode.Gender) {
			$scope.error = false;
		} else {
			$scope.error = true;
		}
		$scope.incomplete = false;
		if ($scope.edit && (!$scope.fName.length || !$scope.lName.length|| !$scope.Phone.length || !$scope.UEmail.length || !$scope.Address.length || !$scope.District.length || !$scope.Province.length || !$scope.Amphoe.length || !$scope.Zipcode.length || !$scope.Gender.length)) {
			$scope.incomplete = true;
		}
	};
	
	
	$scope.submit_data = function () {	
	$scope.hideform = true;
	$scope.add_form = false;
        $scope.message = "";
            var request = $http({
                method: "post",
                url: "api/submit_register.php",
                data: {
                    fName: $scope.fName,
					lName: $scope.lName,
					Gender: $scope.Gender,
					BirthDate: $scope.BirthDate,
					Zipcode: $scope.Zipcode,
					Phone: $scope.Phone,
					UEmail: $scope.UEmail,
					Address: $scope.Address,
					District: $scope.District,
					Province: $scope.Province,
					Amphoe: $scope.Amphoe,
					ID: $scope.ID_code
                }
            });
			$http.get("api/customers_mysql.php").then(function (response) {
			$scope.users = response.data.records;
			});
    }
})