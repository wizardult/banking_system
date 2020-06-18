<?php
include ('../db/db.php');
session_start();

if (!(isset($_SESSION['user_email']))) {
  // echo "<script>window.open('../login.php','_self')</script>";
  header('location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ansonika.com/sparker/admin_section/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:12:23 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Lloyldbank | Bank with a difference.</title>
  
  <!-- Favicons-->
  <link rel="shortcut icon" href="lloyldbank.png" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="lloyldbank.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="lloyldbank.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="lloyldbank.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="lloyldbank.png">
  
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Main styles -->
  <link href="css/admin.css" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Plugin styles -->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Your custom styles -->
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
</head>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ed8e9409e5f6944228fe023/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="user_account.php" style=""><img src="lloyldbank.png" width="130" height="35"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Bookings">
          <a class="nav-link" href="user_account.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">My profile</span>
          </a>
        </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
          <a class="nav-link" href="createprofile.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Edit Profile</span>
          </a>
        </li>

    
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#Components">
            <i class="fa fa-fw fa-gear"></i>
            <span class="nav-link-text">Transaction</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <li><a href="user_transfer.php">Transfer</a>
            </li>
			<li>
              <li><a href="transfer_history.php">Transfer history</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
          <a class="nav-link" href="change_password.php">
            <i class="fa fa-fw fa-gear"></i>
            <span class="nav-link-text">Change password</span>
          </a>
        </li>
    
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>


      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
            <i class="fa fa-home"></i>Home</a>
          <!-- <a class="nav-link">Welcome User</a> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /Navigation-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Edit profile</a>
        </li>

          <li class="breadcrumb-item">
          <?php if (isset($_SESSION['user_email'])) {
            $user=$_SESSION['user_email'];
            $sql = $conn->prepare("select * from customer where email = ?");
            $sql->bind_param("s",$user);
            $sql->execute();
          $result = $sql->get_result();
          while($row=$result->fetch_assoc()){
          $fname = $row['name'];
        
          echo "<a><b>Welcome</b> $fname</a>";
            }
            }
          ?>
        </li>
      </ol>

      <div>
            <h4 class="text-center">Enter Receiver's Account number from the box below</h4>
          </div>
    
    <!-- /box_general-->
    <div class="row">
      <div class="col-md-3">
      
      </div>
      <div class="col-md-6">
        <div class="box_general padding_bottom">
          <div class="header_box version_2">
            <h2><i class="fa fa-lock"></i>Transfer</h2>
          </div>

          
          <form action="user_transfer.php" method="POST">
      <!--     <div class="form-group">
			<label for="text">Senders account no: *</label>
			<input type="text" class="form-control"  name="actno2" required="">
			</div><br> -->

			<div class="form-group">
			<label for="text">Receivers account no: *</label>
			<input type="text" class="form-control"  name="actno" required="">
			</div><br>

			<div class="form-group">
			<label for="text">Amount*</label>
			<input type="text" class="form-control" name="amount" value="" required="">
			</div><br>
      
        </div>
      </div>
      <div class="col-md-3">
      
      </div>
    </div>
    <!-- /row-->
    <div class="text-center"><input type="submit" value="Transfer" name="submit" class="btn_1 medium"></div>
    </form>
    
    </div>
    <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © LloydBank 2020</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>


    <?php
if(isset($_POST['submit'])){

	$total=0;
	$total1=0;

	$amount=$_POST['amount'];

	$actno = $_POST['actno'];
	$actno2 = $_POST['actno2'];

	if(isset($_POST['receiver'])){
  	$receiver=$_POST['receiver'];
  }

  if(isset($_POST['sender'])){
  	$sender=$_POST['sender'];
  }


  	// $sql3 = "SELECT * FROM customer where account_no='$actno'";
 
  	// 	$result = $sql->get_result();
  	// 	if ($result->num_rows==0) {
  	//       echo "<script>swal({
  	// 			title: 'Opps! please contact customer care',
  	// 			icon: 'warning',
  	// 			button: 'Ok!',
			// 	})</script>";
  		
  	// 	exit();
  	// 	}

if (isset($_SESSION['user_email'])) {
  $user=$_SESSION['user_email'];
  $sql = "SELECT * FROM customer where email='$user'";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
    $account_no= $row["account_no"];
		$accountstatus2= $row["accountstatus"];
		$total=$accountstatus2 - $amount;

	$sql = "UPDATE customer SET accountstatus='$total'  WHERE account_no=$account_no";

	$sql2 = "SELECT * FROM customer where account_no='$actno'";
	$result = $conn->query($sql2);

  //check if account is not in database
  if ($result->num_rows ==0) {      
        echo "<script>swal({
          title: 'Failed! please contact customer care',
          icon: 'warning',
          button: 'Ok!',
        })</script>";
      }
      //end
	while($row=$result->fetch_assoc()){
		$email= $row['email'];
		$name1 = $row['name'];
		$accountstatus3= $row["accountstatus"];
		$total1=$accountstatus3 + $amount;

	$sql2 = "UPDATE customer SET accountstatus ='$total1'  WHERE account_no=$actno";
		
		if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {

			$to=$email;
			$subject = 'Transaction Alert [credit]';
			$body= 'Dear "$name1"'. "\n\n".'We wish to inform you that there is a credit transaction on your account with us' . "\n\n". 'The details of this transaction are shown below'. "\n\n". 'Amount : "$amount"'. "\n\n". 'Current Balance: "$total1"';
			$headers= 'From: Lloyds Bank <contact@Lloydsbank.com>';

			mail($to, $subject, $body, $headers);

			echo "<script>swal({
  				title: 'Transfer Successful, Thanks',
  				icon: 'success',
  				button: 'Ok!',
				})</script>";

          //inserting into transaction history
        $sql="insert into transaction(email,name,credit,debit,amount)
    values ('".$user."','".$name1."','".$amount."','".$amount."','".$total."')";
      $conn->query($sql);
        //end


			
		} else{
		

			echo "<script>swal({
  				title: 'Opps! please contact customer care',
  				icon: 'warning',
  				button: 'Ok!',
				})</script>";
		}
		}
		}
    }


	
// $id=$_GET['del'];

// $sql = "delete * from contactus where id =$id";
// $result = $conn->query($sql);
 
// $msg="Query Deleted Successfully";

}
?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="vendor/jquery.selectbox-0.2.js"></script>
  <script src="vendor/retina-replace.min.js"></script>
  <script src="vendor/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/admin.js"></script>
  <!-- Custom scripts for this page-->
    <script src="js/admin-charts.js"></script>
  
</body>

<!-- Mirrored from www.ansonika.com/sparker/admin_section/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:12:24 GMT -->
</html>

