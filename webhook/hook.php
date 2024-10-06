<?php
$update = json_decode(file_get_contents('php://input'), true);
file_put_contents('updates.log', print_r($update, true), FILE_APPEND);

?>
