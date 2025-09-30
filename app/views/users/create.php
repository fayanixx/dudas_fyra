<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create New User</title>
  
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
      /* Using your background style - NOTE: Assuming PHP is properly configured to process base_url() */
      background: url("<?= base_url() ?>public/background.jpg") no-repeat center center fixed;
      background-size: cover;
      color: var(--silver);
      min-height: 100vh;
      display: flex;
      flex-direction: column; /* Ginawang column para ma-accommodate ang system title */
      justify-content: flex-start; /* Inayos ang alignment */
      align-items: center;
      padding: 2rem 0;
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

    /* --- GLOBAL SYSTEM TITLE STYLE (KOPYADO SA DASHBOARD) --- */
    .system-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.7rem; 
        font-weight: 700;
        color: var(--platinum);
        text-shadow: 2px 2px 15px rgba(0,0,0,0.8);
        margin-bottom: 1.5rem;
        text-align: center;
    }
    /* ------------------------------------------------------------------- */

    .form-card {
      /* Using your card style */
      background: rgba(63,55,53,0.9);
      border-radius: 2rem;
      backdrop-filter: blur(15px);
      padding: 3rem 2.5rem;
      width: 100%;
      max-width: 450px;
      box-shadow: 0 15px 40px rgba(0,0,0,0.5);
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      /* Inalis ang margin-top dahil nag-column na tayo */
    }
    .form-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 25px 50px rgba(0,0,0,0.6);
    }

    .form-card h1 {
      /* Updated Title Style with Icon */
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      font-weight: 550;
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
    .form-card h1 i {
        color: var(--silver);
        font-size: 1.5rem;
    }

    /* Error Box */
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
      margin-bottom: 1.2rem;
      text-align: left;
      position: relative; /* Added for icon positioning */
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 0.8rem 1rem;
      padding-left: 3rem; /* Space for input icon */
      font-size: 1rem;
      border: 1px solid var(--davys-gray);
      border-radius: 1rem;
      background: var(--raisin-black-2);
      color: var(--platinum);
      transition: 0.3s ease;
      box-sizing: border-box;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
    }

    /* Input Icon Styling */
    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.1em;
        color: var(--silver);
        pointer-events: none;
        z-index: 10; /* Ensure icon is above input */
    }
    .form-group input[type="password"] {
        padding-right: 3rem; /* Space for eye icon if added */
    }
    /* Special styling for select to fix padding when icon is present */
    .form-group select {
        padding-left: 3rem; /* Same as input for consistency */
    }

    .form-group input::placeholder {
      color: var(--silver);
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: var(--silver);
      box-shadow: 0 0 10px rgba(199,194,191,0.2);
      outline: none;
      background: var(--jet);
    }
    
    .form-group select {
        /* Custom down arrow for select field */
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="%23C7C2BF" d="M7 10l5 5 5-5z"/></svg>');
        background-repeat: no-repeat;
        background-position: right 1rem center;
        padding-right: 2.5rem;
    }

    .form-group select option {
        background: var(--jet);
        color: var(--platinum);
    }

    /* Submit Button */
    .btn-submit {
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

    .btn-submit:hover {
      background: var(--smoky-black) !important;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.6);
    }

    .link-wrapper {
      margin-top: 20px;
    }

    /* Cancel Button/Link */
    .btn-cancel {
      font-family: 'Playfair Display', serif;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.8rem 1.4rem;
      background: var(--davys-gray);
      color: var(--white);
      border-radius: 1.2rem;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.25s ease;
      box-shadow: 0 3px 8px rgba(0,0,0,0.3);
    }

    .btn-cancel:hover {
      background: var(--jet);
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.4);
    }

    /* Media Queries for Responsiveness */
    @media (max-width: 480px) {
        .system-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .form-card {
            padding: 2rem 1.5rem;
            border-radius: 1.5rem;
        }
        .form-card h1 {
            font-size: 1.8rem;
        }
    }
  </style>
</head>
<body style="background: url('<?= base_url() ?>public/background.jpg') no-repeat center center fixed; background-size: cover;">

  <h1 class="system-title">User Management System</h1>

  <div class="form-card">
    <h1>
      <i class="fa-solid fa-user-plus"></i> Create New User
    </h1>

    <?php if (!empty($error)): ?>
      <div class="error-box-styled">
        <i class="fa-solid fa-triangle-exclamation"></i> <?= $error ?>
      </div>
    <?php endif; ?>
    
    <form id="user-form" action="<?= site_url('users/create/') ?>" method="POST">
      <div class="form-group">
        <i class="fa-solid fa-user input-icon"></i>
        <input type="text" name="username" placeholder="Username" required 
            value="<?= isset($username) ? html_escape($username) : '' ?>">
      </div>
      
      <div class="form-group">
        <i class="fa-solid fa-envelope input-icon"></i>
        <input type="email" name="email" placeholder="Email" required 
            value="<?= isset($email) ? html_escape($email) : '' ?>">
      </div>
      
      <div class="form-group">
        <i class="fa-solid fa-key input-icon"></i>
        <input type="password" name="password" placeholder="Password" required>
      </div>
      
      <div class="form-group">
        <i class="fa-solid fa-lock input-icon"></i>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
      </div>
      
      <div class="form-group">
        <i class="fa-solid fa-user-tag input-icon"></i>
        <select name="role" required>
          <option value="" disabled selected>-- Select Role --</option>
          <option value="admin" <?= isset($role) && $role=="admin" ? 'selected' : '' ?>>Admin</option>
          <option value="user" <?= isset($role) && $role=="user" ? 'selected' : '' ?>>User</option>
        </select>
      </div>
      
      <button type="submit" class="btn-submit">
        <i class="fa-solid fa-cloud-arrow-up"></i> Save User
      </button>
    </form>

    <div class="link-wrapper">
      <a href="<?= site_url('/users'); ?>" class="btn-cancel">
        <i class="fa-solid fa-arrow-left"></i> Back
      </a>
    </div>
  </div>
</body>
</html>