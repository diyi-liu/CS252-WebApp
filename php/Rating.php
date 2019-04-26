<?php
$db = new mysqli('e-rater.diyi-liu.com', 'e-rater', 'e-rater', 'e-rater');
// check if this user has a rating on the event already
$stmt = $db->prepare('SELECT uid FROM events WHERE uid = ? AND LIMIT 1');
$stmt->bind_param('s', $_POST['username']);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows !== 0 ) {
	// Update the rating

} else {

}