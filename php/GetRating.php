<?php
$db = new mysqli('localhost', 'e-rater', 'e-rater', 'e-rater');
$stmt = $db->prepare('select avg(rating) from events where ename = ?');
$stmt->bind_param('s', $_GET['name']);

$stmt->execute();
$result = $stmt->get_result();

echo round($result->fetch_assoc()['avg(rating)'], 1);