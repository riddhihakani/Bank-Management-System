<?php

include('includes/header.php');
include('./../admin/includes/pdocon.php');
include('./../admin/includes/function.php');

if(isset($_GET['emp_id'])){
    $id = $_GET['emp_id'];
}

$db = new Pdocon;
$db->query('SELECT * FROM employee WHERE branch_no=(SELECT branch_no FROM employee WHERE emp_id=:id) and emp_id != :id ');
$db->bindvalue(':id',$id,PDO::PARAM_INT);
$results = $db->fetchMultiple();
if($results){
    //echo 'successful';
}
else{
   // echo 'unsuccessful';
}


?>

<div class="jumbotron mt-4">
    <h1>MY EMPLOYEES</h1>
    <hr>
    <div class="row mt-3">
        <?php foreach($results as $result): ?>
            <div class="col-md-2 mt-2">
                <h6><?php echo $result['emp_id'] ?></h6>
            </div>
            <div class="col-md-4 mt-2">
                <h6><?php echo $result['fname'] . ' ' . $result['lname'] ?></h6>
            </div>
            <div class="col-md-3 mt-2">
                <h6><?php echo $result['dept'] ?></h6>
            </div>
            <div class="col-md-3 mt-2">
                <h6><?php echo $result['post'] ?></h6>
            </div>
        <?php endforeach; ?>

    </div>
</div>

