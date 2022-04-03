<?php
include __DIR__.DIRECTORY_SEPARATOR.'../common/views/header.php';
include __DIR__.DIRECTORY_SEPARATOR.'../common/views/footer.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../common/services/auth.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../common/db/models/leave.php';
?>


<div class="border border-2">
    <div class="container mt-1">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered border-primary table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>
                        <th>User_ID</th>
                        <th>Applied Date</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ((new Leave())->select(['*']) as $leave){ ?>

                        <td> <?= $leave['id']; ?> </td>
                        <td> <?= $leave['user_id']; ?> </td>
                        <td> <?= date('d-m-Y \a\t h:i ',strtotime($leave['date'])); ?> </td>
                        <td> <?= $leave['message']; ?> </td>
                        <td> <button class="btn btn-primary" type="submit" value="accept?action.php">
                                <a href ="viewAllLeave.php?accept=<?= $leave['id']; ?>">Accept</a></button>
                         <button class="btn btn-primary" type="submit">Reject</button></td>
                    </tbody>
                    <?php } ?>

                    <?php
                    $leave = new Leave();
                    if(isset($_GET['accept'])){
                        $id = $_GET['accept'];
                        $leave->update(['status' => "1"],"id='$id'");
                        echo "Leave accepted";
                    }
                    ?>



