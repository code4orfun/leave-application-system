<?php
require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../services/auth.php';
$authService = new AuthService();
?>
<!DOCTYPE>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
            crossorigin="anonymous"></script>
    <style>
        a:link {
            color: blue;
            background-color: transparent;
            text-decoration: none;
        }
        a:visited {
            color: darkblue;
            background-color: transparent;
            text-decoration: none;
        }
        a:hover {
            color: deeppink;
            background-color: transparent;
            text-decoration: underline;
        }
        a:active {
            color: red;
            background-color: transparent;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><?= APP_NAME ?></a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (session_id()) { ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Employees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Leaves</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <?php
                if ($authService->isUserLoggedIn()) {
                    if($authService->isAdmin()){
                    ?>
                        <form class="form-inline my-5 my-lg-1 justify-content-start">
                            <a class="nav-link active" aria-current="page" href="../../admin/viewAllEmployee.php">View All Employee</a>
                            <a class="nav-link active" aria-current="page" href="../../admin/viewAllLeave.php">View All Leave</a>
                            <a class="nav-link active" aria-current="page" href="../../admin/add_Employee.php">Add Employee</a>

                        </form>
                        <?php }else{?>
                    <form class="form-inline my-5 my-lg-1 justify-content-start">
                            <a class="nav-link active" aria-current="page" href="../../employee/viewLeaveStatus.php">View Leave Status</a>
                            <a class="nav-link active" aria-current="page" href="../../employee/applyLeave.php">Apply For Leave</a>
                    </form>

                <?php }?>
                    <form class="form-inline my-2 my-lg-0" method="post" action="/actions.php?action=logout">
                        <button type="submit" class="text-primary" style="background: none; border: none">Logout
                        </button>
                    </form>
                    <?php }?>
            </div>
        </div>
    </nav>
</header>