<!DOCTYPE html>
<?php
  session_start();
 
?>
 
<?php
    // this page outputs the contents of the textarea if posted
    $txtcheckin = ""; // set var to avoid errors
    $txtcheckout= ""; // set var to avoid errors
     $numday = "";
     $numofGuests=""; // set var to avoid errors
    
    if(isset($_POST['txtcheckin1'])){
        $txtcheckin = $_POST['txtcheckin1'];
         $txtcheckout = $_POST['txtcheckout'];
          $numday = $_POST['numday'];
          $numofGuests = $_POST['numofGuests'];
    }
?>
<html>
<head>
<title>View Room</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="all" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie7.css" media="all" /><![endif]-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="js/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 <script src="js/jquery-ui.js"></script>
  </head>
<body>
<div id="header1">
 <ul>
    <li ><a href="index.html">home</a></li>
    <li><a href="service.php">our Services</a></li>
    <li><a href="restaurant.php">Restaurant </a></li>
    <li class="selected"><a href="Reservation.php">Reservation</a></li>
    <li><a href="Login.php">Login</a></li>
    
    <li><a href="contact.html">contact us</a></li>
  </ul>
    
 <div class="logo"></div>
</div>
<div id="body">

  <div class="gallery">

 <table class="table" border="2" style="background-color:#F3F2F2">
     <tr>
      <td> <h3>Checking Date</h3>
           <h3><b><?php echo $txtcheckin;?></b></h3>
           <textarea TYPE="text" name="txtcheckin1" style="display: none"><?php echo $txtcheckin;?></textarea>
      </td>
      <td> <h3>Checkout Date</h3>
           <h3><b><?php echo $txtcheckout;?></b></h3>
           <textarea TYPE="text" NAME="txtcheckout"  style="display: none"><?php echo $txtcheckout;?></textarea>
      
      </td>
      <td> <h3>No of Day</h3>
           <h3><b><?php echo $numday;?></b></h3>
          
       <textarea TYPE="text" NAME="numday" style="display: none" ><?php echo $numday;?></textarea>
    
      </td>
      <td  > <h3>No of Guests</h3>
           <h3><b><?php echo $numofGuests;?></b></h3>
           
       <textarea TYPE="text" NAME="numofGuests" style="display: none"><?php echo  $numofGuests ;?></textarea>
    
      </td>
     </tr>
     </table>

     
  <table width="200" border="0" class="table">
    
  <tr>
    <th>NO OF NIGHT(S)</th>
    <th>GUEST(S)</th>
    <th></th>
  </tr>
  <tr>

     <td><h3><b><textarea><?php echo $numday;?></textarea></b></h3></td>
     <td><h3><b><textarea><?php echo $numofGuests;?></textarea></b></h3></td>
    
     <form  method="post" >
   <td><input type="text" name="guest"/></td>
   <td><input type="submit" name="search" value="Search"/></td>
  </tr>
  </form>
</table>
  <div class="panel panel-default">
     <div class="panel-body">
      <table >
      <tr>
        <td ><img src="images/Umaid Bhawan.jpg" alt="" width="200" height="200" /></td>
        <td width="100"></td>
        <td width="600"><h2>Royal Residency</h2><p>Welcome to a unique experience in Jaipur Umaid Residency- one of the most classic Jaipur Hotels welcomes you to the world of traditional Rajasthani hospitality in this pink city Jaipur. Forget your worries in this beautiful and 
        </p></td>
        <td width="100"></td>
        <td width="300"><b><h1>Rs. 6,000.00<b> <h1>
            <p>Cost for 1 night per Room<br>
            Exclusive Tax </p> </td>
        <td width="200"> </td>
      </tr>
    
       </table> 
     </div>

</div>
<div class="panel panel-default">
     <div class="panel-body">
    <div class="container">
  
  <table class="table">
    <thead>
      <tr>
       <th>ACCOMMODATION TYPE</th>
        <th>ROOMS</th>
        <th>Cost</th>
        <th></th>
      </tr>
    </thead>
   <form action="login.php" method="post">
       <?php 

            if($_SERVER['REQUEST_METHOD']=='POST'){
              require_once('connect.php');
            
              $sql = "SELECT  DISTINCT (type),cost  FROM mst_room";
               $r = mysqli_query($conn,$sql);
            
              $res = mysqli_fetch_array($r);
              
              $result = array();
              {
                  ?>

             <tbody>  
             <?php  
          while ($row = mysqli_fetch_array($r))
          {  
            
            echo "<tr> "; 
              echo  "<td>" . $row['type']  . "</td>"; 
              echo  "<td >" . ""  . "</td>"; 
              echo  "<td >" . $row['cost']  . "</td>"; 
              echo "<td>", "<input type='submit' name='submit' value='Reserve'> ","</td>";
              echo "</br>"; 
              echo "</tr>" ; 
            
          
          } mysqli_close($conn);
            }
            }
          ?> 

         </table>
    </tbody>
  </table>
  </form>
</div>
</div>
     </div>
</div>

    
</div>
</div>

<div id="footer">
  <div>
    <div class="connect">
      <h4>Follow us:</h4>
      <ul>
        <li class="facebook"><a href="#">facebook</a></li>
        <li class="twitter"><a href="#">twitter</a></li>
      </ul>
    </div>
    <p>Copyright &copy; <a href="#">Domain Name</a> - All Rights Reserved | Template By <a target="_blank" href="http://www.freewebsitetemplates.com/">FreeWebsiteTemplates.com</a></p>
  </div>
</div>
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>