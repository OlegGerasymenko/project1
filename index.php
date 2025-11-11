<?php
// Handle form submission
$message = '';
$messageType = '';
$dataFile = '/data/test.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['content'])) {
    $content = trim($_POST['content']);
    if (!empty($content)) {
        $timestamp = date('Y-m-d H:i:s');
        $entry = "[$timestamp] " . htmlspecialchars($content) . "\n";

        if (file_put_contents($dataFile, $entry, FILE_APPEND | LOCK_EX)) {
            $message = 'Entry saved successfully!';
            $messageType = 'success';
        } else {
            $message = 'Error saving entry!';
            $messageType = 'error';
        }
    } else {
        $message = 'Please enter some content!';
        $messageType = 'error';
    }
}

// Read current content
$currentContent = '';
if (file_exists($dataFile) && is_readable($dataFile)) {
    $currentContent = file_get_contents($dataFile);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP App - Deployed with Argo CD</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #667eea;
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        .logo {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .info-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: left;
        }

        .info-box h3 {
            color: #764ba2;
            margin-bottom: 10px;
        }

        .info-item {
            padding: 8px 0;
            border-bottom: 1px solid #dee2e6;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .label {
            font-weight: bold;
            color: #495057;
        }

        .value {
            color: #6c757d;
        }

        .footer {
            margin-top: 20px;
            color: #6c757d;
            font-size: 0.9em;
        }

        .form-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: left;
        }

        .form-box h3 {
            color: #764ba2;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #495057;
        }

        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            font-family: inherit;
            font-size: 14px;
            resize: vertical;
        }

        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
        }

        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: transform 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .alert {
            padding: 12px 20px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .content-display {
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            max-height: 200px;
            overflow-y: auto;
            font-family: 'Courier New', monospace;
            font-size: 13px;
            white-space: pre-wrap;
            word-wrap: break-word;
        }

        .content-display:empty:before {
            content: 'No entries yet...';
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">🚀</div>
        <h1>Welcome to PHP App!</h1>
        <p style="color: #6c757d; margin-bottom: 30px;">
            Successfully deployed with Argo CD on Kubernetes
        </p>

        <div class="info-box">
            <h3>Server Information</h3>
            <div class="info-item">
                <span class="label">Hostname:</span>
                <span class="value">
                    <?php echo gethostname(); ?>
                </span>
            </div>
            <div class="info-item">
                <span class="label">PHP Version:</span>
                <span class="value">
                    <?php echo phpversion(); ?>
                </span>
            </div>
            <div class="info-item">
                <span class="label">Server Time:</span>
                <span class="value">
                    <?php echo date('Y-m-d H:i:s'); ?>
                </span>
            </div>
            <div class="info-item">
                <span class="label">Server IP:</span>
                <span class="value">
                    <?php echo $_SERVER['SERVER_ADDR'] ?? 'N/A'; ?>
                </span>
            </div>
        </div>

        <div class="info-box">
            <h3>Deployment Stack</h3>
            <div class="info-item">
                <span class="label">Container:</span>
                <span class="value">Docker + PHP Apache</span>
            </div>
            <div class="info-item">
                <span class="label">Orchestration:</span>
                <span class="value">Kubernetes (Minikube)</span>
            </div>
            <div class="info-item">
                <span class="label">CD Tool:</span>
                <span class="value">Argo CD</span>
            </div>
            <div class="info-item">
                <span class="label">Persistent Storage:</span>
                <span class="value">100MB PVC</span>
            </div>
        </div>

        <div class="form-box">
            <h3>📝 Write to Persistent Storage</h3>
            <?php if ($message): ?>
            <div class="alert alert-<?php echo $messageType; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="content">Enter your message:</label>
                    <textarea
                        id="content"
                        name="content"
                        rows="3"
                        placeholder="Type your message here..."
                        required
                    ></textarea>
                </div>
                <button type="submit" class="btn">💾 Save to File</button>
            </form>
        </div>

        <div class="form-box">
            <h3>📄 Stored Content (test.txt)</h3>
            <div class="content-display"><?php
                echo htmlspecialchars($currentContent);
            ?></div>
        </div>

        <div class="footer">
            Deployed using Argo CD
        </div>
    </div>
</body>
</html>

