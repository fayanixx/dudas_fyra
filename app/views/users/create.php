<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create User</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
 <style>
      *{box-sizing:border-box}
      body{margin:0;font-family:'Segoe UI',Roboto,Helvetica,sans-serif;color:#1f2937;background:linear-gradient(160deg,#f8fafc,#eef2ff);min-height:100vh;padding:40px 16px}
      .bg-decor{position:fixed;inset:0;z-index:-1;pointer-events:none;background:radial-gradient(600px 600px at 0% 0%,rgba(99,102,241,.14),transparent 60%),radial-gradient(600px 600px at 100% 0%,rgba(16,185,129,.12),transparent 60%),radial-gradient(600px 600px at 0% 100%,rgba(59,130,246,.12),transparent 60%),radial-gradient(600px 600px at 100% 100%,rgba(236,72,153,.12),transparent 60%);animation:floatBg 16s ease-in-out infinite alternate}
      .container{max-width:720px;margin:0 auto}
      .card{background:#fff;border:1px solid #e5e7eb;border-radius:14px;box-shadow:0 10px 30px rgba(2,6,23,.06);overflow:hidden;transform:translateY(8px);opacity:0;animation:cardIn .6s ease-out forwards}
      .card-header{padding:16px 20px;border-bottom:1px solid #f1f5f9}
      .title{margin:0;font-size:20px;display:flex;align-items:center;gap:8px;font-weight:600}
      .card-body{padding:20px;animation:fadeIn .6s ease .15s both}
      .form-group{margin-bottom:16px}
      label{display:block;margin-bottom:6px;font-weight:600;color:#334155}
      input[type=text],input[type=email]{width:100%;max-width:420px;padding:10px 12px;border:1px solid #e5e7eb;border-radius:8px;font-size:15px;transition:border .2s ease,box-shadow .2s ease}
      input:focus{border-color:#3b82f6;outline:none;box-shadow:0 0 0 3px rgba(59,130,246,.2)}
      .actions{display:flex;gap:8px;margin-top:12px}
      .btn{display:inline-flex;align-items:center;gap:6px;padding:10px 14px;text-decoration:none;border-radius:10px;border:1px solid transparent;font-size:14px;font-weight:500;box-shadow:0 1px 2px rgba(0,0,0,.06);transition:all .2s ease;cursor:pointer}
      .btn i{font-size:14px}
      .btn:active{transform:scale(.96)}
      .btn-primary{background-color:#10b981;color:#fff}
      .btn-primary:hover{background-color:#059669}
      .btn-secondary{background-color:#64748b;color:#fff}
      .btn-secondary:hover{background-color:#475569}
      @keyframes cardIn{to{transform:translateY(0);opacity:1}}
      @keyframes fadeIn{from{opacity:0}to{opacity:1}}
      @keyframes floatBg{0%{background-position:0% 0%,100% 0%,0% 100%,100% 100%}100%{background-position:10% 5%,90% 10%,5% 90%,95% 95%}}
</style>

</head>
<body>
  <div class="bg-decor"></div>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h1 class="title"><i class="fa-solid fa-user-plus"></i> Create User</h1>
      </div>
      <div class="card-body">
        <form action="<?= site_url('users/create') ?>" method="POST">
          <div class="form-group">
            <label for="username"><i class="fa-solid fa-user"></i> Username</label>
            <input type="text" name="username" id="username" required>
          </div>
          <div class="form-group">
            <label for="email"><i class="fa-solid fa-envelope"></i> Email</label>
            <input type="email" name="email" id="email" required>
          </div>
          <div class="actions">
            <button type="submit" class="btn btn-primary">
              <i class="fa-solid fa-check"></i> Create
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
