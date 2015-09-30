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

		$_POST = array_map( 'stripslashes', $_POST);
		
		//collect form data
		extract($_POST);
		$postSlug = slug($postTitle);
		//very basic validation
		if($postID ==''){
			$error[] = 'This post is missing a valid id!.';
		}

		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}

		if($postType ==''){
			$error[] = 'Please decide the type of this post.';
		}

		if($postArchived ==''){
			$error[] = 'Please decide if post is archived or not.';
		}

		if($postIsHighlighted ==''){
			$error[] = 'Please decide if post is highlighted or not.';
		}

		/*if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}*/

		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}

		if(!isset($error)){

			try {
				//insert into database
				$stmt = $db->prepare('UPDATE 2015_posts SET title = :postTitle, isHighlighted = :postIsHighlighted, archived = :postArchived, type = :postType, slug = :postSlug, description = :postDescription, content = :postContent WHERE id = :postID') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postSlug' => $postSlug,
					':postType' => $postType,
					':postArchived' => $postArchived,
					':postIsHighlighted' => $postIsHighlighted,
					':postDescription' => $postDesc,
					':postContent' => $postCont,
					':postID' => $postID
				));

				//redirect to index page
				header('Location: index.php?action=updated');
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

			$stmt = $db->prepare('SELECT id, title, archived, type, isHighlighted, description, content FROM 2015_posts WHERE id = :id') ;
			$stmt->execute(array(':id' => $_GET['id']));
			$row = $stmt->fetch(); 

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

	<form action='' method='post'>
		<input type='hidden' name='postID' value='<?php echo $row['id'];?>'>

		<p><label>Title</label><br />
		<input type='text' name='postTitle' value='<?php echo $row['title'];?>'>

		<p><label>Is this post archived ?</label><br />
		<small>Note: Post is hidden from the website if it is archived, and you can unarchive it anytime you want.</small><br/>
		<select name="postArchived">
		<?php if($row['archived'] == 1){
		echo "	<option value='1'>Yes</option>
			<option value='0'>No</option>
		";	
		} else{
		echo "	<option value='0'>No</option>
			<option value='1'>Yes</option>
		";
		} ?>
		</select>
		</p>

		<p><label>Do you want to highlight this post ?</label><br />
		<small>Note: Post that is highlighted will be shown in a small section at the top of the website.</small><br/>
		<select name="postIsHighlighted">
		<?php if($row['isHighlighted'] == 1){
		echo "	<option value='1'>Yes</option>
			<option value='0'>No</option>
		";	
		} else{
		echo "	<option value='0'>No</option>
			<option value='1'>Yes</option>
		";
		} ?>
		</select>
		</p>

		<p><label>Type of this post</label><br />
		<select name="postType">
		<?php if($row['type'] == 'News'){
		echo "	<option value='News'>News</option>
			<option value='Event'>Event</option>
			<option value='Fundraising'>Fundraising</option>
		";	
		} else if($row['type'] == 'Fundraising'){
			echo "	<option value='Fundraising'>Fundraising</option>
			<option value='Event'>Event</option>
			<option value='News'>News</option>
		";	
		}else{
		echo "	<option value='Event'>Event</option>
			<option value='News'>News</option>
			<option value='Fundraising'>Fundraising</option>
		";
		} ?>
		</select>
		</p>

		<!-- <p><label>Description</label><br />
		<textarea name='postDesc' cols='60' rows='10'><?php echo $row['description'];?></textarea></p> -->

		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php echo $row['content'];?></textarea></p>

		<p><input type='submit' name='submit' value='Update'></p>

	</form>

</div>
</div>
</div>
</div>
