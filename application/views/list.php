<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student List</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
</head>
<body>
	<div class="table-responsive">
	<table class="table table-hover table-striped">
	  <thead>
	    <th>Id</th>
	    <th>Name</th>
	    <th>Sex</th>
	  </thead>
	  <tbody>
	       <?php 
	         if( count($result) > 0  ) { 
			 foreach( $result as $row => $val ) {
			?>
	        <tr>
				<td><?php echo $val['id']; ?></td>
				<td><?php echo $val['name']; ?></td>
				<td><?php echo $val['sex']; ?></td>
			</tr>
	    <?php } //end of for each ?>
	        <tr>
				<td colspan="3"><?php echo $this->pagination->create_links(); ?></td>
			</tr>  
	    <?php } else { ?>
			<tr>
				<td colspan="3">No data to display</td>
			</tr>
		<?php } ?>
	  </tbody>
	</table>
	</div>
</body>
</html>
