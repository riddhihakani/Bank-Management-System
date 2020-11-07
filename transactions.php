<?php

include('includes/header.php');
include('admin/includes/pdocon.php');
include('admin/includes/function.php');

$db = new Pdocon;

$id = $_SESSION['user_data']['id'];
$db->query('SELECT * FROM accounts WHERE cust_id=:cust_id AND acc_type="current"');
$db->bindvalue('cust_id', $id,PDO::PARAM_INT);

$results = $db->fetchMultiple();

if(isset($_POST['transfer_amt'])){
    
    $raw_send          =   cleandata($_POST['send_acc']);
    $raw_recieve         =   cleandata($_POST['ben_acc']);
    $raw_amount          =   cleandata($_POST['amount']);
    $raw_date          =   cleandata($_POST['datet']);
   
    $c_send             =   sanitize($raw_send);
    $c_receive             =   sanitize($raw_recieve);
    $c_amount              =   valint($raw_amount);
    $c_datet              =   valint($raw_date);

    $db->query('UPDATE accounts SET balance=balance+:amount WHERE acc_no=:recieve');
    $db->bindvalue(':amount',$c_amount,PDO::PARAM_INT);
    $db->bindvalue(':recieve',$c_receive,PDO::PARAM_STR);
    $row = $db->execute();

    if($row){
        echo 'transfer successful';
    }else{
        echo 'Transfer unsuccessful';
    }
   
    $db->query('INSERT INTO transactions (trans_id,cust_id,sender_acc,receiver_acc,amount,date_trans) VALUES (NULL,:cust,:sender,:receiver,:amt,:datet)');
    $db->bindvalue(':cust',$id,PDO::PARAM_INT);
    $db->bindvalue(':sender',$c_send,PDO::PARAM_STR);
    $db->bindvalue(':receiver',$c_receive,PDO::PARAM_STR);
    $db->bindvalue(':amt',$c_amount,PDO::PARAM_INT);
    $db->bindvalue(':datet',date("Y-m-d"),PDO::PARAM_STR);
    $row = $db->execute();




}


?>
<link rel="stylesheet" href="css/transaction.css">
<div class="container ">
    <div class="row justify-content-center mt-5" style="border: 2px solid black;">
    <div class="col-md-7">

    </div>
    <div class="col-md-5">
    <form method="post" action="transactions.php"class="mt-3 mb-2">
            <div class="form-group">
                <select id="accno" name="send_acc" class="form-control">
                    <option value="" selected>Choose your account</option>
                    <?php foreach($results as $result): ?>
                    <option value="<?php echo $result['acc_no']?>"><?php echo $result['acc_no'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group ">
                <input type="text" class="form-control" id="rec_acc" name="ben_acc" placeholder="Beneficiary Account(Receiver Account)">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount you want to transfer">
            </div>
            <!-- <div class="form-group">
                <input type="date" class="form-control" id="date" name="datet" placeholder="Date of Transfer">
            </div> -->
       
        <button type="submit" class="btn btn-primary" name="transfer_amt">Transfer Amount</button>
        </form>
    
    </div>
    </div>
</div>

<?php include('includes/footer.php') ?>