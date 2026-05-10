<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
   $admin_id = $_POST['admin_id'];
   $admin_name = $_POST['admin_name'];
?>

<div class="message-box">
   
   <div class="icon-ask">
      <i class="fa fa-question-circle" aria-hidden="true"></i>
   </div>

   <div class="ask-decline">
      <p> Are you sure you want to activate this admin? </p>
      <h1> <?=$admin_id?> </h1>
   </div>

   <div class="form-button">
      <form id="admin-form">
         <button type="button" class="admin-no-btn"> No </button>
         <button type="button" class="admin-yes-btn" data-admin_id="<?=$admin_id?>"> Yes </button>
      </form>
   </div>

</div>


<script>
   $(document).ready(function(){
      
      $('.admin-no-btn').click(function(){
         $('.archive-message').hide();
      });

      $('.admin-yes-btn').click(function(){
         var adminid = $(this).data('admin_id');

         $.ajax({
            url: './php/pagination_archive.php',
            type: 'POST',
            data: {
               adminid: adminid,
               activate_admin_y: 'yes' // Sending 'yes' to indicate activation
            },
            success: function(response) {
               console.log(response); // Log response for debugging
               // Redirect to archive.php after activation
               window.location.href = 'archive.php';
            },
            error: function(xhr, status, error) {
               console.error(error);
               // Handle errors here
            }
         });
      });
   });
</script>
