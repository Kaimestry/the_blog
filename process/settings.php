<?php
// --- Database Configuration ---
$host   = "localhost";     // Database host
$user   = "root";          // Database username
$pwd    = "";              // Database password
$sql_db = "the_blog_db"; // Database name

// --- Create Connection ---
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

?>