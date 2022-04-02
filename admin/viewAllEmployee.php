<?php
include __DIR__.DIRECTORY_SEPARATOR.'../common/views/header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../common/services/auth.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../common/db/models/user.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../common/db/models/Department.php';
include __DIR__.DIRECTORY_SEPARATOR.'../common/views/footer.php';

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
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Is_Admin</th>
                        <th scope="col">Department_Name</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach((new Department())->findByJoin() as $dept){ ?>
                        <td><?= $dept['id']; ?></td>
                        <td><?= $dept['name']; ?></td>
                        <td><?= $dept['email']; ?></td>
                        <td><?= $dept['password']; ?></td>
                        <td><?= $dept['is_admin']; ?></td>
                        <td><?= $dept['title']  ?></td>
                        <td><?= date('d-m-Y \a\t h:i',strtotime($dept['created_at']))?></td>
                        <td>
                        <a href ="del_Employee.php?delete=<?= $dept['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>


                    </tbody>
                    <?php } ?>


