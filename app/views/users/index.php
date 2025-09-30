<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Users Management Dashboard</title>
  
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
      background: url("<?= base_url() ?>public/background.jpg") no-repeat center center fixed;
      background-size: cover;
      color: var(--silver);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start; /* Start from top, but still allow centering if content is short */
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

    .dashboard-container {
      /* Using your card style */
      background: rgba(63,55,53,0.85);
      border-radius: 2rem;
      backdrop-filter: blur(15px);
      padding: 2.5rem;
      width: 100%;
      max-width: 1200px;
      box-shadow: 0 15px 40px rgba(0,0,0,0.5);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      margin: 0; /* Remove auto margin from original glass-container */
    }
    .dashboard-container:hover {
        transform: translateY(-3px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.6);
    }

    .dashboard-container h2 {
      /* Using your card-header style but centered and larger */
      font-family: 'Playfair Display', serif;
      font-size: 2.5rem;
      font-weight: 700;
      text-align: center;
      color: var(--white);
      text-shadow: 1px 1px 10px rgba(0,0,0,0.6);
      margin-bottom: 2rem;
      padding-bottom: 1rem;
      border-bottom: 1px solid rgba(199,194,191,0.3);
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
      gap: 1.5rem;
    }

    /* Logout Button - Using your btn-logout style */
    .btn-logout {
      background: var(--error-red);
      color: var(--white);
      padding: 0.5rem 1.4rem;
      font-size: 1.1rem;
      border-radius: 1.2rem;
      font-weight: 500;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      box-shadow: 0 3px 8px rgba(0,0,0,0.5);
      transition: all 0.25s ease;
      border: none;
      cursor: pointer;
    }
    .btn-logout:hover {
      background: #7B2424;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.6);
    }

    /* Search Form - Using your search-form style */
    .search-form {
      display: flex;
      align-items: center;
      background: var(--raisin-black-2);
      border-radius: 1.2rem;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.4);
      flex-grow: 1; /* Allow it to take available space */
      max-width: 350px;
    }
    .search-form input {
      border: none;
      outline: none;
      padding: 0.6rem 1rem;
      background: transparent;
      color: var(--white);
      font-size: 1rem;
      flex-grow: 1;
    }
    .search-form input::placeholder { color: var(--silver); }
    .search-form button {
      border: none;
      background: var(--black);
      color: var(--white);
      padding: 0.6rem 1rem;
      cursor: pointer;
      transition: background 0.2s;
    }
    .search-form button:hover { background: var(--jet); }

    /* Welcome/Status Box */
    .user-status {
      /* Adjusted to fit the dark theme */
      background: rgba(63,55,53,0.7);
      border: 1px solid var(--davys-gray);
      padding: 10px 15px;
      border-radius: 12px;
      display: inline-block;
      color: var(--silver);
      font-size: 1em;
      margin-bottom: 1.5rem;
      text-align: left;
    }
    .user-status strong {
      color: var(--platinum);
      font-weight: 600;
    }
    .user-status .username {
      color: var(--platinum);
      font-weight: 500;
    }
    .user-status.error {
      /* Using your error-box style */
      background: var(--error-bg);
      border: 1px solid var(--error-red);
      color: var(--error-red);
    }

    /* Table Styles */
    .table-wrapper { overflow-x: auto; max-width: 100%; }
    table {
        width: 100%;
        min-width: 700px;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 1.5rem;
        overflow: hidden;
    }
    th, td {
        padding: 1rem 1.5rem;
        text-align: center;
        vertical-align: middle;
    }
    th { 
        background: var(--smoky-black); 
        color: var(--white); 
        font-weight: 600; 
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    tr:nth-child(even) td { background: rgba(56,50,50,0.55); }
    tr:nth-child(odd) td { background: rgba(63,55,53,0.55); }
    tr:hover td { background: var(--jet); }
    
    td:last-child { 
        display:flex; 
        justify-content:center; 
        align-items:center; 
        gap:0.5rem; 
    }
    td:last-child a { text-decoration:none; }
    
    /* Action Buttons */
    .btn-action {
        padding: 0.4rem 0.9rem;
        border-radius: 1rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.3rem;
        transition: all 0.2s ease;
        cursor: pointer;
        text-decoration: none;
        white-space: nowrap;
        height: 40px;
        font-size: 0.95em;
    }
    /* Update/Edit Button - Using your btn-edit style */
    .btn-update { background: var(--davys-gray); color: var(--white); }
    .btn-update:hover { background: var(--jet); transform: scale(1.05); }
    /* Delete Button - Using your btn-delete style */
    .btn-delete { background: var(--error-red); color: var(--white); }
    .btn-delete:hover { background: #7B2424; transform: scale(1.05); }
    
    .text-muted {
        color: var(--silver);
        font-style: italic;
        font-size: 0.9em;
    }
    
    /* Pagination - Using your pagination style */
    .pagination-container { display: flex; justify-content:center; margin:1.5rem 0; }
    .pagination { list-style:none; display:flex; justify-content:center; gap:0.5rem; padding:0; margin:0; }
    .pagination li a, .pagination li span {
        display:inline-block;
        padding:0.5rem 0.9rem;
        border-radius:0.8rem;
        background:var(--davys-gray);
        color:var(--white);
        text-decoration:none;
        transition: background 0.2s;
    }
    .pagination li a:hover { background: var(--jet); }
    .pagination li.active a, .pagination li span.current {
        background: var(--black);
        font-weight:600;
        border: none;
    }

    /* Create User Button - Using your btn-add style */
    .button-container { text-align: center; margin-top: 1.5rem; }
    .btn-create {
        background: var(--black) !important;
        color: var(--white) !important;
        padding: 0.7rem 1.8rem;
        font-size: 1.2rem;
        border-radius: 1.2rem;
        font-weight: 500;
        text-decoration: none;
        box-shadow: 0 3px 8px rgba(0,0,0,0.5);
        transition: all 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border: none;
    }
    .btn-create:hover {
        background: var(--smoky-black) !important;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.6);
    }
    
    /* Media Queries */
    @media (max-width: 768px) {
      .top-bar {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
      }
      .search-form {
        width: 100%;
        max-width: 100%;
      }
      .user-status {
          display: block;
          text-align: center;
      }
      .btn-logout {
          margin-left: auto;
          margin-right: auto;
      }
      .dashboard-container {
          padding: 1.5rem;
      }
      .dashboard-container h2 {
          font-size: 2rem;
      }
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <h2>
      <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Information'; ?>
    </h2>

    <?php if(!empty($logged_in_user)): ?>
      <div class="user-status">
        <strong>Welcome:</strong> 
        <span class="username"><?= html_escape($logged_in_user['username']); ?></span>
        (Role: <span class="role"><?= html_escape(ucfirst($logged_in_user['role'])); ?></span>)
      </div>
    <?php else: ?>
      <div class="user-status error">
        <i class="fa-solid fa-triangle-exclamation"></i> Logged in user not found
      </div>
    <?php endif; ?>

    <div class="top-bar">
      <a href="<?=site_url('auth/logout'); ?>">
        <button class="btn-logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
      </a>
      
      <form action="<?=site_url('users');?>" method="get" class="search-form">
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
        <input name="q" type="text" placeholder="Search by name or email..." value="<?=html_escape($q);?>">
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>  
      </form>
    </div>

    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <th>Role</th>
              <th>Action</th>
            <?php else: ?>
               <th>Action</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($users)): ?>
            <tr>
              <td colspan="<?= ($logged_in_user['role'] === 'admin') ? 5 : 4 ?>" class="empty">
                  No users found matching the criteria.
              </td>
            </tr>
          <?php else: ?>
            <?php foreach ($users as $user): ?>
            <tr>
              <td><?=html_escape($user['id']); ?></td>
              <td><?=html_escape($user['username']); ?></td>
              <td><?=html_escape($user['email']); ?></td>
              <?php if ($logged_in_user['role'] === 'admin'): ?>
                <td><?= html_escape(ucfirst($user['role'])); ?></td>
                <td>
                  <a href="<?=site_url('/users/update/'.$user['id']);?>" class="btn-action btn-update">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                  </a>
                  <a href="<?=site_url('/users/delete/'.$user['id']);?>" class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                    <i class="fa-solid fa-trash"></i> Delete
                  </a>
                </td>
              <?php else: ?>
                <td>
                    <?php if ($logged_in_user['id'] === $user['id']): ?>
                        <a href="<?=site_url('/users/update/'.$user['id']);?>" class="btn-action btn-update">
                            <i class="fa-solid fa-pen-to-square"></i> My Profile
                        </a>
                    <?php else: ?>
                        <span class="text-muted">View Only</span>
                    <?php endif; ?>
                </td>
              <?php endif; ?>
            </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div class="pagination-container">
      <ul class="pagination">
        <?php 
          // Note: The variable $page must contain the rendered pagination HTML from your CodeIgniter/PHP framework.
          echo $page; 
        ?>
      </ul>
    </div>

    <?php if ($logged_in_user['role'] === 'admin'): ?>
      <div class="button-container">
        <a href="<?=site_url('users/create'); ?>" class="btn-create">
          <i class="fa-solid fa-user-plus"></i> Create New User
        </a>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>