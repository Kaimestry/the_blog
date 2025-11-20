<!-- check_login() - Check if user is login, if not redirect to another page -->

<!-- Get all userdata -->
 <?php
function getUserData($conn) {
    if (!isset($_SESSION['username'])) return null;

    $username = mysqli_real_escape_string($conn, $_SESSION['username']);
    $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } 
    return null;
}
 ?>