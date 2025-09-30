<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Account</title>
  
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
        --error-bg: rgba(155, 44, 44, 0.2);
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
      /* DITO ANG PAGBABAGO: Ginawang column para ma-accommodate ang system title */
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 2rem 1rem; 
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

    /* --- GLOBAL SYSTEM TITLE STYLE (DINAGDAG ITO) --- */
    .system-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.7rem; 
        font-weight: 700;
        color: var(--platinum);
        text-shadow: 2px 2px 15px rgba(0,0,0,0.8);
        margin-bottom: 1.5rem;
        text-align: center;
        width: 100%;
        max-width: 420px;
    }
    /* ---------------------------------------------------- */

    .register-card {
      /* Using your card style */
      background: rgba(63,55,53,0.9); 
      border-radius: 2rem;
      backdrop-filter: blur(15px);
      padding: 3rem 2.5rem;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 15px 40px rgba(0,0,0,0.5);
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .register-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 25px 50px rgba(0,0,0,0.6);
    }

    .register-card h2 {
      /* Using your main-title style but smaller */
      font-family: 'Playfair Display', serif;
      font-size: 2.2rem;
      font-weight: 700;
      color: var(--platinum);
      text-shadow: 1px 1px 10px rgba(0,0,0,0.6);
      margin-bottom: 2rem;
      border-bottom: 2px solid var(--jet);
      padding-bottom: 0.5rem;
      /* Dinagdag para sa Icon */
      display: flex; 
      align-items: center;
      justify-content: center;
      gap: 0.7rem;
    }
    .register-card h2 i {
        color: var(--silver);
        font-size: 1.5rem;
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
      /* Dinagdag para sa Icon */
      display: flex; 
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }

    .form-group {
      position: relative;
      margin-bottom: 1.2rem;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 0.8rem 1rem;
      /* DITO ANG PAGBABAGO: Idinagdag ang padding-left para sa input icon */
      padding-left: 3rem; 
      padding-right: 3rem; /* Space for eye icon/dropdown arrow */
      font-size: 1rem;
      border: 1px solid var(--davys-gray);
      border-radius: 1rem;
      background: var(--raisin-black-2);
      color: var(--platinum);
      transition: 0.3s ease;
      box-sizing: border-box;
      /* Remove default appearance for select for better styling */
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
    }

    /* Input Icon Styling (Para sa kaliwang icon) */
    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.1em;
        color: var(--silver);
        pointer-events: none; /* Make icon unclickable */
        z-index: 10;
    }

    .form-group select {
        /* Custom down arrow for select field */
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="%23C7C2BF" d="M7 10l5 5 5-5z"/></svg>');
        background-repeat: no-repeat;
        background-position: right 1rem center;
        padding-right: 2.5rem; /* Adjust padding for custom arrow */
    }

    .form-group input::placeholder {
      color: var(--silver);
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: var(--silver);
      box-shadow: 0 0 10px rgba(199,194,191,0.2);
      outline: none;
      background: var(--jet); /* Darker on focus */
    }

    .form-group select option {
        /* Styling options for dark mode */
        background: var(--jet);
        color: var(--platinum);
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
      z-index: 10; /* Ensure eye icon is above input */
    }
    .toggle-password:hover {
        color: var(--platinum);
    }

    /* Register Button */
    .btn-register {
      /* DITO ANG PAGBABAGO: Idinagdag ang Playfair Display */
      font-family: 'Playfair Display', serif;
      /* END NG PAGBABAGO */
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
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }

    .btn-register:hover {
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
      /* DITO ANG PAGBABAGO: Idinagdag ang Playfair Display font sa link text */
      font-family: 'Playfair Display', serif;
      /* END NG PAGBABAGO */
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

    /* Media Query for responsiveness */
    @media (max-width: 480px) {
        .system-title {
            font-size: 2.2rem;
            margin-bottom: 1rem;
        }
        .register-card {
            padding: 2rem 1.5rem;
            border-radius: 1.5rem;
        }
        .register-card h2 {
            font-size: 1.8rem;
        }
    }
  </style>
</head>
<body style="background: url('<?= base_url() ?>public/background.jpg') no-repeat center center fixed; background-size: cover;">
  
  <h1 class="system-title">User Management System</h1>
  
  <div class="register-card">
    <h2><i class="fa-solid fa-user-plus"></i> Create Account</h2>
    
    <?php if (!empty($error)): ?>
      <div class="error-box-styled">
        <i class="fa-solid fa-triangle-exclamation"></i> <?= $error ?>
      </div>
    <?php endif; ?>
    
    <form method="POST" action="<?= site_url('auth/register'); ?>">
      
      <div class="form-group">
        <i class="fa-solid fa-user input-icon"></i>
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="form-group">
        <i class="fa-solid fa-envelope input-icon"></i>
        <input type="email" name="email" placeholder="Email" required>
      </div>

      <div class="form-group">
        <i class="fa-solid fa-key input-icon"></i>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <div class="form-group">
        <i class="fa-solid fa-lock input-icon"></i>
        <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>

      <div class="form-group">
        <i class="fa-solid fa-user-tag input-icon"></i>
        <select name="role" required class="form-select-styled"> 
          <option value="" disabled selected>Select Role</option> 
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button type="submit" class="btn-register">
        <i class="fa-solid fa-cloud-arrow-up"></i> Register
      </button>
    </form>

    <div class="group-link">
      Already have an account? <a href="<?= site_url('auth/login'); ?>"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login here</a>
    </div>
  </div>
  
  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      if (toggle && input) {
          toggle.addEventListener('click', function () {
            const type = input.type === 'password' ? 'text' : 'password';
            input.type = type;

            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
          });
      }
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>