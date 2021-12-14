

<?php require('header.php'); 
if(!isset($_SESSION['PROOF'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
} 

?>


<?php require('dropzoen.php'); 
?>


<?php require('footer.php'); 
?>