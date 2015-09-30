<?php
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['delpost'])){ 
	$stmt = $db->prepare('DELETE FROM 2015_posts WHERE id = :id') ;
	$stmt->execute(array(':id' => $_GET['delpost']));

	header('Location: index.php?action=deleted');
	exit;
} 

?>
	<div class="container">
	<div class="row">
	<div class="col-xs-12">

	<?php include('../content/admin/menu.php');?>

	<?php 
	//show message from add / edit page
	if(isset($_GET['action'])){ 
		echo '<h3>Post '.$_GET['action'].'.</h3>'; 
	} 
	?>


	<table class="table table-striped">
	<tr>
		<th>Date</th>
		<th>Is a highlight?</th>
		<th>Title</th>
		<th>Post type</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	<?php
		try {

			$stmt = $db->query('SELECT id, title, archived,type, isHighlighted, date FROM 2015_posts ORDER BY id DESC');
			while($row = $stmt->fetch()){
				
				echo '<tr>';
				echo '<td>'.date('jS M Y', strtotime($row['date'])).'</td>';
				if($row['isHighlighted'] == true){
					echo '<td><span class="label label-success">Highlighted</span></td>';
				}
				else{
					echo '<td><span class="label label-default">Not highlighted</span></td>';
				}
				echo '<td>'.$row['title'].'</td>';
				echo '<td>'.$row['type'].'</td>';
				if($row['archived'] == true){
					echo '<td><span class="label label-default">Archived</span></td>';
				}
				else{
					echo '<td><span class="label label-success">Active</span></td>';
				}
				?>

				<td>
					<a href="edit-post.php?id=<?php echo $row['id'];?>">Edit</a> | 
					<a href="javascript:delpost('<?php echo $row['id'];?>','<?php echo $row['title'];?>')">Delete</a>
				</td>
				
				<?php 
				echo '</tr>';

			}

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
	?>
	</table>

	<p><a href='add-post.php' class="btn btn-success btn-md">Add Post</a></p>

</div>
</div>
</div>

