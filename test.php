<?php
require 'common/db/models/user.php';
require 'common/db/models/department.php';
require 'common/services/session.php';
require 'common/services/auth.php';

require 'common/db/models/leave.php';
echo '<pre>';


  $leave1 = new Leave();
                                $leave1->select(['*']);
                                $status = $leave1['status'];
                                print_r($status);
                                if($status == 1){ ?>
                                    <td> <a class="btn btn-primary btn-sm"> Accepted </a></td>
                                <?php } ?>
                                <?php if($status == 0){ ?>
    <td> <a class="btn btn-danger btn-sm">Rejected</a></td>
<?php } ?>
                                <?php if($status == -1){ ?>
    <td> <a class="btn btn-Secondary btn-sm">pending</a></td>
<?php } ?>