<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login to System</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

  <style>
    :root {
        --raisin-black: #2D2728ff;
        --van-dyke: #3F3735ff;
        --silver: #C7C2BFff;
        --jet: #383232ff;
        --davys-gray: #5F5957ff;
        --black: #040202ff;
        --smoky-black: #0F0C0Cff;
        --licorice: #1F1A1Aff;
        --raisin-black-2: #282222ff;
        --platinum: #EAE8E5ff;
        --white: #FFFFFFff;
        --error-red: #9B2C2C;
        --error-bg: rgba(155, 44, 44, 0.2); 
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Poppins', sans-serif;
      background: url("<?= base_url() ?>public/background.jpg") no-repeat center center fixed;
      background-size: cover;
      color: var(--silver);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 2rem 1rem;
      position: relative;
    }

    body::before {
      content:'';
      position: fixed;
      inset: 0;
      background: rgba(45,39,40,0.75);
      z-index: -1;
    }

    .system-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.7rem; 
        font-weight: 700;
        color: var(--platinum);
        text-shadow: 2px 2px 15px rgba(0,0,0,0.8);
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .login-card {
      background: rgba(63,55,53,0.9);
      border-radius: 2rem;
      backdrop-filter: blur(15px);
      padding: 3rem 2.5rem;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 15px 40px rgba(0,0,0,0.5);
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .login-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 25px 50px rgba(0,0,0,0.6);
    }

    .login-card h2 {
      font-family: 'Playfair Display', serif;
      font-size: 2.2rem;
      font-weight: 700;
      color: var(--platinum);
      text-shadow: 1px 1px 10px rgba(0,0,0,0.6);
      margin-bottom: 2rem;
      border-bottom: 2px solid var(--jet);
      padding-bottom: 0.5rem;
      display: flex; 
      align-items: center;
      justify-content: center;
      gap: 0.7rem; 
    }

    .login-card h2 i {
        color: var(--silver);
        font-size: 1.5rem;
    }

    .error-box-styled {
      background: var(--error-bg);
      color: var(--error-red);
      padding: 10px;
      border: 1px solid var(--error-red);
      border-radius: 12px;
      margin-bottom: 1.5rem;
      font-size: 0.95em;
      display: flex; 
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }

    .form-group {
      position: relative;
      margin-bottom: 1.2rem;
    }

    .form-group input {
      width: 100%;
      padding: 0.8rem 1rem;
      padding-left: 3rem;
      padding-right: 3rem;
      font-size: 1rem;
      border: 2px solid var(--black);
      border-radius: 1rem;
      background: var(--raisin-black-2);
      color: var(--platinum);
      transition: 0.3s ease;
      box-sizing: border-box;
    }

    .form-group input::placeholder {
      color: var(--silver);
    }

    .form-group input:focus {
      border-color: var(--silver);
      box-shadow: 0 0 10px rgba(199,194,191,0.2);
      outline: none;
      background: var(--jet);
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.1em;
        color: var(--silver);
        pointer-events: none;
    }

    .toggle-password {
      position: absolute;
      right: 1rem;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: var(--silver);
      transition: color 0.2s;
    }
    .toggle-password:hover {
        color: var(--platinum);
    }

    .btn-login {
      font-family: 'Playfair Display', serif;
      width: 100%;
      padding: 0.8rem 1.4rem;
      border: none;
      border-radius: 1.2rem;
      background: var(--black) !important;
      color: var(--white) !important;
      font-size: 1.1rem;
      font-weight: 500;
      cursor: pointer;
      text-decoration: none;
      box-shadow: 0 3px 8px rgba(0,0,0,0.5);
      transition: all 0.25s ease;
      margin-top: 1rem;
      display: inline-flex; 
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }

    .btn-login:hover {
      background: var(--smoky-black) !important;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.6);
    }

    .group-link {
      margin-top: 1.5rem;
      font-size: 0.9em;
      color: var(--silver);
    }

    .group-link a {
      color: var(--platinum);
      font-weight: 500;
      text-decoration: none;
      transition: 0.2s;
      margin-left: 0.3rem;
      font-family: 'Playfair Display', serif;
    }

    .group-link a:hover {
      text-decoration: underline;
      color: var(--silver);
    }

    @media (max-width: 480px) {
        .system-title {
            font-size: 2.2rem;
            margin-bottom: 1rem;
        }
        .login-card {
            padding: 2rem 1.5rem;
            border-radius: 1.5rem;
        }
        .login-card h2 {
            font-size: 1.8rem;
        }
    }
  </style>
</head>
<body style="background: url('<?= base_url() ?>public/background.jpg') no-repeat center center fixed; background-size: cover;">
  
  <h1 class="system-title">User Management System</h1>

  <div class="login-card">
    <h2><i class="fa-solid fa-lock"></i>System Login</h2>

    <?php if (!empty($error)): ?>
      <div class="error-box-styled">
        <i class="fa-solid fa-triangle-exclamation"></i> <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="form-group">
        <i class="fa-solid fa-user input-icon"></i>
        <input type="text" placeholder="Username" name="username" required>
      </div>

      <div class="form-group">
        <i class="fa-solid fa-key input-icon"></i>
        <input type="password" placeholder="Password" name="password" id="password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit" class="btn-login">
        <i class="fa-solid fa-arrow-right-to-bracket"></i> Sign In
      </button>
    </form>

    <div class="group-link">
      Don’t have an account? <a href="<?= site_url('auth/register'); ?>"><i class="fa-solid fa-user-plus"></i> Register here</a>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    if (togglePassword) {
      togglePassword.addEventListener('click', function () {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
  </script>
</body>
</html>