<?php
$urlToRestApi = $this->Url->build('/api/Billboards', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Billboards/index', ['block' => 'scriptBottom']);
?>
        <div class="container">
            <div class="row">
                <div class="panel panel-default users-content">
                    <div class="panel-heading">Billboards <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
                    <div class="panel-body none formData" id="addForm">
                        <h2 id="actionLabel">Add Billboard</h2>
                        <form class="form" id="billboardForm">
                         <div class="form-group">
                                <label>billboard details</label>
                                <input type="text" class="form-control" name="billboard_details" id="emailEdit"/>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="billboardAction('add')">Add User</a>
                        </form>
                    </div>
                    <div class="panel-body none formData" id="editForm">
                        <h2 id="actionLabel">Edit User</h2>
                        <form class="form" id="billboardForm">
                           
                            <div class="form-group">
                                <label>billboard details</label>
                                <input type="text" class="form-control" name="billboard_details" id="emailEdit"/>
                            </div>
                        
                            <input type="hidden" class="form-control" name="billboard_id" id="idEdit"/>
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="billboardAction('edit')">Update User</a>
                        </form>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Billboards</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

