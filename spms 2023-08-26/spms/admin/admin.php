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

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title animated-title" style="color: #FF4500;">User List</h3>
        <div class="card-tools align-middle">
            <button class="btn btn-dark btn-sm py-1 rounded-0" type="button" id="create_new">Add New</button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped table-bordered">
            <colgroup>
                <col width="5%">
                <col width="30%">
                <col width="25%">
                <col width="25%">
                <col width="15%">
            </colgroup>
            <thead>
                <tr>
                    <th class="text-center p-0">No.</th>
                    <th class="text-center p-0">Name</th>
                    <th class="text-center p-0">Username</th>
                    <th class="text-center p-0">Type</th>
                    <th class="text-center p-0">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT * FROM `admin_list` where admin_id != 1 order by `fullname` asc";
                $qry = $conn->query($sql);
                $i = 1;
                    while($row = $qry->fetch_array()):
                ?>
                <tr>
                    <td class="text-center p-0"><?php echo $i++; ?></td>
                    <td class="py-0 px-1"><?php echo $row['fullname'] ?></td>
                    <td class="py-0 px-1"><?php echo $row['username'] ?></td>
                    <td class="py-0 px-1"><?php echo ($row['type'] == 1)? "Administrator" : 'Staff' ?></td>
                    <th class="text-center py-0 px-1">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm rounded-0 py-0" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <li><a class="dropdown-item edit_data" data-id = '<?php echo $row['admin_id'] ?>' href="javascript:void(0)">Edit</a></li>
                            <li><a class="dropdown-item delete_data" style="color: red;" data-id = '<?php echo $row['admin_id'] ?>' data-name = '<?php echo $row['fullname'] ?>' href="javascript:void(0)">Delete</a></li>
                            </ul>
                        </div>
                    </th>
                </tr>
                <?php endwhile; ?>
                <?php if(!$qry->fetch_array()): ?>
                    <tr>
                        <th class="text-center p-0" colspan="5" style="color: red;">No data display.</th>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(function(){
        $('#create_new').click(function(){
            uni_modal('Add New User',"manage_admin.php")
        })
        $('.edit_data').click(function(){
            uni_modal('Edit User Details',"manage_admin.php?id="+$(this).attr('data-id'))
        })
        $('.delete_data').click(function(){
            _conf("Are you sure to delete <b>"+$(this).attr('data-name')+"</b> from list?",'delete_data',[$(this).attr('data-id')])
        })
    })
    function delete_data($id){
        $('#confirm_modal button').attr('disabled',true)
        $.ajax({
            url:'./../Actions.php?a=delete_admin',
            method:'POST',
            data:{id:$id},
            dataType:'JSON',
            error:err=>{
                console.log(err)
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