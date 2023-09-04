<?php
$bg_color = 'brown';
echo "<body style ='background-color: $bg_color; '>";
?>

<style>
    body {
        margin: 0;
        padding: 0;
        background-image: url("Jv.jpg");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
    }

    .banner img {
        max-width: 100%;
        height: auto;
    }
</style>

<style>
    .update_stat_dept:hover,.update_stat_desg:hover{
        color:inherit !important;
        opacity: .95 !important;
        transform:scale(.8);
    }
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(-10px); }
        100% { opacity: 1; transform: translateY(0); }
                                }
    .animated-title {
    animation: fadeIn 1s ease-in-out; /* Apply the fadeIn animation */
    }
    .card { background-color: rgba(245, 245, 245, 0.8); }
    .card-header, .card-footer { opacity: 1}
    body {
    opacity: 0.9; /* Set the desired opacity value (0.0 to 1.0) */
}

.card {
    background-color: rgba(245, 245, 245, 0.8);
}

.card-header,
.card-footer {
    opacity: 1;
}
</style>
<div class="card h-100 d-flex flex-column">
    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title animated-title" style="color: #FF4500;">Maintenance</h3>
        <div class="card-tools align-middle">
            <!-- <button class="btn btn-dark btn-sm py-1 rounded-0" type="button" id="create_new">Add New</button> -->
        </div>
    </div>
    <div class="card-body flex-grow-1">
        <div class="col-12 h-100">
            <div class="row h-100">
                <div class="col-md-6 h-100 d-flex flex-column">
                    <div class="w-100 d-flex border-bottom border-dark py-1 mb-1">
                        <div class="fs-5 col-auto flex-grow-1"><b>Deparment List</b></div>
                        <div class="col-auto flex-grow-0 d-flex justify-content-end">
                            <a href="javascript:void(0)" id="new_department" class="btn btn-dark btn-sm bg-gradient rounded-2" title="Add Department"><span class="fa fa-plus"></span></a>
                        </div>
                    </div>
                    <div class="h-100 overflow-auto border rounded-1 border-dark">
                        <ul class="list-group">
                            <?php 
                            $dept_qry = $conn->query("SELECT * FROM `department_list` order by `name` asc");
                            while($row = $dept_qry->fetch_assoc()):
                            ?>
                            <li class="list-group-item d-flex">
                                <div class="col-auto flex-grow-1">
                                    <?php echo $row['name'] ?>
                                </div>
                                <div class="col-auto">
                                    <?php if($row['status'] == 1): ?>
                                        <a href="javascript:void(0)" class="update_stat_dept badge bg-success bg-gradiend rounded-pill text-decoration-none me-1" title="Update Status" data-toStat = "0" data-id="<?php echo $row['department_id'] ?>" data-name="<?php echo $row['name'] ?>"><small>Active</small></a>
                                        <?php else: ?>
                                        <a href="javascript:void(0)" class="update_stat_dept badge bg-secondary bg-gradiend rounded-pill text-decoration-none me-1" title="Update Status" data-toStat = "1" data-id="<?php echo $row['department_id'] ?>"  data-name="<?php echo $row['name'] ?>"><small>Inactive</small></a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-auto d-flex justify-content-end">
                                    <a href="javascript:void(0)" class="edit_department btn btn-sm btn-primary bg-gradient py-0 px-1 me-1" title="Edit Department Details" data-id="<?php echo $row['department_id'] ?>"  data-name="<?php echo $row['name'] ?>"><span class="fa fa-edit"></span></a>

                                    <a href="javascript:void(0)" class="delete_department btn btn-sm btn-danger bg-gradient py-0 px-1" title="Delete Department" data-id="<?php echo $row['department_id'] ?>"  data-name="<?php echo $row['name'] ?>"><span class="fa fa-trash"></span></a>
                                </div>
                            </li>
                            <?php endwhile; ?>
                            <?php if($dept_qry->num_rows <= 0): ?>
                                <li class="list-group-item text-center">No data listed yet.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 h-100 d-flex flex-column">
                    <div class="w-100 d-flex border-bottom border-dark py-1 mb-1">
                        <div class="fs-5 col-auto flex-grow-1"><b>Designation List</b></div>
                        <div class="col-auto flex-grow-0 d-flex justify-content-end">
                            <a href="javascript:void(0)" id="new_designation" class="btn btn-dark btn-sm bg-gradient rounded-2" title="Add Designation"><span class="fa fa-plus"></span></a>
                        </div>
                    </div>
                    <div class="h-100 overflow-auto border rounded-1 border-dark">
                        <ul class="list-group">
                            <?php 
                            $dept_qry = $conn->query("SELECT * FROM `designation_list` order by `name` asc");
                            while($row = $dept_qry->fetch_assoc()):
                            ?>
                            <li class="list-group-item d-flex">
                                <div class="col-auto flex-grow-1">
                                    <?php echo $row['name'] ?>
                                </div>
                                <div class="col-auto">
                                    <?php if($row['status'] == 1): ?>
                                        <a href="javascript:void(0)" class="update_stat_desg badge bg-success bg-gradiend rounded-pill text-decoration-none me-1" title="Update Status" data-toStat = "0" data-id="<?php echo $row['designation_id'] ?>" data-name="<?php echo $row['name'] ?>"><small>Active</small></a>
                                        <?php else: ?>
                                        <a href="javascript:void(0)" class="update_stat_desg badge bg-secondary bg-gradiend rounded-pill text-decoration-none me-1" title="Update Status" data-toStat = "1" data-id="<?php echo $row['designation_id'] ?>"  data-name="<?php echo $row['name'] ?>"><small>Inactive</small></a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-auto d-flex justify-content-end">
                                    <a href="javascript:void(0)" class="edit_designation btn btn-sm btn-primary bg-gradient py-0 px-1 me-1" title="Edit Designation Details" data-id="<?php echo $row['designation_id'] ?>"  data-name="<?php echo $row['name'] ?>"><span class="fa fa-edit"></span></a>

                                    <a href="javascript:void(0)" class="delete_designation btn btn-sm btn-danger bg-gradient py-0 px-1" title="Delete Designation" data-id="<?php echo $row['designation_id'] ?>"  data-name="<?php echo $row['name'] ?>"><span class="fa fa-trash"></span></a>
                                </div>
                            </li>
                            <?php endwhile; ?>
                            <?php if($dept_qry->num_rows <= 0): ?>
                                <li class="list-group-item text-center">No data listed yet.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('#new_department').click(function(){
            uni_modal('Add New Department',"manage_department.php")
        })
        $('.edit_department').click(function(){
            uni_modal('Edit Department Details',"manage_department.php?id="+$(this).attr('data-id'))
        })
        $('.update_stat_dept').click(function(){
            var changeTo = $(this).attr('data-toStat') == 1 ? "Active" : "Inactive";
            _conf("Are you sure to change status of <b>"+$(this).attr('data-name')+"</b> to "+changeTo+"?",'update_stat_dept',[$(this).attr('data-id'),$(this).attr('data-toStat')])
        })
        $('.delete_department').click(function(){
            _conf("Are you sure to delete <b>"+$(this).attr('data-name')+"</b> from Department List?",'delete_department',[$(this).attr('data-id')])
        })
        // DESIGNATION
        $('#new_designation').click(function(){
            uni_modal('Add New Designation',"manage_designation.php")
        })
        $('.edit_designation').click(function(){
            uni_modal('Edit Designation Details',"manage_designation.php?id="+$(this).attr('data-id'))
        })
        $('.update_stat_desg').click(function(){
            var changeTo = $(this).attr('data-toStat') == 1 ? "Active" : "Inactive";
            _conf("Are you sure to change status of <b>"+$(this).attr('data-name')+"</b> to "+changeTo+"?",'update_stat_desg',[$(this).attr('data-id'),$(this).attr('data-toStat')])
        })
        $('.delete_designation').click(function(){
            _conf("Are you sure to delete <b>"+$(this).attr('data-name')+"</b> from Designation List?",'delete_designation',[$(this).attr('data-id')])
        })
       
        $('table').dataTable({
            columnDefs: [
                { orderable: false, targets:6 }
            ]
        })
    })
    function update_stat_dept($id,$status){
        $('#confirm_modal button').attr('disabled',true)
        $.ajax({
            url:'./../Actions.php?a=update_stat_dept',
            method:'POST',
            data:{id:$id,status:$status},
            dataType:'JSON',
            error:err=>{
                consolre.log(err)
                alert("An error occurred.")
                $('#confirm_modal button').attr('disabled',false)
            },
            success:function(resp){
                if(resp.status == 'success'){
                    location.reload()
                }else{
                    alert("An error occurred.")
                    $('#confirm_modal button').attr('disabled',false)
                }
            }
        })
    }
    function update_stat_desg($id,$status){
        $('#confirm_modal button').attr('disabled',true)
        $.ajax({
            url:'./../Actions.php?a=update_stat_desg',
            method:'POST',
            data:{id:$id,status:$status},
            dataType:'JSON',
            error:err=>{
                consolre.log(err)
                alert("An error occurred.")
                $('#confirm_modal button').attr('disabled',false)
            },
            success:function(resp){
                if(resp.status == 'success'){
                    location.reload()
                }else{
                    alert("An error occurred.")
                    $('#confirm_modal button').attr('disabled',false)
                }
            }
        })
    }
    function delete_department($id){
        $('#confirm_modal button').attr('disabled',true)
        $.ajax({
            url:'./../Actions.php?a=delete_department',
            method:'POST',
            data:{id:$id},
            dataType:'JSON',
            error:err=>{
                consolre.log(err)
                alert("An error occurred.")
                $('#confirm_modal button').attr('disabled',false)
            },
            success:function(resp){
                if(resp.status == 'success'){
                    location.reload()
                }else{
                    alert("An error occurred.")
                    $('#confirm_modal button').attr('disabled',false)
                }
            }
        })
    }
    function delete_designation($id){
        $('#confirm_modal button').attr('disabled',true)
        $.ajax({
            url:'./../Actions.php?a=delete_designation',
            method:'POST',
            data:{id:$id},
            dataType:'JSON',
            error:err=>{
                consolre.log(err)
                alert("An error occurred.")
                $('#confirm_modal button').attr('disabled',false)
            },
            success:function(resp){
                if(resp.status == 'success'){
                    location.reload()
                }else{
                    alert("An error occurred.")
                    $('#confirm_modal button').attr('disabled',false)
                }
            }
        })
    }
</script>