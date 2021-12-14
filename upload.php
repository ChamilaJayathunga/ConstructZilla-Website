<?php
require('db_conn.php'); 
if(!isset($_SESSION['PROOF'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
} 
//upload.php
 $mem_id=$_SESSION['PROOF'];

if(!empty($_FILES))
{
   
    

$folder_name = 'media/proof/'.$mem_id.'/';
 $temp_file = rand(111111111,999999999).'_'.$_FILES['file']['name'];
 $location = $folder_name . $temp_file;
 move_uploaded_file($_FILES['file']['tmp_name'], $location);
}

if(isset($_POST["name"]))
{
    $folder_name = 'media/proof/'.$mem_id.'/';
    $filename = $folder_name.$_POST["name"];
    unlink($filename);
}

$result = array();

$files = scandir('media/proof/'.$mem_id.'');

$output = '<div class="row">';

if(false !== $files)
{
    $folder_name = 'media/proof/'.$mem_id.'/';
 foreach($files as $file)
 {
  if('.' !=  $file && '..' != $file)
  {
   $output .= '
   <div class="col-md-2">
    <img src="'.$folder_name.$file.'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
    <button type="button" class="btn btn-link remove_image" id="'.$file.'">Remove</button>
   </div>
   ';
  }
 }
}
$output .= '</div>';
echo $output;

?>