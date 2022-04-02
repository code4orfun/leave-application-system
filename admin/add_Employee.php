<?php
include __DIR__.DIRECTORY_SEPARATOR.'../common/views/header.php';
//include __DIR__.DIRECTORY_SEPARATOR.'../common/views/footer.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'../common/db/models/user.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'../common/db/models/department.php';

?>
<style>
    select {
        background-color: gold;
        border: deeppink;
        margin-bottom: 5px;
        margin-top: 5px;
        padding: 10px;
    }
</style>
<?php
$dept = new Department();
$dept->getDropDown();
?>
<section class="container">
    <div class="row justify-content-center h-75 align-items-center">
        <div class="col-md-7 border shadow-sm p-3 mb-5 bg-white rounded">
            <h3 class="text-primary mb-4">Add Employee</h3>
            <form method="post" action='add_Employee.php' name = "main">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name " class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                </div>
                <div>
<!--                    <pre> --><?php // print_r((new Department())->select(['*'])) ?><!-- </pre>-->
                    <select name="department" >
                        <option>  Select Department </option>
                        <?php
                       foreach ((new Department())->select(['*']) as $dept){ ?>
                           <option value = "<?php echo $dept['id']; ?>">
                                <?php echo $dept['title']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</section>
<?php

foreach((new Department)->findByJoin() as $dept)
    $user = new User();
    if (!empty($_POST['name'])) {
        if ($user->insert([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'dept_id' => $_POST['department'],
        ])){
            header('location : ../../admin/viewAllEmployee.php?message=Employee Added');
        }
    }

?>