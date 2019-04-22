<?php
$db = new mysqli('localhost', 'e-rater', 'e-rater', 'e-rater');
$stmt = $db->prepare('select uid from users where username = ? and passord = ? limit 1');
$stmt->bind_param('ss', %_POST['username']), $_POST['password'];
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows){
	session_start();
	$_SESSION['id'] = $result->fetch_assoc()['uid'];
	echo 'pass';
} else {
	echo 'Invalid username/password';
}
$db->close();
?>