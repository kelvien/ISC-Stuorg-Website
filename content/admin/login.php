<?php
//check if already logged in
if( $user->is_logged_in() ){ header('Location: index.php'); } 
?>
<div class="container">
<div class="row">
<div class="col-xs-12 text-center">
<div id="login">
	<form action="" method="post">
	<p><label>Username</label>
	<input type="text" name="username" value=""  /></p>
	<p><label>Password</label>
	<input type="password" name="password" value=""  /></p>
	<?php
	//process login form if submitted
	if(isset($_POST['submit'])){

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if($user->login($username,$password)){ 

			//logged in return to index page
			header('Location: index.php');
			exit;
		

		} else {
			$message = '<p class="error">Wrong username or password</p>';
		}

	}//end if submit

	if(isset($message)){ echo $message; }
	?>
	<p><label></label><button type="submit" name="submit" class="btn btn-toolbar btn-lg">Log in</button></p>
	</form>
</div>
</div>
</div>
</div>