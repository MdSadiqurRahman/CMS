<?php

session_start();

include 'db.php';


if (isset($_POST['login'])) {


	function test_input($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;



	
	
	//check if it is empty
	if (!empty($_POST['email']) && !empty($_POST['password'])) {

		

		//check if they match

		$get_email = mysqli_real_escape_string($link, $_POST['email']);
		$get_email = test_input($get_email);
		$get_password = mysqli_real_escape_string($link, $_POST['password']);
		$get_password = test_input($get_password);

		

		$query = "SELECT * FROM users WHERE email ='$get_email' AND password ='$get_password'";


			if($result = mysqli_query($link, $query)){


					if(mysqli_num_rows($result) > 0){

						$_SESSION['email'] = $get_email;
						$_SESSION['password'] = $get_password;
						
						header('Location: admin/index.php');

					}else{

						header('Location:index.php?login_error=wrong');
					}

			}else{

				header('Location:index.php?login_error=query_error');
			}
			

		
	}else{

		header('Location:index.php?login_error=empty');
	}


	
}

?>