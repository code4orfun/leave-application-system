<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'common/db/models/user.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'common/db/models/leave.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'common/services/session.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'common/services/auth.php';
//require_once __DIR__.DIRECTORY_SEPARATOR . 'common/db/supports/model.php';


if (isset($_REQUEST['action'])) {
    $authService = new AuthService();
    switch ($_REQUEST['action']) {
        case 'login':
            if ($authService->login($_POST['email'], $_POST['password'])) {
                $authService->redirectUser();
            } else {
                header('location: /index.php?message=Invalid Credentials');
            }
            break;

        case 'logout':
            if($authService->logout()){
                header('location: /index.php?message=Successfully Logged Out');
            }
            break;

            case 'apply for leave':
            $leave = new Leave();
            if($leave->insert([
                'date'=>$_POST['date'],
                'message'=>$_POST['message'],
                'user_id'=>$authService->getCurrentUserId(),
            ])){
               header('location:/employee/viewLeaveStatus.php?alert=Leave applied successfully');
            }
            break;







    }
}
