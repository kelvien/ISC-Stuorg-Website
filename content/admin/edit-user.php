<?php
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>


<div class="container">
	<div class="row">
	<div class="col-xs-12">
<div id="wrapper">


<?php include('../content/admin/menu.php');?>
	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		//collect form data
		extract($_POST);

		//very basic validation
		if($username ==''){
			$error[] = 'Please enter the username.';
		}

		if($name ==''){
			$error[] = 'Please enter the name.';
		}

		if( strlen($password) > 0){

			if($password ==''){
				$error[] = 'Please enter the password.';
			}

			if($passwordConfirm ==''){
				$error[] = 'Please confirm the password.';
			}

			if($password != $passwordConfirm){
				$error[] = 'Passwords do not match.';
			}

		}
		

		if($email ==''){
			$error[] = 'Please enter the email address.';
		}

		if(!isset($error)){

			try {

				if(isset($password)){

					$hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);

					//update into database
					$stmt = $db->prepare('UPDATE 2015_users SET name = :name, username = :username, password = :password, email = :email WHERE id = :id') ;
					$stmt->execute(array(
						':name' =>$name,
						':username' => $username,
						':password' => $hashedpassword,
						':email' => $email,
						':id' => $id
					));


				} else {

					//update database
					$stmt = $db->prepare('UPDATE 2015_users SET name = :name, username = :username, email = :email WHERE id = :id') ;
					$stmt->execute(array(
						'$name' =>$name,
						':username' => $username,
						':email' => $email,
						':id' => $id
					));

				}
				

				//redirect to index page
				header('Location: users.php?action=updated');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	?>


	<?php
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo $error.'<br />';
		}
	}

		try {

			$stmt = $db->prepare('SELECT id, name, username, email FROM 2015_users WHERE id = :id') ;
			$stmt->execute(array(':id' => $_GET['id']));
			$row = $stmt->fetch(); 

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

	<form action='' method='post'>
		<input type='hidden' name='id' value='<?php echo $row['id'];?>'>

		<p><label>Name</label><br />
		<input type='text' name='name' value='<?php echo $row['name'];?>'></p>

		<p><label>Username</label><br />
		<input type='text' name='username' value='<?php echo $row['username'];?>'></p>

		<p><label>Password (only to change)</label><br />
		<input type='password' name='password' value=''></p>

		<p><label>Confirm Password</label><br />
		<input type='password' name='passwordConfirm' value=''></p>

		<p><label>Email</label><br />
		<input type='text' name='email' value='<?php echo $row['email'];?>'></p>

		<p><input type='submit' name='submit' value='Update User'></p>

	</form>

</div>
</div>
</div>
</div>
