<html>
    <head>
    <script src-"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <link href ="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
            <script src-"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
body{
   
   background-size: cover;  
   background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.1));
}
table ,th,td{
    border:1px solid black;
}
table{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    border-collapse: collapse;
    width:800px;
    border:1px solid #bdc3c7;
    box-shadow: 2px 2px 12px rgba(0,0,0,0.2), -1px -1px 8px rgba(0,0,0,0.2);
    letter-spacing: 1px;
    padding:10px 0 ;
    font-size:26px;
   
}
table{
    width:50%;
    border-collapse: collapse;
}

th{
    text-align: center;
    background-color: #008B8B;
    color: white;
}
td{
    text-align: center;
    height:70%;
    width:40%;
    color: black;
}
th, td {
  padding: 15px;
  text-align: center;
  border-bottom: 1px solid #ddd;
}
.content{
   
    min-height:10vh;
    margin-top:500px;
    margin-left:700px;
    text-decoration-color: #ddd;
    width:80px;height:10px;background-color:aqua;
}

</style></head>
<body>
<?php
$Accno=$_GET["acc_no"];
?>
<nav class-"navbar navbar-default" style-"margin-bottom:0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 style= "font-family: 'AlexBrush-Regular';">NET BANKING</h1>
                    </div>
    
                    <div cclass="col-lg-6">
                        <ul class="navbar-nav nav pull-right">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="customer.php">Customer and Transaction details</a></li>
                    </div>
                </div>
            </div>
        
            </nav>
<div>

<table>
<th>ACCOUNT_NO</th><th>NAME</th>
<th>BALANCE</th>




<?php 
        
        $con= mysqli_connect ('localhost' ,'root',"",'NETBANKING');
 
                    
                   $selectquery ="select * from customer where ACCOUNT_NO=$Accno";
                   $query=mysqli_query($con,$selectquery);
   
                   $nums=mysqli_num_rows($query);
                   while($res=mysqli_fetch_array($query)){
                ?>    
                      <tr>
                            <td><?php echo $res['ACCOUNT_NO']; ?></td>
                            <td><?php echo $res['NAME']; ?></td>
                            <td><?php echo $res['BALANCE']; ?></td>
                            
                            
                           
                      </tr>
                <?php
                   }
?>
</table>
<center><form method="GET" action="update_balance.php">
<?php 
        
        $con= mysqli_connect ('localhost' ,'root',"",'NETBANKING');
 
                    
                   $selectquery ="select * from customer";
                   $query=mysqli_query($con,$selectquery);
   
                   $nums=mysqli_num_rows($query);
                   ?>
                   <label for="to">Transfer to:</label><br>
                   <select name="to" id="to">
                       <option>Select</option>
                <?php
                   while($res=mysqli_fetch_array($query)){
                       if($res['ACCOUNT_NO']!=$Accno){
                ?>    
            
                 <option><?php echo $res['ACCOUNT_NO']?> - <?php echo $res['NAME']?></option>
           
                <?php
                   
                }
            }
?>
  </select><br><br>
<label for="bal">Enter amount to be transferred</label><br>
<input type="number" id="bal" name="bal">
<br><br>
<input type="submit">
<input type="hidden" name="from" value="<?php echo $Accno ?>">

                </form><center>
</div>

</body>
</html>   
