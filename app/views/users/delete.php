<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #1f2937; background: linear-gradient(180deg, #fff1f2, #fee2e2); }
        .bg-decor { position: fixed; inset: 0; z-index: -1; pointer-events: none; background:
            radial-gradient(600px 600px at 0% 0%, rgba(244,63,94,.10), transparent 60%),
            radial-gradient(600px 600px at 100% 0%, rgba(239,68,68,.10), transparent 60%),
            radial-gradient(600px 600px at 0% 100%, rgba(248,113,113,.10), transparent 60%),
            radial-gradient(600px 600px at 100% 100%, rgba(252,165,165,.10), transparent 60%);
            animation: floatBg 16s ease-in-out infinite alternate; }
        .container { max-width: 560px; margin: 80px auto; padding: 0 16px; }
        .card { background: #fff; border: 1px solid #fee2e2; border-radius: 14px; box-shadow: 0 10px 30px rgba(2,6,23,.06); overflow: hidden; transform: translateY(8px); opacity: 0; animation: cardIn .6s ease-out forwards; }
        .card-header { padding: 16px 20px; border-bottom: 1px solid #ffe4e6; }
        h1 { margin: 0; font-size: 22px; color: #ef4444; }
        .card-body { padding: 20px; animation: fadeIn .6s ease .15s both; text-align: center; }
        p { color: #475569; }
        .actions { display: flex; justify-content: center; gap: 10px; margin-top: 12px; }
        .btn { padding: 10px 14px; text-decoration: none; border-radius: 10px; border: 1px solid transparent; font-size: 14px; box-shadow: 0 1px 2px rgba(0,0,0,.06); transition: transform .08s ease, box-shadow .2s ease, background-color .2s ease; }
        .btn:active { transform: translateY(1px); box-shadow: 0 0 0 rgba(0,0,0,0); }
        .btn-confirm { background-color: #ef4444; color: white; }
        .btn-confirm:hover { background-color: #dc2626; }
        .btn-cancel { background-color: #64748b; color: white; }
        .btn-cancel:hover { background-color: #475569; }
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
                <h1>Delete User</h1>
            </div>
            <div class="card-body">
                <p>Are you sure you want to delete <strong><?= $user['username'] ?></strong> (<?= $user['email'] ?>)?</p>
                <form action="<?= site_url('users/delete/' . $user['id']) ?>" method="POST">
                    <div class="actions">
                        <button type="submit" class="btn btn-confirm">Yes, Delete</button>
                        <a href="<?= site_url('users/view') ?>" class="btn btn-cancel">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
