<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Base styles */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            color: #374151;
            background: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background-image: radial-gradient(at 0% 0%, hsla(216, 100%, 96%, 0.5) 0, transparent 50%),
                              radial-gradient(at 100% 100%, hsla(270, 100%, 96%, 0.5) 0, transparent 50%);
        }

        .container { width: 100%; max-width: 720px; }
        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 1.5rem;
            border: 1px solid #e5e7eb;
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.08), 0 4px 16px rgba(0, 0, 0, 0.04);
            overflow: hidden;
        }

        /* Card header and actions */
        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #e5e7eb;
            background: #f9fafb;
        }
        .title {
            margin: 0;
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .card-body { padding: 2rem; }

        /* Form elements */
        .form-group { margin-bottom: 1.5rem; }
        label { 
            display: block; 
            margin-bottom: 0.5rem; 
            font-weight: 600; 
            color: #334155; 
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        input[type="text"], input[type="email"] { 
            width: 100%; 
            padding: 0.75rem 1rem; 
            border: 1px solid #e5e7eb; 
            border-radius: 0.75rem; 
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            max-width: 420px;
        }
        input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

        /* Buttons */
        .actions { display: flex; gap: 0.75rem; margin-top: 1rem; }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1rem;
            text-decoration: none;
            border-radius: 0.75rem;
            border: 1px solid transparent;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            cursor: pointer;
        }
        .btn i { font-size: 0.875rem; }
        .btn:active { transform: scale(0.98); }

        .btn-primary {
            background: #4f46e5;
            color: #fff;
            background-image: linear-gradient(to right, #6366f1, #4f46e5);
        }
        .btn-primary:hover {
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
            transform: translateY(-1px);
        }
        .btn-secondary {
            background: #f1f5f9;
            color: #475569;
            border: 1px solid #cbd5e1;
        }
        .btn-secondary:hover {
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            transform: translateY(-1px);
            background: #e2e8f0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="title"><i class="fa-solid fa-pen-to-square"></i> Update User</h1>
            </div>
            <div class="card-body">
                <form action="<?= site_url('users/update/' . $user['id']) ?>" method="POST">
                    <div class="form-group">
                        <label for="username"><i class="fa-solid fa-user"></i> Username</label>
                        <input type="text" name="username" id="username" value="<?= $user['username'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fa-solid fa-envelope"></i> Email</label>
                        <input type="email" name="email" id="email" value="<?= $user['email'] ?>" required>
                    </div>
                    <div class="actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Save Changes
                        </button>
                        <a href="<?= site_url('users/view') ?>" class="btn btn-secondary">
                            <i class="fa-solid fa-xmark"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>