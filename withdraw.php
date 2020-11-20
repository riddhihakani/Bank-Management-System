<?php

include('includes/header.php');
include('admin/includes/pdocon.php');
include('admin/includes/function.php');

$db = new Pdocon;


$id = $_SESSION['user_data']['id'];
$db->query('SELECT * FROM accounts WHERE cust_id=:cust_id');
$db->bindvalue(':cust_id', $id,PDO::PARAM_INT);

$results = $db->fetchMultiple();

if(isset($_POST['withdraw_amt'])){

   // CREATE TRIGGER `withdraw_cut` BEFORE INSERT ON `withdraw` FOR EACH ROW SET NEW.amount=NEW.amount-0.05*NEW.amount


    $raw_send          =   cleandata($_POST['send_acc']);
    $raw_amount          =   cleandata($_POST['amount']);
    
   
    $c_send             =   sanitize($raw_send);
    $c_amount              =   valint($raw_amount);
  

    $db->query('SELECT balance FROM accounts WHERE acc_no=:accno');
    $db->bindvalue(':accno',$c_send,PDO::PARAM_STR);
    $output = $db->fetchSingle();
    //DROP TRIGGER IF EXISTS `withdraw_check`;CREATE DEFINER=`root`@`localhost` TRIGGER `withdraw_check` BEFORE INSERT ON `withdraw` FOR EACH ROW IF NEW.amount>40000 THEN SET NEW.amount=80000; END IF

    if($c_amount<$output['balance']){

    $db->query('UPDATE accounts SET balance=balance-:amount WHERE acc_no=:send');
    $db->bindvalue(':amount',$c_amount,PDO::PARAM_INT);
    $db->bindvalue(':send',$c_send,PDO::PARAM_STR);
    $row = $db->execute();

    if($row){
        echo 'transfer successful';
    }else{
        echo 'Transfer unsuccessful';
    }

    $db->query('INSERT INTO withdraw(withdrawal_id,cust_id,acc_no,amount,date) VALUES (NULL,:cust,:acc_no,:amount,:datet)');
    $db->bindvalue(':cust',$id,PDO::PARAM_INT);
    $db->bindvalue(':acc_no',$c_send,PDO::PARAM_STR);
    $db->bindvalue(':amount',$c_amount,PDO::PARAM_INT);
    $db->bindvalue(':datet',date("Y-m-d"),PDO::PARAM_STR);
    $row = $db->execute();
    
    }else{

        echo 'You do not have enough balance in your account';


}



}


?>
<link rel="stylesheet" href="css/transaction.css">
<div class="container shadow-lg p-3 mb-5 bg-white rounded" style="border: 2px solid black;">
    <div class="row  m-3" >
    <h3>Withdraw Money</h3>
    </div>
    <hr>
    <div class="row m-2">
    <br>
    <form method="post" action="withdraw.php"class="mt-3 mb-2">
        <div class="form-row">
            <div class="form-group">
                <select id="accno" name="send_acc" class="form-control">
                    <option value="" selected>Choose your account</option>
                    <?php foreach($results as $result): ?>
                    <option value="<?php echo $result['acc_no']?>"><?php echo $result['acc_no'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group ml-2">
                <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount you want to Withdraw">
            </div>
            <!-- <div class="form-group">
                <input type="date" class="form-control" id="date" name="datet" placeholder="Date of Transfer">
            </div> -->
        </div>
        <button type="submit" class="btn btn-primary" name="withdraw_amt">Withdraw Amount</button>
        
    </form>
    </div>
    <div class="row m-3">
        <h2>My Withdrawals</h2>
    </div>
    <div class="row m-2">
        <div class="col-md-2">
               <h5>Withdrawal ID</h5>
        </div> 
        <div class="col-md-3">
               <h5>Account Number</h5>
        </div>
         <div class="col-md-3">
              <h5>Amount</h5>
        </div>
        <div class="col-md-3">
               <h5>Date</h5>
        </div>
        
    </div>
    <hr>
    <?php 
        
        $db->query('SELECT * FROM withdraw where cust_id=:cust_id ');
        $db->bindvalue(':cust_id',$id,PDO::PARAM_STR);
        $results = $db->fetchMultiple();
        foreach($results as $result):
        ?>
        
    <div class="row m-2">
        <div class="col-md-2">
                <?php echo $result['withdrawal_id'] ?> 
        </div> 
        <div class="col-md-3">
                <?php echo $result['acc_no'] ?> 
        </div>
         <div class="col-md-3">
                <?php echo $result['amount'] ?>  
        </div>
        <div class="col-md-3">
                <?php echo $result['date'] ?>  
        </div>
        
    </div>
        <?php endforeach; ?>
    </div>

</body>
<?php include('includes/footer.php') ?>