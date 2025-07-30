<?php
require_once '../config/config.php';

// Session protection: only allow logged-in users
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}

// Optional: show upload status messages
$status = '';
if (isset($_GET['success'])) $status = "File uploaded successfully!";
if (isset($_GET['fail'])) $status = "File upload failed. Try a different file.";

// List files from uploads directory, skip . and ..
$files = array_diff(scandir('../uploads/'), ['.', '..']);
?>

<?php include '../includes/header.php'; ?>
<div class="card" style="max-width:600px;margin:auto;">
    <h2>File Center</h2>

    <?php if ($status): ?>
        <div style="color:green;font-weight:bold;"><?php echo $status; ?></div>
    <?php endif; ?>

    <!-- Upload Form -->
    <form action="filecenter.php" method="post" enctype="multipart/form-data">
        <input type="file" name="uploadFile" required>
        <button type="submit" name="uploadBtn">Upload</button>
    </form>

    <!-- File List for Download -->
    <h3>Available Files:</h3>
    <ul>
    <?php foreach ($files as $file): ?>
        <li>
            <a href="../uploads/<?php echo urlencode($file); ?>" download><?php echo htmlspecialchars($file); ?></a>
        </li>
    <?php endforeach; ?>
    </ul>

    <p><a href="dashboard.php">Back to Dashboard</a></p>
</div>
<?php include '../includes/footer.php'; ?>

<?php
// Handle file upload after HTML to allow header redirects above
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploadFile'])) {
    $targetDir = '../uploads/';
    $fileName = basename($_FILES['uploadFile']['name']);
    $targetFile = $targetDir . $fileName;

    // Optional: Restrict upload file size or type here

    if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $targetFile)) {
        header('Location: filecenter.php?success=1');
        exit;
    } else {
        header('Location: filecenter.php?fail=1');
        exit;
    }
}
?>
