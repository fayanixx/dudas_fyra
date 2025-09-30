<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login to System</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

  <style>
    /* Color Variables from your style */
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
        /* Custom for Alert/Error */
        --error-red: #9B2C2C;
        --error-bg: rgba(155, 44, 44, 0.2); /* Semi-transparent red from delete btn */
    }

    /* Reset & Base */
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Poppins', sans-serif;
      /* Using your background style */
      background: url("<?= base_url() ?>public/background.jpg") no-repeat center center fixed;
      background-size: cover;
      color: var(--silver);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
    }
    /* Dark overlay for background image */
    body::before {
      content:'';
      position: fixed;
      inset: 0;
      background: rgba(45,39,40,0.75);
      z-index: -1;
    }

    .login-card {
      /* Using your card style */
      background: rgba(63,55,53,0.9); /* Slightly more opaque for focus */
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
      /* Using your main-title style but smaller */
      font-family: 'Playfair Display', serif;
      font-size: 2.2rem;
      font-weight: 700;
      color: var(--platinum);
      text-shadow: 1px 1px 10px rgba(0,0,0,0.6);
      margin-bottom: 2rem;
      border-bottom: 2px solid var(--jet);
      padding-bottom: 0.5rem;
    }

    /* Error Box */
    .error-box-styled {
      /* Using your error-box style with darker colors */
      background: var(--error-bg);
      color: var(--error-red);
      padding: 10px;
      border: 1px solid var(--error-red);
      border-radius: 12px;
      margin-bottom: 1.5rem;
      font-size: 0.95em;
    }

    .form-group {
      position: relative;
      margin-bottom: 1.2rem;
    }

    .form-group input {
      width: 100%;
      padding: 0.8rem 1rem;
      padding-right: 3rem; /* Space for eye icon */
      font-size: 1rem;
      border: 1px solid var(--davys-gray);
      border-radius: 1rem; /* Softer radius */
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
      background: var(--jet); /* Darker on focus */
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

    /* Login Button */
    .btn-login {
      /* Adapted from your .btn-add style (dark button) */
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
    }

    .group-link a:hover {
      text-decoration: underline;
      color: var(--silver);
    }
  </style>
</head>
<body>
  <div class="login-card">
    <h2>System Login</h2>

    <?php if (!empty($error)): ?>
      <div class="error-box-styled">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="form-group">
        <input type="text" placeholder="Username" name="username" required>
      </div>

      <div class="form-group">
        <input type="password" placeholder="Password" name="password" id="password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit" class="btn-login">Sign In</button>
    </form>

    <div class="group-link">
      Don’t have an account? <a href="<?= site_url('auth/register'); ?>">Register here</a>
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