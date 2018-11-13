<?php
$urlToRestApi = $this->Url->build('/api/Billboards', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Billboards/index', ['block' => 'scriptBottom']);
?>
        <div class="container">
            <div class="row">
                <div class="panel panel-default billboards-content">
                    <div class="panel-heading">Billboards <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
                    <div class="panel-body none formData" id="addForm">
                        <h2 id="actionLabel">Add Billboard</h2>
                        <form class="form" id="billboardAddForm" enctype='application/json'>
                         <div class="form-group">
                                <label>billboard details</label>
                                <input type="text" class="form-control" name="billboard_details" id="emailEdit"/>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="billboardAction('add')">Add Billboard</a>
                        </form>
                 </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Billboard</h2>
                <form class="form" id="billboadEditForm" enctype='application/json'>
                  <div class="form-group">
                                <label>billboard details</label>
                                <input type="text" class="form-control" name="billboard_details" id="emailEdit"/>
                            </div>
                    <input type="hidden" class="form-control" name="billboard_id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="billboardAction('edit')">Update Billboard</a>
                    <!-- input type="submit" class="btn btn-success" id="editButton" value="Update Cocktail" -->
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>billboard_detais</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="billboardData">
                    <?php
                    $count = 0;
                    foreach ($billboards as $billboard): $count++;
                        ?>
                        <tr>
                            <td><?php echo '#' . $count; ?></td>
                            <td><?php echo $billboard['billboard_details']; ?></td>
                          
                            <td>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editBillboard('<?php echo $billboard['billboard_id']; ?>')"></a>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? cocktailAction('delete', '<?php echo $billboard['billboard_id']; ?>') : false;"></a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                    <tr><td colspan="5">No cocktail(s) found......</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

