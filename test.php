<?php
require 'common/db/models/user.php';
require 'common/db/models/department.php';
require 'common/services/session.php';
require 'common/services/auth.php';

require 'common/db/models/leave.php';

$leave = new Leave();
echo "<pre>";
print_r($leave->select(['*'],'user_id=1'));
