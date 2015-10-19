<?php  Auth::kickout('login'); ?>

<?php  include "header.php";?>

	<h2 class="title"><small>My Project</small></h2>
	<div class="list-container flex flex-a-start flex-j-start"> 

  		<!-- insert lists from database  -->

  		<div class="list well last">
			<input id="new-list" class="form-control" type="text" placeholder="add a list">
 			<button class="btn btn-primary">add</button>
	  	</div>  
	</div>

<!-- Tempalates -->

<?php  include TEMPLATES."list.html";?>
<?php  include TEMPLATES."task-card.html";?>
<?php  include TEMPLATES."modal.html";?>
<?php  include TEMPLATES."comment.html";?>

<?php  include "footer.php";?>

