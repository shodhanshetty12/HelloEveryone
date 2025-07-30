<?php
require_once '../config/config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    // Basic validation
    if (empty($username) || empty($email) || empty($password) || empty($confirm)) {
        $message = "Please fill all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } elseif ($password !== $confirm) {
        $message = "Passwords do not match.";
    } else {
        // Check if user/email already exists
        $checkStmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $checkStmt->execute([$username, $email]);
        if ($checkStmt->fetch()) {
            $message = "Username or email already taken.";
        } else {
            // Securely hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            if ($stmt->execute([$username, $email, $hashed_password])) {
                $message = "Registration successful. <a href='login.php'>Login here</a>.";
            } else {
                $message = "Something went wrong. Try again.";
            }
        }
    }
}
?>

<?php include '../includes/header.php'; ?>
<div class="card" style="max-width:400px;margin:auto">
    <h2>Register</h2>
    <?php if ($message): ?>
        <div style="color:red;"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required><br><br>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</div>
<?php include '../includes/footer.php'; ?>
