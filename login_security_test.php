<?php
// Start session
session_start();
// Function to validate user login
$host = "localhost";
$user = "root";
$password = "";
$database = "stud";
$port = 3307;

$conn = mysqli_connect($host, $user, $password, $database, $port);
function validate_login($username, $password)
{
    global $conn;
    // Hash the password    
    // $hashed_password = md5($password);

    // Query to fetch user details
    $sql = "SELECT * FROM `login` WHERE `username` = '$username'";
    $query = $conn->query($sql);
    $rows = $query->fetch_assoc();

    if (!empty($query->num_rows)) {
        if ($rows['user_attempts'] >= 3 && $password !== $rows['password']) {
            // User has exceeded the maximum number of login attempts
            ?>
            <script>alert("3 failed attempts timer must start now!")</script>
            <?php
            return false;
        }

        if ($password === $rows['password'] && !empty($rows['password'])) {
            // Login successful
            $_SESSION['username'] = $username;

            // Reset login attempts
            $sql = "UPDATE `login` SET `user_attempts`= 0 WHERE username = '$username'";
            $conn->query($sql);

            return true;
        } else {
            // Increment login attempts
            $new_attempts = $rows['user_attempts'] + 1;
            $sql = "UPDATE `login` SET `user_attempts`= $new_attempts WHERE username = '$username'";
            $conn->query($sql);
            return false;
        }
    } else {
        // Login failed
        return false;
    }
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (validate_login($username, $password)) {
        // Redirect to the home page or any other authenticated page
        ?>
        <script>alert("Login Success!")</script>
<?php
    } else {
        // Invalid login credentials or exceeded login attempts
        echo "Invalid username or password";
    }
}
?>

<!-- HTML form for login -->
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>