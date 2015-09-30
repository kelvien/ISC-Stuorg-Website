<div id="landing_part" class="col-xs-12 col-sm-6 news_part"
	data-0="background-position: 0px 0px;"
    data-top-bottom="background-position: 0px -300px;"
    data-anchor-target="#first">
	<div id="own_nav">
		<a href="."><img id="landing_logo" src="media_dev/new-logo_white.png"/></a>
		<ul class="soc_med">
		<li><a target="_blank" href="https://www.facebook.com/iaisc"><span class="fa fa-facebook"></span></a></li>
		<li><a target="_blank" href="https://twitter.com/isc_iowastateu"><span class="fa fa-twitter"></span></a></li>
		<li><a target="_blank" href="http://instagram.com/iscofisu"><span class="fa fa-instagram"></span></a></li>
		<li><a target="_blank" href="https://www.youtube.com/channel/UCxs6wGkB_z-FmBHU3eQw01A"><span class="fa fa-youtube"></span></a></li>
		</ul>
		<ul class="custom_menu">
			<li class="active">Blog</li>
			<li><a href="javascript:void(0)" id="about_us_button">About Us</a></li>
			<li><a href="./contacts">Contact Us</a></li>
		</ul>
	</div>
	<div class="row">
	<div class="text-center" id="landing_title"
	data-0="opacity: 1; top:30%;"
    data-300="opacity: 0; top: 50%;"
    data-anchor-target="#first">
		<h3>INTERNATIONAL STUDENT COUNCIL</h3>
		<h3>OF</h3>
		<h2 style="color:white;">IOWA STATE UNIVERSITY</h2>
		<button class="btn btn-default" id="explore-button">What is ISC ?</button>
	</div>
	</div>
	<img id="earth" src="media/etc/earth.png"
	data-0="top: 75%; transform: scale(1);"
    data-top-center="top: 140%; transform: scale(5);"/>
</div>
<?php
try {	
		echo '<div id="posts_part" class="col-xs-12 col-sm-6">';
		/*$stmtHighlight = $db->query('SELECT 2015_posts.id, 2015_posts.slug, 2015_posts.title, 2015_posts.description, 2015_posts.date, 2015_users.name FROM 2015_posts, 2015_users where 2015_posts.userId = 2015_users.id and 2015_posts.archived = false and 2015_posts.isHighlighted = true ORDER BY 2015_posts.id DESC');
		if($stmtHighlight->rowCount() > 0){
			echo '<div class="bs-callout bs-callout-info">
			    <h4><span class="fa fa-bookmark"></span> Must Read</h4>
			    <p>Sometimes emphasis classes cannot be applied due to the specificity of another selector. In most cases, a sufficient workaround is to wrap your text in a <code>&lt;span&gt;</code> with the class.</p>
			  </div>';
		}*/

		$stmt = $db->query('SELECT 2015_posts.id, 2015_posts.slug, 2015_posts.title, 2015_posts.description, 2015_posts.isHighlighted, 2015_posts.date, 2015_posts.type, 2015_users.name FROM 2015_posts, 2015_users where 2015_posts.userId = 2015_users.id and 2015_posts.archived = false ORDER BY 2015_posts.isHighlighted DESC, 2015_posts.id DESC');
		if($stmt->rowCount()==0){
			echo '<div class="row">';
				echo '<h2 class="text-center" style="width:99%; position: absolute; top: 5%">There is no post in the blog to be shown at the moment</h2>';
			echo '</div>';
		}
		else{
			echo '<ul class="nav nav-tabs" role="tablist" style="visibility: visible;">
            <li class="active">
              <a href="javascript:" onclick="newsShowAll();" role="tab" data-toggle="tab">
                <i class="fa fa-list"></i>
                All
              </a>
            </li>
            <li class="">
              <a href="javascript:" onclick="newsShowEvents();" role="tab" data-toggle="tab">
                <i class="fa fa-calendar"></i>
                Events
              </a>
            </li>
            <li class="">
              <a href="javascript:" onclick="newsShowFundraising();" role="tab" data-toggle="tab">
                <i class="fa fa-money"></i>
                Fundraising
              </a>
            </li>
            <li class="">
              <a href="javascript:" onclick="newsShowNews();" role="tab" data-toggle="tab">
                <i class="fa fa-newspaper-o"></i>
                News
              </a>
            </li>
          </ul>';
			while($row = $stmt->fetch()){
				/*echo '<div class="post_isc_custom2015">';
					echo '<h1><a class="post_title" href="'.$row['slug'].'">'.$row['title'].'</a></h1>';
					echo '<p class="postby">Posted on '.date('jS M Y H:i A', strtotime($row['date'])).' by '.$row['name'].'</p>';
					echo '<div class="postcontent">'.$row['description'].'</div>';				
					echo '<p class="text-right continue-to-read" style="position:absolute; bottom:0px;margin-bottom: 0px; width: 100%;color: black;"><a href="'.$row['slug'].'">READ FULL STORY <span class="fa fa-arrow-right"></span></a></p>';			
				echo '</div>';*/
				$bs_call_class = "";
				$bs_heading = "";
				switch($row['type']){
					case "Event":
					$bs_call_class = "bs-callout-danger";
					$bs_heading = "<h4><b>EVENT</b></h4>";
						break;
					case "News":
					$bs_call_class = "bs-callout-info";
					$bs_heading = "<h4><b>NEWS</b></h4>";
						break;
					case "Fundraising":
					$bs_call_class = "bs-callout-warning";
					$bs_heading = "<h4><b>FUNDRAISING</b></h4>";
						break;
					default:
						break;
				}
				echo '<div class="bs-callout '.$bs_call_class.'">';
				if($row['isHighlighted'] == true){
					echo "<div class='bookmark'></div>";
				}
					echo '<p class="postby">Posted on '.date('jS M Y H:i A', strtotime($row['date'])).' by '.$row['name'].'</p>';
					echo $bs_heading;
					echo "<h1><b><a href='".$row['slug']."'>".$row['title']."</a></b></h1>";
					echo '<p><a href="'.$row['slug'].'">Read full story  <span class="fa fa-arrow-right"></span></a></p>';
				echo '</div>';
			}
		}
		echo '</div>';
	} catch(PDOException $e) {
	    echo $e->getMessage();
	}
