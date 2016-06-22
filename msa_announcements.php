<html> 
	<head> 
	 <link rel="stylesheet" type="text/css" href="msa_announcements.css" />
	</head>
<body>
    <div id = "transition"> 
			<img id = "transition_img"src = "msa_logo.jpg" width = "150px" height = "150px"> 
	</div>
	
	<div id = "menubar"> 
	    <a href = "index.html"><img id = "logo" src = "msa_logo.jpg" height = "75px" width = "75px"></a>
		<ul>
			<li><a href = "msa_events.html"CLASS = "Element" id = "speech"> Events</a></li>
			<li><a href = "msa_board.html"CLASS = "Element"> The Board</a></li>
			<li><a href="msa_announcements.php"CLASS = "Element">Announcements</a></li>
			<li><a href = "msa_prayer_times.html"CLASS = "Element"> Prayer Times</a></li>
			<li><a href= "msa_about_us.html"CLASS = "Element">About Us</a></li>
			<li><a href= "msa_login.html"CLASS = "Element">Login</a></li>
		</ul>

	</div>
	
	<div id = "postbox"> 
		<form action = "http://localhost:1234/ann_post.php" method = "post"> 
		    <div>
			<input type="text" name="post_text">
			</div>
			<div>
			<input type="submit" name="submit">
            </div>			
		</form>
		<p>
			<?php
				//print all announcements
				
				$servername = "localhost";
				$username = "ucscmsaWebsite";
				$password = "foo";
				$dbname = "announcements";

				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				$query = "SELECT * FROM ann_posts ORDER BY post_time DESC"; 
				$response = @mysqli_query($conn, $query); 
				if($response) {
					while($post1 = mysqli_fetch_array($response)) {
						$post_id = $post1['p_id']; 
						echo "post: " . $post1['post_text'] . "<br>" . $post1['post_time'] . "<br>";
						echo "<input type ='button' value = 'remove' name= 'remove' onclick='ajax_rem($post_id)'>";  
						echo "<br>";
					}
				}
				else{
					echo "uh oh"; 
				}
			?>
		</p>
    </div>	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<script type="text/javascript">
	    $(window).load(function() {
		   $("#transition").fadeOut("slow");
		});
	    
		$("ul li:eq(5)").click(function() {
		   $("#welcome").fadeOut({opacity:0.5}, 500, function() {alert("foo");});
		});
		
		function ajax_rem(post_id) {
			$.ajax({
				type: 'POST', 
				url: 'remove_post.php',
				data: {pid: post_id}
			}); 
		}; 
	</script>
</body>
</html>
