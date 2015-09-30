<?php
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['deluser'])){ 

	//if user id is 1 ignore
	if($_GET['deluser'] !='1'){

		$stmt = $db->prepare('DELETE FROM 2015_users WHERE id = :id') ;
		$stmt->execute(array(':id' => $_GET['deluser']));

		header('Location: users.php?action=deleted');
		exit;

	}
} 

?>
	<div class="container">
	<div class="row">
	<div class="col-xs-12">
	<div id="wrapper">

<?php include('../content/admin/menu.php');?>
	<?php 
	//show message from add / edit page
	if(isset($_GET['action'])){ 
		echo '<h3>User '.$_GET['action'].'.</h3>'; 
	} 
	?>

	<table class="table table-striped">
	<tr>
		<th>Name</th>
		<th>Username</th>
		<th>Email</th>
		<th>Action</th>
	</tr>
	<?php
		try {

			$stmt = $db->query('SELECT id, name, username, email FROM 2015_users ORDER BY username');
			while($row = $stmt->fetch()){
				
				echo '<tr>';
				echo '<td>'.$row['name'].'</td>';
				echo '<td>'.$row['username'].'</td>';
				echo '<td>'.$row['email'].'</td>';
				?>

				<td>
					<a href="edit-user.php?id=<?php echo $row['id'];?>">Edit</a> 
					<?php if($row['id'] != 1){?>
						| <a href="javascript:deluser('<?php echo $row['id'];?>','<?php echo $row['username'];?>')">Delete</a>
					<?php } ?>
				</td>
				
				<?php 
				echo '</tr>';

			}

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
	?>
	</table>

	<p><a class="btn btn-md btn-success" href='add-user.php'>Add User</a></p>

</div>
</div>
</div>
</div>
