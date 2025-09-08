<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #1f2937; background: linear-gradient(160deg, #f8fafc, #eef2ff); }
        .bg-decor { position: fixed; inset: 0; z-index: -1; pointer-events: none; background:
            radial-gradient(600px 600px at 0% 0%, rgba(99,102,241,.14), transparent 60%),
            radial-gradient(600px 600px at 100% 0%, rgba(16,185,129,.12), transparent 60%),
            radial-gradient(600px 600px at 0% 100%, rgba(59,130,246,.12), transparent 60%),
            radial-gradient(600px 600px at 100% 100%, rgba(236,72,153,.12), transparent 60%);
            animation: floatBg 16s ease-in-out infinite alternate; }
        .container { max-width: 720px; margin: 40px auto; padding: 0 16px; }
        .card { background: #fff; border: 1px solid #e5e7eb; border-radius: 14px; box-shadow: 0 10px 30px rgba(2,6,23,.06); overflow: hidden; transform: translateY(8px); opacity: 0; animation: cardIn .6s ease-out forwards; }
        .card-header { padding: 16px 20px; border-bottom: 1px solid #f1f5f9; }
        .title { margin: 0; font-size: 20px; }
        .card-body { padding: 20px; animation: fadeIn .6s ease .15s both; }
        .form-group { margin-bottom: 16px; }
        label { display: block; margin-bottom: 6px; font-weight: 600; color: #334155; }
        input[type="text"], input[type="email"] { width: 100%; max-width: 420px; padding: 10px 12px; border: 1px solid #e5e7eb; border-radius: 8px; }
        .actions { display: flex; gap: 8px; margin-top: 12px; }
        .btn { display: inline-flex; align-items: center; gap: 6px; padding: 10px 14px; text-decoration: none; border-radius: 10px; border: 1px solid transparent; font-size: 14px; box-shadow: 0 1px 2px rgba(0,0,0,.06); transition: transform .08s ease, box-shadow .2s ease, background-color .2s ease; }
        .btn:active { transform: translateY(1px); box-shadow: 0 0 0 rgba(0,0,0,0); }
        .btn-primary { background-color: #10b981; color: white; }
        .btn-primary:hover { background-color: #059669; }
        .btn-secondary { background-color: #64748b; color: white; }
        .btn-secondary:hover { background-color: #475569; }
        @keyframes cardIn { to { transform: translateY(0); opacity: 1; } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes floatBg { 0% { background-position: 0% 0%, 100% 0%, 0% 100%, 100% 100%; } 100% { background-position: 10% 5%, 90% 10%, 5% 90%, 95% 95%; } }
    </style>
</head>
<body>
    <div class="bg-decor"></div>
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
                        <i class="fa-solid fa-floppy-disk"></i> Save
                    </button>
                    <a href="<?= site_url('users/view') ?>" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Back
                    </a>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
