<?php
	session_start();
	
	if (!isset($_SESSION["user"])){
		header("location:login.php");
		exit();
	}
?>

<!DOCTYPE html>
<!--
Project Name: Cougar Rescue Forum
Course: CIS444
Description: This file is the html for the sub forum page.
			
-->

<html lang="en" class="hidden-subforum">
	<head>
		<!--Page Information-->
		<title>Cougar Rescue Forum</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="cougar_rescue.css"/>
		<link rel="icon" href="images/cr_logo.png" type="image/x-icon" />
		<script type="text/javascript" src="subforum.js"></script>
	</head>
	
	<body id="subforum" class="pagestyle">
		<div id="navlist" class="navlist"> 
			<div>
				<img class = "logo"  src="images/cr_logo_plain.png" alt="Cougar Rescue Forum Logo"/>
			</div>	
			<!--Coming back to this-->

			<button class="logoutNav" onclick="logout()">Logout</button> 

			<a href="search.php">Search</a>
			<a href="view_profile.php">Profile</a>
			<a href="main.php">Home</a> 
			
		</div>
        
		
        <div class="subforum-div" id="subforum-div">
		<h1> Welcome to the Cougar Rescue Forum!</h1>
            <div class="table-sub-format">
                <p id="forum-name" class="bolded"></p>
                <div class="new-post-button">
                        <button id="new-post" type="submit" class="submitstyle" onclick="newPost(this.id);">New Post</button>
                </div>
            </div>
			<div class="table-sub-format">
				<div class="item-subforum bolded">Post/Author</div>
				<div class="item-replies bolded">Replies</div>
                <!--<div class="item-views">Views</div>-->
                <div class="item-last-post bolded">Last Post</div>
			</div>

		</div>

		<?php
			$db = mysqli_connect("localhost", "root", "", "cis444");
			//$db = mysqli_connect("db", "group3", "g5tw9ShSexHH", "group3");
			if (mysqli_connect_errno()) {
				print "Connect failed: " . mysqli_connect_error();
				exit();
			}

			//Create query
			$email = $_SESSION["user"];
			$query = 'SELECT CONCAT(u.fname, " ", u.lname) as "Author", p.title,
			p.postID, COUNT(r.replyID) as "Replies" , 
			(SELECT GREATEST(MAX(p.postDate), MAX(r.replyTime))) as "Last Post"
			FROM Posts p, Users u, Replies r 
			WHERE p.userEmail = u.email 
			AND r.postID = p.postID 
			AND p.subType = "'.$_GET["subforum"].'" AND p.crsNumber= "'.$_GET["course"].'"
			
			GROUP BY u.fname, u.lname, p.title;';

			//Execute Query
			$result = mysqli_query($db, $query);

			if (!$result) {
				print '<script type="text/javascript"> alert("Error: the query could not be executed."' . mysqli_error() . ');</script>';
				exit();
			}
			// Encode query results to send to JS
			// Get the number of rows in the result
			//$num_rows = mysqli_num_rows($result);
			//$num_fields = mysqli_num_fields($result);
			$rows = array();
			while($r = mysqli_fetch_assoc($result)) {
				$values = array_values($r);
				$rows[] = $values;
			}
			//print(json_encode($rows));
			print "<script type='text/javascript'>getPosts(" . json_encode($rows) . ");</script>";
			mysqli_close($db);
		?>
			

	</body>
	
</html>