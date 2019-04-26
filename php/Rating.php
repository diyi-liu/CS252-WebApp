<?php

$db = new mysqli('e-rater.diyi-liu.com', 'e-rater', 'e-rater', 'e-rater');
// check if this user has a rating on the event already
$stmt = $db->prepare('SELECT uid FROM events WHERE uid = ? AND ename = ?');
session_start();
print_r($_POST);
print_r($_SESSION);
$stmt->bind_param('is', $_SESSION['id'], $_POST['ename']);
echo $_SESSION['id'];
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows !== 0 ) {
	// Update the rating
	$stmt->close();
	$stmt = $db->prepare('UPDATE `events` SET `rating` = ? WHERE `events`.`uid` = ? and `events`.`ename` = ?');
	session_start();
	$stmt->bind_param('iis', $_POST['rating'], $_SESSION['id'], $_POST['ename']);
	$stmt->execute();
	$stmt->close();
	echo 'update';
} else {
	$stmt->close();
	$stmt = $db->prepare("INSERT INTO `events` (`e_id`, `ename`, `rating`, `uid`, `s_id`) VALUES (NULL, ?, ?, ?, NULL)");
	$stmt->bind_param('sii', $_POST ['ename'], $_POST ['rating'], $_SESSION['id']);
	$stmt->execute();
	$stmt->close();
	echo 'add';
}
$db->close();
?>