?>
<!--ABOUT ISC-->
<div id="about_us">
<div id="second">
	<div class="container-fluid">
	<div class="row">
			<div id="what_is_isc" class="col-xs-12 text-center">
				<h1 class="arrow">What is International Student Council?</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-4 text-center" id="communicate">
			<img class="img-circle" src="media/etc/communicate_about-reduced.png">
			<h3>COMMUNICATE</b></h3>
			<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2">
			<p>We reach out to all domestic and international students to give Iowa State University a diversified community.</p>
			</div>
			</div>
			</div>
			<div class="col-xs-12 col-sm-4 text-center" id="collaborate">
			<img class="img-circle" src="media/etc/collaborate_about-reduced.png">
			<h3>COLLABORATE</h3>
			<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2">
			<p>We collaborate with multitude of student, university organization and department that has unilateral goal and mission. </p>
			</div>
			</div>
			</div>
			<div class="col-xs-12 col-sm-4 text-center" id="celebrate">
			<img class="img-circle" src="media/etc/celebrate_about-reduced.png">
			<h3>CELEBRATE</h3>
			<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2">
			<p>We celebrate the diversity in Iowa State University by organizing events and fundraising events.</p>
			</div>
			</div>
			</div>
		</div>
	</div>
</div>
<div id="first">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 text-center">
				<div style="position: relative;">
					<img src="media/etc/earth.png" id="platform"
					data-bottom-bottom="margin-top: -300px; transform: scale(2);"
					data-center-bottom="margin-top: 140px; transform: scale(4);"
					data-anchor-target="#second"
					/>
					<div id="attractions"
					data-bottom-bottom="opacity: 0;"
					data-center-bottom="opacity: 1;"
					data-anchor-target="#second"
					>
						<div class="attraction" id="eiffel-about">
							<img src="media/etc/eiffel_about.png" />
						</div>
						<div class="attraction" id="brazil-about">
							<img src="media/etc/brazil_about.png" />
						</div>
						<div class="attraction" id="sydney-about">
							<img src="media/etc/sydney_about.png" />
						</div>
						<div class="attraction" id="bigben-about">
							<img src="media/etc/bigben_about.png" />
						</div>
						<div class="attraction" id="colosseum-about">
							<img src="media/etc/colosseum_about.png" />
						</div>
						<div class="attraction" id="aztec-about">
							<img src="media/etc/aztec_about.png" />
						</div>
						<div class="attraction" id="windmill-about">
							<img src="media/etc/windmill_about.png" />
						</div>
						<div class="attraction" id="sf-about">
							<img src="media/etc/sf_about.png" />
						</div>
						<div class="attraction" id="tajmahal-about">
							<img src="media/etc/tajmahal_about.png" />
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<p>
				The objective of the International Student Council is to serve as a <b>platform</b> that ensures and enhances <b>communication</b> and cooperation between the International Community, the ISU community, and the Ames community. To achieve this objective, ISC sponsors coordinated events that showcase the cultures and lifestyles of the International Community, attempts to educate the ISU community and create awareness about humanitarian issues around the world, provides opportunity for exchange of ideas among constituents and represent constituents before the administration of Iowa State University and the City of Ames. ISC also advises its constituents in matters concerning them as members of the ISU community, provide educational and social services to its constituents and <b>collaborate</b> with the ISSO for special programs and/or events.
				Most importantly, this is to <b>celebrate</b> the diversity that the world has been blessed with.
				</p>
			</div>
		</div>
	</div>
