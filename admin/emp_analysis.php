<?php 

include('includes/header.php');
include('includes/pdocon.php');
include('includes/function.php');

$db = new Pdocon;
// $id = $_SESSION['user_data']['admin_id'];
$db->query('SELECT * FROM employee WHERE emp_id in(SELECT employee_id FROM account)');

$results = $db->fetchMultiple();
if($results){
   // echo 'query successful';
}else{
   // echo 'query unsuccessful';
}

?>

<div class="jumbotron mt-4 shadow p-3 mb-5 bg-white rounded" >
    <h3>STAR EMPLOYEES</h3>
    <hr>
    <div class="row">
            <div class="col-md-2 mt-1" >
                <h5>Employee ID</h5>
            </div>
            <div class="col-md-7 mt-1" >
                <h5>Employee Name</h5>
            </div>
            <div class="col-md-3 mt-1" >
                <h5>Accounts Created by Employee</h5>
            </div>
          
       
    </div>
    <hr>
  
    <div class="row"  >
        <?php foreach($results as $result): ?>
            <div class="col-md-2 mt-1" style="border-bottom: 2px solid darkgray">
                <h6><?php echo $result['emp_id'] ?><h6>
            </div>
            <div class="col-md-7 mt-1" style="border-bottom: 2px solid darkgray">
                <h6><?php echo $result['fname'] . ' ' . $result['lname'] ?></h6>
            </div>
            <div class="col-md-3 mt-1" style="border-bottom: 2px solid darkgray">
                <ol>
                <?php 
                 
                 $db->query('SELECT * FROM accounts WHERE employee_id=:id');
                 $db->bindvalue(':id',$result['emp_id'],PDO::PARAM_INT);
                 $res = $db->fetchMultiple();
                 foreach($res as $r):
                
                ?>
                <li><h6><?php echo $r['acc_no'] ?></h6></li>
                <hr>
                 <?php endforeach; ?>
                </ol>
            </div>
          
        <?php endforeach; ?>
    </div>
</div>

<?php 



$db = new Pdocon;
// $id = $_SESSION['user_data']['admin_id'];
$db->query('SELECT * FROM employee WHERE emp_id not in(SELECT employee_id FROM account)');

$results = $db->fetchMultiple();
if($results){
   // echo 'query successful';
}else{
   // echo 'query unsuccessful';
}


?>

<div class="jumbotron mt-4 shadow p-3 mb-5 bg-white rounded" >
    <h3>OTHER EMPLOYEES</h3>
    <hr>
    <div class="row">
            <div class="col-md-5 mt-1" >
                <h5>Employee ID</h5>
            </div>
            <div class="col-md-7 mt-1" >
                <h5>Employee Name</h5>
            </div>
       
    </div>
    <hr>
  
    <div class="row">
        <?php foreach($results as $result): ?>
            <div class="col-md-5 mt-3" style="border-bottom: 1px solid darkgray">
                <h6><?php echo $result['emp_id'] ?><h6>
            </div>
            <div class="col-md-7 mt-3" style="border-bottom: 1px solid darkgray">
                <h6><?php echo $result['fname'] . ' ' . $result['lname'] ?></h6>
            </div>
          
        <?php endforeach; ?>
    </div>
</div>
