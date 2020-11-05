<?php include('includes/header.php'); ?>
<?php

require('./admin/includes/function.php');
include('./admin/includes/function.php');

$email  = $_SESSION['user_data']['email'];
echo $email;
$db = new Pdocon;
$db->query('SELECT * from accounts where cust_id=("SELECT customer_id from customer where email=:email")');
$db->bindvalue(':email',$email,PDO::PARAM_STR);
$results = $db->fetchMultiple();


?>

<?php foreach($results as $result): ?>
    <ul>
        <li>
            <?php echo $result['acc_no'] ?>
        </li>
    </ul>
    
<?php endforeach; ?>