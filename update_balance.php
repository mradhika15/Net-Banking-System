<?php
$from_acc=$_GET["from"];
$transfer=$_GET["bal"];
$to_acc=intval(substr($_GET["to"],0,15));

$con= mysqli_connect ('localhost' ,'root',"",'NETBANKING');

$selectquery1 ="select BALANCE from customer where ACCOUNT_NO=$to_acc";
$query1=mysqli_query($con,$selectquery1);
$res1=mysqli_fetch_array($query1);

$selectquery2 ="select BALANCE from customer where ACCOUNT_NO=$from_acc";
$query2=mysqli_query($con,$selectquery2);
$res2=mysqli_fetch_array($query2);

$acc_from_balance=$res2["BALANCE"]-$transfer;
$acc_to_balance=$res1["BALANCE"]+$transfer;

$updatequery1="UPDATE customer SET BALANCE = $acc_from_balance WHERE ACCOUNT_NO=$from_acc";
$upquery1=mysqli_query($con,$updatequery1);

$updatequery2="UPDATE customer SET BALANCE = $acc_to_balance WHERE ACCOUNT_NO=$to_acc";
$upquery2=mysqli_query($con,$updatequery2);

if($upquery1){
    if($upquery2){
        ?>
        <script>
            var abc=alert("Transaction Successful");
            if(abc){
                window.location.href=<?php header('location:customer.php'); ?>;
            }
            </script>
            <?php
    }
}
               
?>
