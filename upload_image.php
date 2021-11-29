


<?php
  if(isset($_POST['upload']))
  {
  	$file= $_FILES['file'];
  	print_r($file);
  }

?>







<html>
<head>
	<title>upload image</title>
</head>
<body>
<form action="?" method="POST" enctype="multipart/form-data">
	<label>uploading files</label>
	<p><input type="file" name="file"></p>
	<p><input type="submit" name="upload" value="upload-image"></p>
	





</form>
</body>
</html>