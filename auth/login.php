<?php
require_once '../config/config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Basic validation
    if (empty($email) || empty($password)) {
        $message = "Please fill all fields.";
    } else {
        $stmt = $pdo->prepare("SELECT id, username, password, role, status FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && $user['status'] === 'active' && password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['login_time'] = time();

            // Redirect based on role (customize target page as needed)
            header("Location: ../pages/dashboard.php");
            exit;
        } else {
            $message = "Invalid credentials or inactive account.";
        }
    }
}
?>

<?php include '../includes/header.php'; ?>
<div class="card" style="max-width:400px;margin:auto">
    <h2>Login</h2>
    <?php if ($message): ?>
        <div style="color:red;"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="post" action="">
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
</div>
<?php include '../includes/footer.php'; ?>
