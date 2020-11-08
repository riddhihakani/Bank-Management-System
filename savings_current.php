<?php

include('includes/header.php');
include('admin/includes/pdocon.php');
include('admin/includes/function.php');

$db = new Pdocon;


$id = $_SESSION['user_data']['id'];
$db->query('SELECT withdraw.amount as e,deposit.amount as f,deposit.acc_no
FROM withdraw
INNER JOIN deposit ON withdraw.acc_no = deposit.acc_no WHERE deposit.cust_id=:cust_id AND deposit.date=:today');
$db->bindvalue(':cust_id', $id,PDO::PARAM_INT);
$db->bindvalue(':today', date('Y-m-d'),PDO::PARAM_STR);

$results = $db->fetchMultiple();

if($results){
    echo 'query successful';
}else{
    echo 'unsuccessful';
}
?>
<link rel="stylesheet" href="css/transaction.css">
<div class="container shadow-lg p-3 mb-5 bg-white rounded" style="border: 2px solid black;">
    <div class="row  m-3" >
    <h3>Active Accounts</h3>
    </div>
    <hr>
    <div class="row m-2">
        <div class="col-md-2">
               <h5>Account Number</h5>
        </div> 
        <div class="col-md-3">
               <h5>Withdraw Amount</h5>
        </div>
         <div class="col-md-3">
              <h5>Deposit Amount</h5>
        </div>
       
        
    </div>
    <hr>
    <?php 
        foreach($results as $result):
        ?>
        
    <div class="row m-2">
        <div class="col-md-4">
                <?php echo $result['acc_no'] ?> 
        </div> 
        <div class="col-md-3">
                <?php echo $result['e'] ?> 
        </div>
         <div class="col-md-3">
                <?php echo $result['f'] ?>  
        </div>
      
        
    </div>
        <?php endforeach; ?>
    </div>

</body>
<?php include('includes/footer.php') ?>