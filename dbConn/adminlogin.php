<?php
	session_start();
	
	require_once 'conn.php'; 
	if(ISSET($_POST['login'])){
		if($_POST['username'] != "" || $_POST['password'] != ""){
			$username = $_POST['username'];
		
			$password = $_POST['password'];
			$sqlQuery = "SELECT * FROM users
			WHERE username='".$username."' AND pw='".$password."'";
			
			$resultSet= $con->prepare($sqlQuery); 
			
			$resultSet->execute(array()); 
			if ($isValidLogin = $resultSet->fetch())
			{
				if($isValidLogin){
								$_SESSION['usertemp'] = $isValidLogin['UserID']; 
								$_SESSION['username'] = $isValidLogin['username'];
							
									$Refno =$isValidLogin['UserID'];
									
									$sqlQuery = "SELECT * FROM tblVerified 
									WHERE Refno='".$Refno."' AND VLevelDescription ='Account Login'";
								  	$resultSet= $con->prepare($sqlQuery); 
									
									$resultSet->execute(array()); 
									if ($isValidLogin = $resultSet->fetch())
									{
									$_SESSION['user'] = $_SESSION['usertemp'] ; 
										echo "
											<script>alert('Login Success')</script> 
											";
											header("location: ../admin/dashboard.php");
									}else{
											$_SESSION['message']=array("text"=>"Account Not Yet Verified! Please Check yor registered email address to verify using OTP.","alert"=>"info");
											echo "
												<script>alert('Account Not Yet Verified! Please Check yor registered email address to verify using OTP.')</script> 
												";
												header("location: ../admin/index.php");
											
									}
					
				} else{
					 
					echo "
					<script>alert('Invalid username or password')</script>
					<script>window.location = '../admin/index.php'</script>
					";
				}
			}else{
					$_SESSION['message']=array("text"=>"Invalid Username or Password. Please Try Again!","alert"=>"info");
					echo "
					<script>alert('Invalid username or password')</script>
				 	<script>window.location = '../admin/index.php'</script>
					";
				}
			
		}else{
			echo "
				<script>alert('Please complete the required field!')</script>
				<script>window.location = '../admin/index.php'</script>
			";
		}
	}
?>