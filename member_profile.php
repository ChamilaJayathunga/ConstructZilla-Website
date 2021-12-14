<?php require ('header.php');

$sql="select members.*, users.name,role.role from members,users,role where members.user_id=users.id and members.role_id=role.id and members.id='$mem_id'";
$res=mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($res);
?>

<style>
    .form-group{
        margin: 30px;
    }
</style>

<br>
<center><h1>Member Details</h1>


<div class="form-group">
   <b>Name : </b> <input  value="<?php echo $row['name'] ?>" type="text" disabled>
</div>


<div class="form-group">
   <b>Role : </b> <input value="<?php echo $row['role'] ?>" type="text" disabled>
</div>
<h6>NIC Image</h6>
<div class="form-group">
    <img src="<?php echo MEMBER_IMAGE_SITE_PATH.$row['nic']?>" widhth="100" alt="">
    <img src="<?php echo MEMBER_IMAGE_SITE_PATH.$row['nic2']?>" widhth="100" alt="">
</div>
<h6>Previus Projects</h6>
<div class="form-group">
    <textarea name="" id="" cols="100" rows="10" disabled><?php echo $row['pre_project'] ?></textarea>
</div>
<h6>Qualifications</h6>
<div class="form-group">
    <textarea name="" id="" cols="100" rows="10" disabled><?php echo $row['qlfction'] ?></textarea>
</div>

</center>

<!--<div class="table-responsive">
    <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
        <thead class="table-light">
            <tr>
                <th>File name</th>
                <th>view</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $files = scandir('media/proof/'.$mem_id.'');
            if(false !== $files)
                {
                    $folder_name = 'media/proof/'.$mem_id.'/';
                foreach($files as $file)
                { 
                    if('.' !=  $file && '..' != $file)
  {?>
            <tr>
                <td><?php echo $folder_name.$file ?> <img src="<?php echo $file ?>" alt=""></td>
                <td><a href="">View File</a></td>

                
            </tr>
            <?php }}} ?>
        </tbody>
    </table>
</div>-->

<?php require ('footer.php');?>