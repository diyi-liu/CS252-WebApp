<?php
$database = new mysqli('localhost', 'phpmyadmin', 'CS252', 'WebApp');
$statement = $database->prepare('select uid from users where username = ? limit 1');
$statement->bind_param('s', $_POST['username']);
$statement->execute();
$result = $statement->get_result();
if ($result->num_rows !== 0 ) {
	$statement->close();
	$database->close();
	die('User exists. Please choose another username');
} else {
	$statement->close();
	$statement = $database->prepare('INSERT INTO 'users' ('uid', 'username', 'password') VALUES (NULL, ?, ?);');
	$statement->bind_param('ss', $_POST ['username'], $_POST ['password']);
	$statement->execute();
	$statement->close();
	$statement = $database->prepare('SELECT uid FROM users WHERE username = ? AND password = ? LIMIT 1');
	$statement->bind_param('ss', $_POST['username'], $_POST['password']);
	$statement->execute();
	$result = $statement->get_result();
	if($result->num_rows) {
		$result = $result->fetch_assoc()['uid'];
		session_start();
		$_SESSION['id'] = $result;
	}
	$statement->close();
	$database->close();
	echo 'ok';
}
?>