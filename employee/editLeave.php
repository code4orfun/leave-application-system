<?php
include __DIR__.DIRECTORY_SEPARATOR.'../common/views/header.php';

require_once __DIR__.DIRECTORY_SEPARATOR.'../common/db/models/leave.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'../common/db/supports/model.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'../common/services/session.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'../common/services/auth.php';

?>

<?php

$leave = new Leave();
if(isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $leave->update([
        'date' => $_POST['date'],
        'message' => $_POST['message']
    ], "id= '$id'");
    header('location: /employee/viewLeaveStatus.php?text=DATA UPDATED SUCCESSFULLY!');
}
?>

