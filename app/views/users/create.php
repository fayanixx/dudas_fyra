<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create User</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
 <style>
      /* New color theme: black, gray, navy blue, light gray */
      *{box-sizing:border-box}
      body{
        margin:0;
        font-family:'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        color: #E2E8F0; /* Light gray text */
        background: linear-gradient(135deg, #171A21, #2C3E50); /* Dark gray to navy gradient */
        min-height:100vh;
        padding:40px 16px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
      .bg-decor{position:fixed;inset:0;z-index:-1;pointer-events:none;background:radial-gradient(600px 600px at 0% 0%,rgba(44, 82, 128, .2),transparent 60%),radial-gradient(600px 600px at 100% 0%,rgba(160, 174, 192, .1),transparent 60%),radial-gradient(600px 600px at 0% 100%,rgba(44, 82, 128, .2),transparent 60%),radial-gradient(600px 600px at 100% 100%,rgba(160, 174, 192, .1),transparent 60%);animation:floatBg 16s ease-in-out infinite alternate}
      .container{max-width:720px;width:100%;margin:0 auto}
      .card{
        background: rgba(26, 32, 44, 0.8); /* Semi-transparent black */
        backdrop-filter: blur(20px) saturate(150%);
        border:1px solid rgba(160, 174, 192, 0.4); /* Light gray border */
        border-radius:14px;
        box-shadow:0 10px 30px rgba(0,0,0,.2);
        overflow:hidden;
        transform:translateY(8px);
        opacity:0;
        animation:cardIn .6s ease-out forwards;
    }
      .card-header{
        padding:16px 20px;
        border-bottom:1px solid rgba(0,0,0,0.2);
        background: linear-gradient(170deg, #2C5282, #1A202C); /* Navy blue to dark gray gradient */
        color: white;
    }
      .title{margin:0;font-size:20px;display:flex;align-items:center;gap:8px;font-weight:600}
      .card-body{padding:20px;animation:fadeIn .6s ease .15s both}
      .form-group{margin-bottom:16px}
      label{display:block;margin-bottom:6px;font-weight:600;color:#A0AEC0}
      input[type=text],input[type=email]{
        width:100%;
        max-width:420px;
        padding:10px 12px;
        background-color: #2D3748; /* Dark gray */
        color: #E2E8F0; /* Light gray text */
        border:1px solid #4A5568; /* Gray border */
        border-radius:8px;
        font-size:15px;
        transition:border .2s ease,box-shadow .2s ease
    }
      input:focus{
        border-color:#2B6CB0; /* Navy blue */
        outline:none;
        box-shadow:0 0 0 3px rgba(43, 108, 176, 0.2);
    }
      .actions{display:flex;gap:8px;margin-top:12px}
      .btn{
        display:inline-flex;
        align-items:center;
        gap:6px;
        padding:10px 14px;
        text-decoration:none;
        border-radius:10px;
        border:1px solid transparent;
        font-size:14px;
        font-weight:500;
        box-shadow:0 1px 2px rgba(0,0,0,.06);
        transition:all .2s ease;
        cursor:pointer;
    }
      .btn i{font-size:14px}
      .btn:active{transform:scale(.96)}
      .btn-primary{
        background: linear-gradient(135deg, #2C5282, #2B6CB0);
        color:#E2E8F0;
        box-shadow: 0 4px 12px rgba(44, 82, 128, 0.4);
    }
      .btn-primary:hover{
        background: linear-gradient(135deg, #2B6CB0, #2C5282);
        box-shadow: 0 6px 18px rgba(44, 82, 128, 0.6);
    }
      .btn-secondary{
        background-color:#4A5568; /* Dark gray */
        color:#E2E8F0; /* Light gray */
    }
      .btn-secondary:hover{background-color:#2D3748} /* Slightly darker gray */
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
