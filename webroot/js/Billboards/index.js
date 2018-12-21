// angular js codes will be here
var onloadCallback = function() {
    widgetId1 = grecaptcha.render('example1', {
        'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'theme': 'light'
    });
};
var app = angular.module('app', []);

app.controller('usersCtrl', function ($scope, $http) {
    // more angular JS codes will be here

    // Login Process
    $scope.login = function () {
   if (grecaptcha.getResponse(widgetId1) == '') {
            $scope.captcha_status = 'Please verify captha.';
            return;
        }
          $http(req)
			.success(function (jsonData, status, headers, config) {

                localStorage.setItem('token', jsonData.data.token);
                localStorage.setItem('user_id', jsonData.data.id);
				

                // Switch button for Logout
                $('#logDiv').html(
                    $compile('<a href="javascript:void(0);" class="glyphicon glyphicon-log-out" id="login-btn" onclick="javascript:$(\'#changeForm\').slideToggle();">Logout/Modify</a>')($scope)
                );


                $('#loginForm').slideUp();

                //$scope.messageLogin = 'Welcome!';
                $scope.errorLogin = '';
            })

            .error(function (data, status, headers, config) {
                $scope.messageLogin = '';
                $scope.errorLogin = 'Invalid credentials';
            });

    }

    $scope.logout = function () {
        localStorage.setItem('token', "no token");

        $('#logDiv').html(
            $compile('<a href="javascript:void(0);" class="glyphicon glyphicon-log-in" id="login-btn" onclick="javascript:$(\'#loginForm\').slideToggle();">Login</a>')($scope)
        );

        $('#changeForm').slideUp();
        $scope.messageLogin = 'You have logged out';
        $scope.errorLogin = '';

    }
    $scope.changePassword = function () {
        var req = {
            method: 'PUT',
            url: 'api/users/' + localStorage.getItem("user_id"),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")
            },
            data: {'password': $scope.newPassword}
        }
        $http(req)
            .success(function (response) {
                $('#changeForm').slideUp();
                $scope.messageLogin = 'Password successfully changed! ';
            })
            .error(function (response) {
                $scope.errorLogin = 'Impossible to change the password!';

            });
    };
});
//Ajout, modification et suppresion d'un billboard

app.controller('BillboardsController', ['$scope','billboardService', function ($scope,billboardService) {
	  
    $scope.updateBillboard = function () {
        billboardService.updateBillboard($scope.billboard.billboard_id,$scope.billboard.billboard_details)
          .then(function success(response){
              $scope.message = 'Billboard data updated!';
              $scope.errorMessage = '';
              $scope.billboard.billboard_id = '';
              $scope.billboard.billboard_details = '';
              $scope.getAllBillboards();
          },
          function error(response){
              $scope.errorMessage = 'Error updating billboard details!';
              $scope.message = '';
          });
    }
    
    $scope.getBillboard = function ($id) {

        billboardService.getBillboard($id)
          .then(function success(response){
              $scope.billboard = response.data.data;
              $scope.billboard.billboard_id= $id;
              $scope.message='';
              $scope.errorMessage = '';
              $scope.getAllBillboards();
              
          },
          function error (response ){
              $scope.message = '';
              if (response.status === 404){
                  $scope.errorMessage = 'billboard not found!';
              }
              else {
                  $scope.errorMessage = "Error getting billboard!";
              }
          });
    }
    
    $scope.addBillboard = function () {
        if ($scope.billboard != null && $scope.billboard.billboard_details) {
            billboardService.addBillboard($scope.billboard.billboard_details)
              .then (function success(response){
                  $scope.message = 'billboard added!';
                  $scope.errorMessage = '';
                  $scope.billboard.billboard_id = '';
                  $scope.billboard.billboard_details = '';
                  $scope.getAllBillboards();
              },
              function error(response){
                  $scope.errorMessage = 'Error adding billboard!';
                  $scope.message = '';
            });
        }
        else {
            $scope.errorMessage = 'Please enter a billboard details!';
            $scope.message = '';
        }
    }
    
    $scope.deleteBillboard = function ($id) {
        billboardService.deleteBillboard($id)
          .then (function success(response){
              $scope.message = 'billboard deleted!';
              $scope.billboard = null;
              $scope.errorMessage='';
              $scope.getAllBillboards();
          },
          function error(response){
              $scope.errorMessage = 'Error deleting Category!';
              $scope.message='';
          })
    }
    
    $scope.getAllBillboards = function () {
        billboardService.
          then(function success(response){
              $scope.billboards = response.data.data;
              $scope.message='';
              $scope.errorMessage = '';
          },
          function error (response ){
              $scope.message='';
              $scope.errorMessage = 'Error getting billboards!';
          });
    }
    $scope.getAllBillboards();
}]);

app.service('billboardService',['$http', function ($http) {
	
    this.getBillboard = function getBillboard(billboardId){
        return $http({
          method: 'GET',
          url: urlToRestApi+'/'+billboardId,
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        });
	}
	
    this.addBillboard = function addBillboard(billboard_details){
        return $http({
          method: 'POST',
          url: urlToRestApi,
          data: {billboard_details:billboard_details},
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        });
    }
	
    this.deletebillboard = function deletebillboard(id){
        return $http({
          method: 'DELETE',
          url: urlToRestApi+'/'+id ,
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        })
    }
	
    this.updateBillboard = function updateBillboard(id,billboard_details){
        return $http({
          method: 'PATCH',
          url: urlToRestApi+'/'+id,
          data: {billboard_details:billboard_details},
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        })
    }
	
    this.getAllBillboards = function getAllBillboards(){
        return $http({
          method: 'GET',
          url: urlToRestApi,
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}

        });
    }

}]);

$(document).ready(function () {
    localStorage.setItem('token', "no token");
    $('#changePass').hide();
});