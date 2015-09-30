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

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}

		if($postArchived ==''){
			$error[] = 'Please decide if post is archived or not.';
		}

		if($postIsHighlighted ==''){
			$error[] = 'Please decide if post is highlighted or not.';
		}

		if($postType ==''){
			$error[] = 'Please enter the type of the post.';
		}


		/*if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}*/

		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}

		if(!isset($error)){

			try {

				$postSlug = slug($postTitle);
				$userId = $_SESSION['userId'];
				//insert into database
				$stmt = $db->prepare('INSERT INTO 2015_posts (title,slug,archived,type,isHighlighted,content,date,userId) VALUES (:postTitle, :postSlug, :postArchived, :postType, :postIsHighlighted, :postCont, :postDate, :postUserId)') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postSlug' => $postSlug,
					/*':postDesc' => $postDesc,*/
					':postArchived' => $postArchived,
					':postType' => $postType,
					':postIsHighlighted' => $postIsHighlighted,
					':postCont' => $postCont,
					':postDate' => date('Y-m-d H:i:s'),
					':postUserId' => $userId
				));

				//redirect to index page
				header('Location: index.php?action=added');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

	<form action='' method='post'>

		<p><label>Title</label><br />
		<input type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>

		<p><label>Is this post archived ?</label><br />
		<small>Note: Post is hidden from the website if it is archived, and you can unarchive it anytime you want.</small><br/>
		<select name="postArchived">
			<option value='0'>No</option>
			<option value='1'>Yes</option>
		</select>
		</p>

		<p><label>Do you want to highlight this post ?</label><br />
		<small>Note: Post that is highlighted will be shown in a small section at the top of the website.</small><br/>
		<select name="postIsHighlighted">
			<option value='0'>No</option>
			<option value='1'>Yes</option>
		</select>
		</p>

		<p><label>Type of this post</label><br />
		<select name="postType">
			<option value='News'>News</option>
			<option value='Event'>Event</option>
			<option value='Fundraising'>Fundraising</option>
		</select>
		</p>

		<!-- <p><label>Description</label><br />
		<textarea name='postDesc' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea></p> -->

		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea></p>

		<p><input type='submit' name='submit' value='Submit'></p>

	</form>

</div>
</div>
</div>
</div>
