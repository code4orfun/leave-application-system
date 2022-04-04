<?php
include __DIR__.DIRECTORY_SEPARATOR.'../common/views/header.php';
include __DIR__.DIRECTORY_SEPARATOR.'../common/views/footer.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../common/services/auth.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../common/db/models/leave.php';
error_reporting(0);
?>

<div class="container">
    <div class="row-md-12">
        <?php
        if (isset($_REQUEST['message']) && !empty($_REQUEST['message'])) {
            ?>
            <div class="alert alert-success" role="alert">
                <?= htmlspecialchars(trim($_REQUEST['message'])) ?>
            </div>
        <?php } ?>
    </div>
</div>

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
                        <td> <button class="btn btn-warning" type="submit">
                                <a href ="viewAllLeave.php?accept=<?= $leave['id']; ?>">Accept</a></button>
                            <button class="btn btn-danger" type="submit">
                                <a href ="viewAllLeave.php?reject=<?= $leave['id']; ?>">Reject</a></button></td>
                    </tbody>
                    <?php } ?>

                    <?php
                    $leave = new Leave();
                    if(isset($_GET['accept'])){
                        $id = $_GET['accept'];
                        $leave->update(['status' => "1"],"id='$id'");
                        header('location:/admin/viewAllLeave.php?message=Leave Approved');
                    }

                    if(isset($_GET['reject'])){
                        $id = $_GET['reject'];
                        $leave->update(['status' => "0"],"id='$id'");
                        header('location:/admin/viewAllLeave.php?message=Leave Rejected');
                    }
                    ?>




