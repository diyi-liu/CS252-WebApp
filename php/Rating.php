<?php

//$_SESSION['id'] = 5;
//$_POST['rating'] = 1;
//$_POST['ename'] = "208 Seconds: A Lifetime of Lessons";

$db = new mysqli('e-rater.diyi-liu.com', 'e-rater', 'e-rater', 'e-rater');
// check if this user has a rating on the event already
$stmt = $db->prepare("SELECT uid FROM events WHERE uid = ? AND ename = ?");
session_start();
$stmt->bind_param('is', $_SESSION['id'], $_POST['ename']);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows !== 0 ) {
	// Update the rating
	$stmt->close();
	$stmt = $db->prepare('UPDATE `events` SET `rating` = ? WHERE `events`.`uid` = ? and `events`.`ename` = ?');
<<<<<<< HEAD
	$stmt->bind_param('iis', $_POST['rating'], $_SESSION['id'], $_POST['ename']);
=======
	session_start();
	$stmt->bind_param('dis', $_POST['rating'], $_SESSION['id'], $_POST['ename']);
>>>>>>> e455f3baf2fd1a274011f69b1147082ba1d565ea
	$stmt->execute();
	$stmt->close();
	echo 'update';
} else {
	$stmt->close();
	$stmt = $db->prepare("INSERT INTO `events` (`e_id`, `ename`, `rating`, `uid`) VALUES (NULL, ?, ?, ?)");
	$stmt->bind_param('sdi', $_POST ['ename'], $_POST ['rating'], $_SESSION['id']);
	$stmt->execute();
	$stmt->close();
	echo 'add';
}
$db->close();
?>