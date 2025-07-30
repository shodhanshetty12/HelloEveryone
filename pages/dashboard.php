<?php
require_once '../config/config.php';

// Check if the user is logged in; if not, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}
?>

<?php include '../includes/header.php'; ?>
<div class="card" style="max-width:600px;margin:auto;">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>This is your dashboard. You are logged in as <b><?php echo htmlspecialchars($_SESSION['role']); ?></b>.</p>

    <ul>
        <li><a href="filecenter.php">File Center</a> (send/receive files)</li>
        <li><a href="../auth/logout.php" style="color:red;">Logout</a></li>
    </ul>
</div>
<?php include '../includes/footer.php'; ?>
