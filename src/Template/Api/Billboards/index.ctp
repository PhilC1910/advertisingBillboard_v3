
<?php
$urlToRestApi = $this->Url->build('/api/billboards', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Billboards/index', ['block' => 'scriptBottom']);
?>

<?php 
	echo $this->Html->script('https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit');
?>

<!-- page content and controls will be here -->

<!DOCTYPE html>
	<html>
       	
		<body ng-app="app">
		 <div ng-controller = "usersCtrlr">

                <div id="logDiv" style="margin: 10px 0 20px 0;"><a href="javascript:void(0);" class="glyphicon glyphicon-log-in" id="login-btn" onclick="javascript:$('#loginForm').slideToggle();">Login</a></div>
                   
                <div id="example1"></div> 
                    <p style="color:red;">{{ captcha_status }}</p>     
                   
                <div class="none formData" id="loginForm">
                    <form class="form" enctype='application/json'>
                        <div class="form-group">
                            <label>Username</label>
                            <input ng-model="username" type="text" class="form-control" id="username" name="username" style="width: 250px" />
                            <label>Password</label>
                            <input ng-model="password" type="password" class="form-control" id="password" name="password"  style="width: 250px"/>
							
                        </div>
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#loginForm').slideUp(); emptyInput();">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-success" ng-click="login()">Submit</a>
                    </form>
                </div>

                <div class="panel-body none formData" id="changeForm">
                    <form class="form" enctype='application/json'>
                        <div class="form-group">
                            <label>New password</label>
                            <input ng-model="newPassword" type="password" class="form-control" id="form-password" name="form-password" style="width: 250px" />
                        </div>
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#changeForm').slideUp(); emptyInput();">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-success" ng-click="changePassword()">Submit</a>
                        <a href="javascript:void(0);" class="btn btn-warning" ng-click="logout()">Logout</a>
                    </form>
                </div>
           <br />
		 </div>
			<div ng-controller="BillboardsController">
				<table>
					
					<tr>
						<td width="100">billboard_details:</td>
						<td><input type="text" id="billboard_details" ng-model="billboard.billboard_details" /></td>
					</tr>

				</table>
				<br /> <br /> 
				<a ng-click="updateBillboard(billboard.billboard_id,billboard.billboard_details)">Update billboard</a> 
				<a ng-click="addBillboard(billboard.billboard_details)">Add billboard</a> 
			<br /> <br />
			<p style="color: green">{{message}}</p>
			<p style="color: red">{{errorMessage}}</p>
			 
                 <table class="table table-striped">
                    <thead>
                            <tr>
                                    <th>Billboard_details</th>
                                    <th>Action</th>
                            </tr>
                    </thead>
                  <tr ng-repeat="billboard in billboards">
            <td> {{billboard.billboard_details}} </td>

                                <td>
                                        <a  ng-click="getBillboard(billboard.billboard_id)"> Edit</a>
                                        <a  ng-click="deleteBillboard(billboard.billboard_id)">Delete</a>
                                </td>
                        </tr>
                </table>
			</div>
		</body>
	</html>

