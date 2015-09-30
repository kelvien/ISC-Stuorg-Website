<?php
	include_once 'include/config.php';

	$stmt = $db->prepare('SELECT 2015_posts.id, 2015_posts.title, 2015_posts.slug, 2015_posts.content, 2015_posts.date, 2015_users.name FROM 2015_posts, 2015_users WHERE 2015_posts.userId = 2015_users.id and 2015_posts.slug = :slug and 2015_posts.archived = false');
	$stmt->execute(array(':slug' => $_GET['id']));
	$row = $stmt->fetch();

	//if post does not exists redirect user.
	if($row['id'] == ''){
		header('Location: ./404.php');
		exit;
	}

    $pageTitle = $row['title'];
    $pageSlug = $row['slug'];
    $pageDescription = $row['title'];
    $pageDate = $row['date'];
    $pageAuthor = $row['name'];
    $pageContent = $row['content'];
    $pageStylesheet = array("library/css/viewpost.css", "library/flexSlider/flexslider.css", "library/animate.css"); // Optional / if necessary
    $pageJavascript = array("library/js/form_submitter.js", "library/flexSlider/jquery.flexslider-min.js", "library/skrollr-master/src/skrollr.js"); // Optional / if necessary
    include('content/viewpost_layout.php');
?>