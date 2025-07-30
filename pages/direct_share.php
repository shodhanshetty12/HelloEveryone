<?php
// No login required, so no session check here.

require_once '../config/database.php'; // Just DB connection to save tokens

function generateRandomToken($length = 12) {
    return bin2hex(random_bytes($length/2));
}

$message = '';
$downloadUrl = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {

    $uploadDir = '../uploads/';

    // Ensure upload dir exists
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

    $originalName = $_FILES['file']['name'];
    $tmpPath = $_FILES['file']['tmp_name'];

    // Generate a unique stored filename to avoid conflicts
    $storedName = uniqid('', true) . '_' . basename($originalName);

    $destination = $uploadDir . $storedName;

    if (move_uploaded_file($tmpPath, $destination)) {
        $token = generateRandomToken();

        // Make sure token is unique, regenerate if needed
        $stmt = $pdo->prepare("SELECT id FROM shared_files WHERE token = ?");
        while ($stmt->execute([$token]) && $stmt->fetch()) {
            $token = generateRandomToken();
        }

        $insert = $pdo->prepare("INSERT INTO shared_files (original_filename, stored_filename, token) VALUES (?, ?, ?)");
        if ($insert->execute([$originalName, $storedName, $token])) {
            $downloadUrl = "http://localhost/HelloEveryone/download.php?token=" . $token;
        } else {
            $message = "Failed to save uploaded file info.";
        }
    } else {
        $message = "Failed to move uploaded file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>Direct File Share - HelloEveryone</title>
<style>
  body { font-family: Arial, sans-serif; max-width: 600px; margin: 3rem auto; }
  .card { box-shadow: 0 2px 8px rgba(0,0,0,0.15); padding: 1.5rem; border-radius: 10px; }
  input[type="file"], button { padding: 0.5rem; margin-top: 1rem; }
  .success-link { margin-top: 1rem; padding: 1rem; background: #dff0d8; border: 1px solid #d6e9c6; border-radius: 8px; }
</style>
</head>
<body>
  <div class="card">
    <h2>Direct Share - Upload and Get Shareable Link</h2>

    <?php if ($message): ?>
      <div style="color: red;"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <?php if ($downloadUrl): ?>
      <div class="success-link">
        Your file is uploaded successfully!<br/>
        Share or bookmark this direct download link:<br/>
        <a href="<?php echo $downloadUrl; ?>"><?php echo $downloadUrl; ?></a>
      </div>
    <?php else: ?>
      <form method="post" enctype="multipart/form-data">
        <label>Select a file to upload:</label><br/>
        <input type="file" name="file" required/><br/>
        <button type="submit">Upload & Get Link</button>
      </form>
    <?php endif; ?>
  </div>
</body>
</html>
