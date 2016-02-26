<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Image uploading with thumbnail creation in Codeigniter 3</title>
</head>
<body>
	<?php echo $message; ?>
	<form action="<?php echo site_url('image/upload'); ?>" method="post" enctype="multipart/form-data">
		<input type ="hidden" name ="post_check" value ="1" />
		<input type ="file"   name ="image" /> <br />
		<input type ="submit" value ="Upload">
	</form>	
</body>
</html>
