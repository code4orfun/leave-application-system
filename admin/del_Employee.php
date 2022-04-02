<?php
require_once __DIR__. DIRECTORY_SEPARATOR."../common/db/models/user.php";
require_once __DIR__. DIRECTORY_SEPARATOR."../common/services/session.php";
require_once __DIR__. DIRECTORY_SEPARATOR."../common/services/auth.php";

?>


<?php
$user = new User();

   if(isset($_GET['delete'])) {
      $id = $_GET['delete'];

      $user->delete("id=$id");

    header('location:/admin/viewAllEmployee.php?message=Deleted Successfully');
   }



?>