</div>
<!--END OF ABOUT ISC-->
<!--TESTIMONY-->
<div id="testimony-section">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<h1 class="arrow">Join us. Here is why you should</h1>
			</div>
		</div>
	</div>
	<div class="flexslider" id="testimony-slider">
		<div class="container-fluid">
			<ul class="slides">
				<?php
				/*<li>
				<div class="row testimony testimony-left" id="adli-testimony">
					<div class="testimony-box col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-6">
					<blockquote>ISC welcomes you to Iowa State</blockquote>
					<small>Watch Adli's full interview below: </small>
					<div id="adli-ytplayer" class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8"></div>
					</div>
				</div>
				</li>
				<li>
				<div class="row testimony testimony-right" id="ras-testimony">
					<div class="testimony-box col-xs-12 col-sm-6">
					<blockquote>ISC is a platform for you to work with different people from different background, culture, and work ethic.</blockquote>
					<small>Watch Ras's full interview below: </small>
					<div id="ras-ytplayer" class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8"></div>
					</div>
				</div>
				</li>
				<li>
				<div class="row testimony testimony-left" id="rashid-testimony">
					<div class="testimony-box col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-6">
					<blockquote>I am visiting every country here at Iowa State through ISC, meeting people all over the world and experiencing their culture.</blockquote>
					<small>Watch Rashid's full interview below: </small>
					<div id="rashid-ytplayer" class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8"></div>
					</div>
				</div>
				</li>
				<li>
				<div class="row testimony testimony-right" id="zenia-testimony">
					<div class="testimony-box col-xs-12 col-sm-6">
					<blockquote>Through ISC I learned teamwork, time management, and leadership skills.</blockquote>
					<small>Watch Zenia's full interview below: </small>
					<div id="zenia-ytplayer" class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8"></div>				
					</div>
				</div>
				</li>
				*/?>
				<li>
				<div class="row testimony testimony-left" id="rose-testimony">
					<div class="testimony-box col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-6">
					<blockquote>I have met some really different people, from different area who have just really affected my values and work ethics.</blockquote>
					<small>Watch Rose's full interview below: </small>
					<div id="rose-ytplayer" class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8"></div>
					</div>
				</div>
				</li>
				<li>
				<div class="row testimony testimony-right" id="steve-testimony">
					<div class="testimony-box col-xs-12 col-sm-6">
					<blockquote>You get a great chance to meet wonderful people and better understanding from all of these people who are having different backgrounds and culture.</blockquote>
					<small>Watch Steve's full interview below: </small>
					<div id="steve-ytplayer" class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8"></div>
					</div>
				</div>
				</li>
				<li>
				<div class="row testimony testimony-left" id="marsilia-testimony">
					<div class="testimony-box col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-6">
					<blockquote>It will be an unforgettable experience for you in Iowa State University</blockquote>
					<small>Watch Marsilia's full interview below: </small>
					<div id="marsilia-ytplayer" class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8"></div>				
					</div>
				</div>
				</li>
				<li>
				<div class="row testimony testimony-right" id="ryan-testimony">
					<div class="testimony-box col-xs-12 col-sm-6">
					<blockquote>ISC is a good place to practice your leadership skill.</blockquote>
					<small>Watch Ryan's full interview below: </small>
					<div id="ryan-ytplayer" class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8"></div>				
					</div>
				</div>
				</li>
			</ul>
		</div>
	</div>
</div>
<!--END OF TESTIMONY-->
<!--CONTACT-->
<?php include("content/contact_forms.php"); ?>
<?php include("footer.php"); ?>	
</div>