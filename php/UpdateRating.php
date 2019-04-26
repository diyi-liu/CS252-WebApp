<?php
$db = new mysqli('localhost', 'e-rater', 'e-rater', 'e-rater');
// check if this user has a rating on the event already
$stmt = $db->prepare('SELECT uid FROM events WHERE username = ? AND LIMIT 1');