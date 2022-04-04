<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '../common/db/models/department.php';
?>
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

    </tr>
    </thead>
<?php
$html = '<table class="table table-bordered  table-striped"><thead class="thead-dark" ><tr><td>ID</td><td>NAME</td><td>EMAIL</td><td>PASSWORD</td><td>IS ADMIN</td><td>DEPARTMENT ID</td><td>CREATED AT</td></tr></thead></table>';
//print_r($html);

foreach((new Department())->findByJoin() as $dept){
               $html .= '<table>
                        <td>' . $dept['id'] .'</td>
                        <td>' . $dept['name'] .'</td>
                        <td>' . $dept['email'] .'</td>
                        <td>' . $dept['password'] .'</td>
                        <td>' . $dept['is_admin'] .'</td>
                        <td>' . $dept['title'] .'</td>
                        <td> ' . $dept['created_at'] .'</td>' ; }
                    $html .= '</table>';
                    echo $html;

header('Content-Type: application/xls');
header("Content-Disposition:attachment;filename=result.xls");


?>

