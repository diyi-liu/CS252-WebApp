<?php
$db = new mysqli('localhost', 'e-rater', 'e-rater', 'e-rater');
$stmt = $db->prepare('select uid from users where username = ? limit 1');
$stmt->bind_param('s', $_POST['username']);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows !== 0 ) {
	$stmt->close();
	$db->close();
	die('User exists. Please choose another username');
} else {
	$stmt->close();
	$stmt = $db->prepare("INSERT INTO 'users' ('uid', 'username', 'password', 'email') VALUES (NULL, ?, ?, ?);");
	$stmt->bind_param('sss', $_POST ['username'], $_POST ['password'], $_POST['email']);
	$stmt->execute();
	$stmt->close();
	$stmt = $db->prepare('SELECT uid FROM users WHERE username = ? AND password = ? LIMIT 1');
	$stmt->bind_param('ss', $_POST['username'], $_POST['password']);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows) {
		$result = $result->fetch_assoc()['uid'];
		session_start();
		$_SESSION['id'] = $result;
	}
	$stmt->close();
	$db->close();
	echo 'ok';
}
?>