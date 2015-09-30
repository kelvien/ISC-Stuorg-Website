<?php include("../include/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<!--Hello, contact me for questions at khidayat@iastate.edu-->
<head>
	<title><?php echo $pageTitle; ?></title>
	<!--Basic META tags-->
	<meta content="K.H" name="author"></meta> <!--Contact khidayat@iastate.edu for enquiries-->
	<meta charset="utf-8"></meta>
	<meta content="width=device-width, initial-scale=1.0" name="viewport"></meta>
	<meta content="international, students, council, isc, helper, bridge, connects to isso" name="keywords"></meta>
	<meta content="<?php echo $pageDescription;?>" name="description"></meta>
	<!--Open Graph Protocol-->
	<meta property="og:title" content="International Student Council | Iowa State University" />
	<meta property="og:type" content="International Student Council" />
	<meta property="og:url" content="http://www.isc.stuorg.iastate.edu" />
	<meta property="og:description" content="<?php echo $pageDescription;?>" />
	<!-- Icons (Sizing order is weird, I'm not sure why. This is generated by a favicon generator and ordered for a reason, don't change it) -->
	<link rel="apple-touch-icon" sizes="57x57" href="../media/icon/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../media/icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../media/icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../media/icon/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../media/icon/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../media/icon/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../media/icon/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../media/icon/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../media/icon/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="../media/icon/favicon-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="../media/icon/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="../media/icon/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="../media/icon/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="../media/icon/favicon-32x32.png" sizes="32x32"> 
	<meta name="msapplication-TileColor" content="#2b5797">
	<meta name="msapplication-TileImage" content="../media/icon/mstile-144x144.png">
	<!--[if IE]><link rel="shortcut icon" href="/media/icon/favicon.ico" /><![endif]-->
	<!--FONTS-->
	<link href="http://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">
	<!--Common Stylesheet-->
	<link href="../library/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="../library/bootstrap-3.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../library/bootstrap-3.3.1-dist/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="../library/css/styles.css" rel="stylesheet">
	<link href="../library/css/admin.css" rel="stylesheet">
	<link href="../library/css/app.css" rel="stylesheet">
	<!--Page-related Stylesheet-->
	<?php
	if(isset($pageStylesheet)){
		foreach($pageStylesheet as &$sheet){
			echo "<link rel=\"stylesheet\" href=\"", $sheet, "\" />";
		}
	}
	?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-58629436-1', 'auto');
	  ga('send', 'pageview');

	</script>
</head>
<body>
<div class="page_header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div id="own_nav">
						<a href="."><img id="landing_logo" src="../media_dev/new-logo_white.png"/></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo $pageHeader; ?></h1>
					<p style="color: white;">Manage ISC's news and users here</p>
				</div>
			</div>
		</div>
	</div>
	<?php include($pageContent); ?>
	<?php include("../content/footer.php"); ?>
	<!--Common Scripts-->
	<script type="text/javascript" src="../library/jquery-2.1.1/jQuery-2.1.1.js"></script>
	<script type="text/javascript" src="../library/bootstrap-3.3.1-dist/js/bootstrap.min.js"></script>
	<!--Page-related Scripts-->
	<?php
	if(isset($pageJavascript)){
		foreach($pageJavascript as &$script){
			echo "<script type=\"text/javascript\" src=\"", $script , "\"></script>\n";
		}
	}
	?>
	<script type="text/javascript" src="../library/js/admin.js"></script>
	<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	<script>
	          tinymce.init({
	              selector: "textarea",
	              plugins: [
	                  "advlist autolink lists link image charmap print preview anchor",
	                  "searchreplace visualblocks code fullscreen",
	                  "insertdatetime media table contextmenu paste"
	              ],
	              image_class_list: [
			        {title: 'responsive', value: 'img-responsive-custom'},
			        {title: 'fixed size', value: 'fixed-dimension'}
			    	],
	              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	          });
	</script>
	</body>
</html>