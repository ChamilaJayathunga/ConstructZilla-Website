<?php

?>
<!DOCTYPE html>
<html>
 <head>
  <title>How to Upload a File using Dropzone.js with PHP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
 </head>
 <body>

 <!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="proof.php" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Project Proof Added Sucessfully</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Wait For Admin Approvel
      </div>
      
      <div class="modal-footer">
        <button type="submit" name="submit"  class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
 
<section>

 <div class="form-group">
  <div class="container">
   <br />
   <h3 align="center">Enter Your Project Proof</h3>
   <br />
   
   <form action="upload.php" class="dropzone" id="dropzoneFrom">

   </form>
   
    
  
   <br />
   <br />
   <div align="center">
    <button type="button" class="btn btn-info" id="submit-all">Upload</button>
   </div>
   <br />
   <br />
   <div id="preview"></div>
   <br />
   <br />
   <div class="form-group">
 <section class="clearfix">
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Submit
</button>
 
 </section>
 </div>
   </div>
  </div>
  </section>
  </form>
 </body>
</html>

<script>

$(document).ready(function(){
 
 Dropzone.options.dropzoneFrom = {
  autoProcessQueue: false,
  acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg,.pdf",
  init: function(){
   var submitButton = document.querySelector('#submit-all');
   myDropzone = this;
   submitButton.addEventListener("click", function(){
    myDropzone.processQueue();
   });
   this.on("complete", function(){
    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
    {
     var _this = this;
     _this.removeAllFiles();
    }
    list_image();
   });
  },
 };

 list_image();

 function list_image()
 {
  $.ajax({
   url:"upload.php",
   success:function(data){
    $('#preview').html(data);
   }
  });
 }

 $(document).on('click', '.remove_image', function(){
  var name = $(this).attr('id');
  $.ajax({
   url:"upload.php",
   method:"POST",
   data:{name:name},
   success:function(data)
   {
    list_image();
   }
  })
 });
 
});
</script>