<?php
	session_start();
	
	if (!isset($_SESSION["user"])){
		header("location:new_post.php");
		exit();
	}
?>


<!DOCTYPE html>
<!--
Project Name: Cougar Rescue Forum
Course: CIS444
Description: This file is the html for the new post/reply page.
			 The course and topic are prefilled according to the post or
			 subforum that the user has clicked either "new post" or "reply" from.
-->
<html lang="en" class="hidden-subforum">

<head>
    <title>Cougar Rescue Forum</title>
    <meta charset="utf-8" />
    <link rel="icon" href="images/cr_logo.png" type="image/x-icon" />
    <script type="text/javascript" src="nav.js"></script>
    <link rel="stylesheet" href="cougar_rescue.css" />

    <script type="text/javascript" src="new_post.js"></script>
</head>

<body id="new-post" class="pagestyle" onload="checkForum();" >
    
    <div id="navlist" class="navlist">
        <div>
            <img class="logo" src="images/cr_logo_plain.png" alt="Cougar Rescue Forum Logo" />
        </div>

        <button class="logoutNav" onclick="logout();">Logout</button>
        <a href="search.html">Search</a>
		<a href="view_profile.html">Profile</a>
		<a href="main.html">Home</a>

    </div>
        
    <div id="nPost" class="nPost">
		<form id="new-post-form" onsubmit="return submission(this);">
			<div class="create"><h1 class="postheader">Create New Post/Reply</h1></div>
			<hr class="break">

			
			<div class="table">
				<div  class="class floatleft">Class:</div>
				<div id="course-name"  class="classes floatleft">
					
				</div>
			</div>
			
			<div class="table">

				<div  class="topic floatleft">Topic: </div>
				<div id="course-forum" class="topics floatleft">

				</div>
			</div>
				
			<br />
			<br />
			<div class="table">
				<div class="title floatleft">Title:</div>
				<div class="titleText floatleft">
					<input aria-label="user enters their title" type="text" name="TextTitle" placeholder="Title" id="TextTitle" required />
				</div>
			</div>
			<br />
			<br />
		 
			<div class="table">
				<div class="text floatleft">Description:</div>
				<div class="userText floatleft">
					<textarea  aria-label="user types their post/reply here" rows="8" cols="80" name="UsersText" 
					placeholder="Type your post or reply here..." id="UsersText" class="postdescription"  required ></textarea>
				</div>
			</div>
			<input aria-label="submit button" value="Submit" class="submit adminlogin" type="submit" name="sbutton" 
			id="subButton"/>
		</form>
	</div>


<?php
	$db = mysqli_connect("localhost", "root", "", "cis444");
			
	//$db = mysqli_connect("db", "group3", "g5tw9ShSexHH", "group3");
	if (mysqli_connect_errno()) 
	{
		print "Connect failed: " . mysqli_connect_error();
		exit();
	}


	if (isset($_Post['sbuttton']))
	{
		$title = $_Post['TextTitle'];

		$description = $_Post['UsersText'];

		//when the subforum URL is 0 then it is a new post with no replies  //DONT THINK THIS IS CORRECT
		if(subforum == "0")
		{
			//Create query
			$query1 = "INSERT INTO Posts (subforumPos, coursePos, $_POST["title"], $_POST["content"], postDate, postStatus, $_SESSION["user"]);";

			"INSERT VALUES INTO Posts ($subforumPos, $coursePos, $_GET["title"], $_GET["content"], NOW(), NULL, $_SEESSION["user"]);";
		}

		//Create query
		$query2 = "INSERT INTO Replies (postID, subforumPos, coursePos, $_POST["replyTitle"], $_POST["replyContent"], replyTime, replyStatus, $_SESSION["user"]);";

		"INSERT VALUES INOT Replies ($postID, $subforumPos, $coursePos, $_GET["replyTitle"], $_GET["replyContent"], NOW(), NULL, $_SESSION["user"];";

		//Execute queries
		$result = mysqli_query($db, $query1);

		$result = mysqli_query($db, $query2);

		if (!$result) {
					print '<script type="text/javascript"> alert("Error: the query could not be executed."' . mysqli_error() . ');</script>';
					exit();
				}

	}
	mysqli_close($db);

?>
<?php endif; ?>




</body>
</html>