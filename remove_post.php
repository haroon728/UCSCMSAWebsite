<?php
				//print all announcements
				$id = $_POST['pid'];  
				$servername = "localhost";
				$username = "ucscmsaWebsite";
				$password = "foo";
				$dbname = "announcements";

				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				$query = "DELETE FROM ann_posts WHERE p_id=$id"; 
				$response = @mysqli_query($conn, $query); 
?>