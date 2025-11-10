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
        </div>
        
        <div class="footer">
            Deployed with ❤️ using Argo CD
        </div>
    </div>
</body>
</html>

