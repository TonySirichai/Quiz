<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <meta name="viewport" content="width=device-width" />
	
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://bootstrapdocs.com/v3.1.1/docs/dist/css/bootstrap.min.css"/>
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="http://bootstrapdocs.com/v3.1.1/docs/dist/js/bootstrap.min.js"></script>
	<script src="http://rawgit.com/obogo/angular-focus-manager/master/build/angular-focusmanager.js"></script>

	<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <title>Users Management</title>
</head>

<style>
body{
font-family: 'Kanit', sans-serif;
    font-size: 14px;
}
.w3-theme-l5 {color:#000 !important; background-color:#f5f7f8 !important}
.w3-theme-l4 {color:#000 !important; background-color:#dfe5e8 !important}
.w3-theme-l3 {color:#000 !important; background-color:#becbd2 !important}
.w3-theme-l2 {color:#000 !important; background-color:#9eb1bb !important}
.w3-theme-l1 {color:#fff !important; background-color:#7d97a5 !important}
.w3-theme-d1 {color:#fff !important; background-color:#57707d !important}
.w3-theme-d2 {color:#fff !important; background-color:#4d636f !important}
.w3-theme-d3 {color:#fff !important; background-color:#435761 !important}
.w3-theme-d4 {color:#fff !important; background-color:#3a4b53 !important}
.w3-theme-d5 {color:#fff !important; background-color:#303e45 !important}

.w3-theme-light {color:#000 !important; background-color:#f5f7f8 !important}
.w3-theme-dark {color:#fff !important; background-color:#303e45 !important}
.w3-theme-action {color:#fff !important; background-color:#303e45 !important}

.w3-theme {color:#fff !important; background-color:#607d8b !important}
.w3-text-theme {color:#607d8b !important}
.w3-border-theme {border-color:#607d8b !important}

.w3-hover-theme:hover {color:#fff !important; background-color:#607d8b !important}
.w3-hover-text-theme:hover {color:#607d8b !important}
.w3-hover-border-theme:hover {border-color:#607d8b !important}
.button_del {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    text-align: center;
    padding: 12px 13px;
    font-size: 16px;
    color: #fff;
    margin-left: 10px;
	background: #fe5d70;
	line-height: 1;
}

.button_edit {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    text-align: center;
    padding: 12px 13px;
    font-size: 16px;
    color: #fff;
    margin-left: 10px;
	background: #fe9365;
	line-height: 1;
}
.button_add {
    background-color: #4CAF50; 
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 20px;
}
.button_clear {
    background-color: #6b6c6c; 
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 20px;
}

</style>

<body ng-app="myApp" ng-controller="userCtrl">
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
       <div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <span class="w3-bar-item w3-button w3-padding-large w3-theme-d4"> &#x2261;</span>
  <span class="w3-bar-item w3-hide-small w3-padding-large" title="News">Users Management</span>
 
 </div>
</div>

    </div>
	<div class="content">
	<br>
	<br>
		<div class="w3-container">
			<br>
			<button class="w3-btn w3-green w3-ripple button_add" ng-click="editUser('new')" ng-hide="add_form" >&#9998; Create New User</button>
			<form ng-hide="hideform" name="regForm" >
				<div class="col-md-12">
					<div class="w3-container w3-card w3-white w3-round w3-margin">
						<h3 ng-show="edit">Create New User</h3>
						<h3 ng-hide="edit">Edit User</h3>
							<hr> </hr>
						<div class="form-group">
							<label class="control-label col-sm-2" for="fName">First Name ::</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" ng-model="fName" name="fName" placeholder="First Name" required="">
								<span style="color:red" ng-show="regForm.fName.$dirty && regForm.fName.$invalid">
								<span ng-show="regForm.fName.$error.required">First Name is required.</span>
										</div>
							<label class="control-label col-sm-2" for="lName">Last Name ::</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" type="text" ng-model="lName" name="lName" placeholder="Last Name" required="">
								<span style="color:red" ng-show="regForm.lName.$dirty && regForm.lName.$invalid">
								<span ng-show="regForm.lName.$error.required">Last Name is required.</span>
							</div>
						</div>
						</br>
						</br>
						<div class="form-group"><label class="control-label col-sm-2" for="LastName">BirthDate ::</label>
							<div class="col-sm-4">
								<input type="date" class="form-control" placeholder="Enter Birth Date" ng-model="BirthDate" name="BirthDate" id="BirthDate" value="" >
							</div>
							<label class="control-label col-sm-2" for="Gender">Gender ::</label>
							<div class="radio">
								<label class="control-label col-sm-1"><input type="radio" ng-model="Gender" value="Male" >Male</label>
								<label class="control-label col-sm-1"><input type="radio" ng-model="Gender" value="Female">Female</label>
							</div> 
						</div>
						</br>
						<div class="form-group">
							<label class="control-label col-sm-2" for="UEmail">Email ::</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" ng-model="UEmail" name="UEmail" placeholder="Email" required="">
								<span style="color:red" ng-show="regForm.UEmail.$dirty && regForm.UEmail.$invalid">
								<span ng-show="regForm.UEmail.$error.required">Email is required.</span>
							</div>
							<label class="control-label col-sm-2" for="Phone">Phone Number ::</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" ng-model="Phone"  name="Phone"  placeholder="Phone Number" required="">
								<span style="color:red" ng-show="regForm.Phone.$dirty && regForm.Phone.$invalid">
								<span ng-show="regForm.Phone.$error.required">Phone Number is required.</span>
							</div>
						</div>
						</br></br>
						<div class="form-group">
							<label class="control-label col-sm-2" for="FirstName">Address ::</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" ng-model="Address" name="Address" placeholder="Address" required="">
								<span style="color:red" ng-show="regForm.Address.$dirty && regForm.Address.$invalid">
								<span ng-show="regForm.Address.$error.required">Address is required.</span>
							</div>
						</div>
						</br></br>
						<div class="form-group">
							<label class="control-label col-sm-2" for="District">District ::</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" ng-model="District" name="District" placeholder="District" required="">
								<span style="color:red" ng-show="regForm.District.$dirty && regForm.District.$invalid">
								<span ng-show="regForm.District.$error.required">District is required.</span>
							</div>
						</div>
						</br></br>
						<div class="form-group">
							<label class="control-label col-sm-2" for="Amphoe">Amphoe ::</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" ng-model="Amphoe" name="Amphoe" placeholder="Amphoe" required="">
								<span style="color:red" ng-show="regForm.Amphoe.$dirty && regForm.Amphoe.$invalid">
								<span ng-show="regForm.Amphoe.$error.required">Amphoe is required.</span>
							</div>
							<label class="control-label col-sm-2" for="Province">Province ::</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" ng-model="Province" name="Province" placeholder="Province" required="">
								<span style="color:red" ng-show="regForm.Province.$dirty && regForm.Province.$invalid">
								<span ng-show="regForm.Province.$error.required">Province is required.</span>
							</div>
						</div>
						</br></br>
						<div class="form-group">
							<label class="control-label col-sm-2" for="FirstName">Zipcode ::</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" ng-model="Zipcode" name="Zipcode" placeholder="Zipcode" required="">
								<span style="color:red" ng-show="regForm.Zipcode.$dirty && regForm.Zipcode.$invalid">
								<span ng-show="regForm.Zipcode.$error.required">Zipcode is required.</span>
							</div>
						</div>
						</br></br>
						<hr></hr>
						<div class="w3-row">
							<button class="w3-btn w3-right button_add" ng-disabled="error || incomplete" ng-click="submit_data()">&#10004; Save Changes</button>
							<button class="w3-btn w3-right button_clear" ng-click="Clear()">Clear</button>
						</div>
					</div >
				</div >
			</form>
			<br>
			<br>
			
			<div class="col-md-12">
				<div class="w3-container w3-card w3-white w3-round w3-margin">
					<table class="w3-table w3-bordered w3-striped" id="myTable">
					   <thead>
						   <tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone Number</th>
								<th>Address</th>
								<th>Action</th>
						  </tr>
						</thead> 
						<tbody>
							<tr ng-repeat="user in users">
								<td>{{ user.fName }}   {{ user.lName }}</td>
								<td>{{ user.Email }}</td>
								<td>{{ user.PhoneNumber }}</td>
								<td>{{ user.Address }} {{ user.District }} {{ user.Amphoe }} {{ user.Province }} {{ user.Zipcode }}</td>
								<td>
									<button class="w3-btn w3-ripple button_edit" data-Birthdate="{{ user.BirthDate }}" ng-click="editUser(user.id)">&#9998; </button>
									<button focus-index="1" data-id_del="{{ user.ID_code }}" data-del_name="{{ user.fName }} {{ user.lName }}"class="w3-btn w3-ripple button_del" data-toggle="modal" focus-element="autofocus" data-target=".bs-example-modal-lg" >&#10008; </button>
								</td>
							</tr> 
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div ng-controller="AppCtrl as app">
<div class="modal-bg">
    <div class="dialog">
	<div class="modal fade bs-example-modal-lg"  focus-group focus-group-head="loop" focus-group-tail="loop" focus-stacktabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
			  </div>
			  <div class="modal-body">
					<input type="hidden" class="form-control"  id="id_del" value="">
					ยืนยันการลบข้อมูลของ <span id="del_name"><span>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" focus-element="autofocus" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary clickme">Yes, delete it!</button>
			  </div>
			</div>
		  </div>
		</div>
	</div>
</div>
</div>


<script>
    angular.module('app', ['fm'])
            .controller('AppCtrl', function () {
                this.showModal = false;
                this.showView = false;
                this.counter = 1;
                this.toggleDialog = function () {
                    this.showModal = !this.showModal;
                }
                this.toggleView = function () {
                    this.showView = !this.showView;
                }
                this.changeDisplay = function () {
                    this.counter++;
                }
            })

$(document).ready( function () {
    $('#myTable').DataTable( {
		"ordering": false,
		 "searching": false,
		  "paging": false
		});
} );
$(document).on("click", ".button_del", function () {
		 var id_del				= $(this).data('id_del');
		 var del_name			= $(this).data('del_name');
		 $(".modal-body #id_del").val( id_del );
		 $(".modal-body #del_name").text( del_name );
	
		 
	});
$(document).on("click", ".button_edit", function () {
		 var Birthdate				= $(this).data('birthdate');
		 $("#BirthDate").val(Birthdate);
	
		 
	});	
$(function() {
    $('.clickme').click(function() { 
		$.ajax({
		url: "/quiz/api/delete.php",
		type: "post",
		data:{
			id_del:$("#id_del").val()
		},
		dataType: "json",
		success:function(res){
			console.log(res);
			location.reload();
		}
		});
	});
});
</script>
<script src= "js/control.js"></script>
</body>
</html>
