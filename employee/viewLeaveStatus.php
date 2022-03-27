<?php
include __DIR__ . DIRECTORY_SEPARATOR . '../common/views/header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../common/db/models/leave.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../common/services/auth.php';

?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_REQUEST['message']) && !empty($_REQUEST['message'])) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?= htmlspecialchars(trim($_REQUEST['message'])) ?>
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
                        <thead>
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
                        foreach ((new Leave())->select(['*'], "user_id=$userId order by id DESC") as $leave) {
                            ?>
                            <tr>
                                <td><?= $leave['id'] ?></td>
                                <td><?= date('d-m-Y \a\t h:i',strtotime($leave['created_at'])) ?></td>
                                <td><?= $leave['date'] ?></td>
                                <td><?= $leave['message'] ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm">Edit</a>
                                    <a class="btn btn-danger btn-sm">Cancel</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php

include __DIR__ . DIRECTORY_SEPARATOR . '../common/views/footer.php';
?>