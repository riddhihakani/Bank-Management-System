<?php

include('includes/header.php');
include('./../admin/includes/pdocon.php');
include('./../admin/includes/function.php');

if(isset($_GET['emp_id'])){
    $id = $_GET['emp_id'];
}

$db = new Pdocon;
$db->query('SELECT insurance.cust_id, loan.amount, insurance.insurance_type, loan.loan_type FROM insurance INNER JOIN loan ON insurance.cust_id=loan.cust_id; ');
$results = $db->fetchMultiple();
if($results){
   // echo 'successful';
}
else{
   //echo 'unsuccessful';
}

?>

<div class="jumbotron mt-4 shadow-lg p-3 mb-5 bg-white rounded">
    <h1>CLIENT ANALYSIS</h1>
    <hr>
    <div class="row">
            <div class="col-md-1 mt-2">
                <h6>Customer ID</h6>
            </div>
            <div class="col-md-3 mt-2">
                <h6>Loan Amount</h6>
            </div>
            <div class="col-md-3 mt-2">
                <h6>Loan Type</h6>
            </div>
            <div class="col-md-3 mt-2">
                <h6>Insurance Type</h6>
            </div>    
    </div>
    <hr>
    <div class="row justify-content-center mt-3">
        <?php foreach($results as $result): ?>
          
            <div class="col-md-1 mt-2">
                <h6><?php echo $result['cust_id'] ?></h6>
            </div>
            <div class="col-md-3 mt-2">
                <h6><?php echo $result['amount']  ?></h6>
            </div>
            <div class="col-md-3 mt-2">
                <h6><?php echo $result['loan_type'] ?></h6>
            </div>
            <div class="col-md-3 mt-2">
                <h6><?php echo $result['insurance_type'] ?></h6>
            </div>
        <?php endforeach; ?>
        <hr>
    </div>
</div>

