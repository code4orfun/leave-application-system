<?php
include __DIR__ . DIRECTORY_SEPARATOR . '../common/views/header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../common/db/models/leave.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../common/services/auth.php';

?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_REQUEST['text']) && !empty($_REQUEST['text'])) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?= htmlspecialchars(trim($_REQUEST['text'])) ?>
                    </div>

                <?php } ?>
                <?php
                if (isset($_REQUEST['alert']) && !empty($_REQUEST['alert'])) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?= htmlspecialchars(trim($_REQUEST['alert'])) ?>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
    <div class="border border-2">
        <div class="container mt-1">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered  table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Applied at</th>
                            <th scope="col">Applied for</th>
                            <th scope="col">Message</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $userId = (new AuthService())->getCurrentUserId();
                        foreach ((new Leave())->select(['*'], "user_id=$userId order by id DESC") as $leave) { ?>
                            <tr>
                                <td>
                                    <?= $leave['id'] ?>
                                </td>
                                <td>
                                    <?= date('d-m-Y \a\t h:i',strtotime($leave['created_at'])) ?>
                                </td>
                                <td>
                                    <?= $leave['date'] ?>
                                </td>
                                <td>
                                    <?= $leave['message'] ?>
                                </td>
                                <td>
                                    <a href="viewLeaveStatus.php?edit=<?= $leave['id'];?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a class="btn btn-danger btn-sm">Cancel</a>
                                    <?php if(isset($_GET['edit'])==true){ ?>

                                </td>

                            </tr>

                        </tbody>

                        <section class="container">
                            <div class="row justify-content-center h-75 align-items-center">
                                <div class="col-md-7 border shadow-sm p-3 mb-5 bg-white rounded">
                                    <h3 class="text-primary mb-4">Edit</h3>
                                    <form method="post" action="editLeave.php?edit=<?= $_GET['edit']?>" >

                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" name="date" id="date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="text">Message</label>
                                            <textarea id="text" name="message" row="10" col="500" class="form-control"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">submit</button>
                                    </form>
                                </div>
                            </div>
                        </section>
                        <?php  exit(); } ?>
                        <?php } ?>


                    </table>
                </div>
            </div>
        </div>
    </div>

<?php

include __DIR__ . DIRECTORY_SEPARATOR . '../common/views/footer.php';
?>


