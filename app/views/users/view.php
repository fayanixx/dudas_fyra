<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Users</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
      *{box-sizing:border-box;margin:0;padding:0}
      body{margin:0;font-family:'Segoe UI',Roboto,Helvetica,sans-serif;color:#1f2937;background:linear-gradient(135deg,#eef2ff,#e0e7ff,#f8fafc);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:30px}
      .bg-decor{position:fixed;inset:0;z-index:-1;pointer-events:none;background:radial-gradient(600px 600px at 0% 0%,rgba(99,102,241,.12),transparent 60%),radial-gradient(600px 600px at 100% 0%,rgba(16,185,129,.12),transparent 60%),radial-gradient(600px 600px at 0% 100%,rgba(59,130,246,.12),transparent 60%),radial-gradient(600px 600px at 100% 100%,rgba(236,72,153,.12),transparent 60%);animation:floatBg 16s ease-in-out infinite alternate}
      .container{width:100%;max-width:1000px}
      .card{background:rgba(255,255,255,.75);backdrop-filter:blur(20px);border-radius:22px;border:1px solid rgba(229,231,235,.5);box-shadow:0 12px 40px rgba(0,0,0,.08);overflow:hidden;transform:translateY(20px);opacity:0;animation:cardIn .9s ease-out forwards}
      .card-header{display:flex;align-items:center;justify-content:space-between;padding:20px 28px;border-bottom:1px solid #e5e7eb;background:linear-gradient(to right,#f9fafb,#f3f4f6)}
      .title{margin:0;font-size:26px;font-weight:700;letter-spacing:.3px;color:#111827;display:flex;align-items:center;gap:10px}
      .actions{display:flex;gap:12px}
      .table-wrapper{overflow-x:auto;animation:fadeIn .7s ease .3s both}
      table{border-collapse:separate;border-spacing:0;width:100%;border-radius:16px;overflow:hidden}
      th,td{padding:16px 18px;text-align:left;font-size:15px}
      th{text-align:center;background:linear-gradient(135deg,#6366f1,#4338ca);color:#fff;font-weight:600}
      tr:nth-child(even) td{background:#f9fafb}
      tr:nth-child(odd) td{background:#fff}
      tr{transition:all .2s ease}
      tr:hover td{background:#eef2ff;transform:scale(1.01)}
      .btn{display:inline-flex;align-items:center;gap:6px;padding:10px 16px;text-decoration:none;border-radius:12px;border:1px solid transparent;font-size:14px;font-weight:500;box-shadow:0 2px 6px rgba(0,0,0,.05);transition:all .25s ease}
      .btn i{font-size:14px}
      .btn:active{transform:scale(.95)}
      .btn-primary{background:linear-gradient(135deg,#3b82f6,#2563eb);color:#fff}
      .btn-primary:hover{background:linear-gradient(135deg,#2563eb,#1d4ed8);box-shadow:0 4px 12px rgba(59,130,246,.3)}
      .btn-edit{background:linear-gradient(135deg,#10b981,#059669);color:#fff}
      .btn-edit:hover{background:linear-gradient(135deg,#059669,#047857);box-shadow:0 4px 12px rgba(16,185,129,.25)}
      .btn-delete{background:linear-gradient(135deg,#ef4444,#dc2626);color:#fff}
      .btn-delete:hover{background:linear-gradient(135deg,#dc2626,#b91c1c);box-shadow:0 4px 12px rgba(239,68,68,.25)}
      .empty{padding:30px;text-align:center;color:#6b7280;font-style:italic;background:#fff}
      td:last-child{display:flex;justify-content:center;gap:10px}
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
        <h1 class="title"><i class="fa-solid fa-users"></i> List of Users</h1>
        <div class="actions">
          <a href="<?= site_url('users/create') ?>" class="btn btn-primary">
            <i class="fa-solid fa-user-plus"></i> Create User
          </a>
        </div>
      </div>
      <div class="table-wrapper">
        <table>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
          <?php if (!empty($users)): ?>
            <?php foreach($users as $user): ?>
            <tr>
              <td><?= $user['id'] ?></td>
              <td><?= $user['username'] ?></td>
              <td><?= $user['email'] ?></td>
              <td>
                <a href="<?= site_url('users/update/' . $user['id']) ?>" class="btn btn-edit">
                  <i class="fa-solid fa-pen"></i> Update
                </a>
                <a href="<?= site_url('users/delete/' . $user['id']) ?>" 
                   class="btn btn-delete" 
                   onclick="return confirm('Are you sure you want to delete this user?')">
                   <i class="fa-solid fa-trash"></i> Delete
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="4" class="empty"><i class="fa-regular fa-circle-xmark"></i> No users found.</td>
            </tr>
          <?php endif; ?>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
