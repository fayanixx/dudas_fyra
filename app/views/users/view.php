<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    /* Base styles */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body {
        font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        color: #374151;
        background: linear-gradient(135deg, #dbeafe, #f5d0fe, #ede9fe);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

      .container {
          width: 100%;
          max-width: 1200px; /* mas malapad yung card */
          margin: auto;
      }

    .card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(20px) saturate(150%);
        border-radius: 1.75rem;
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
    }

    /* Card header */
    .card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.5rem 2rem;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        background: linear-gradient(to right, #6366f1, #a78bfa);
        color: white;
    }
    .title {
        margin: 0;
        font-size: 1.8rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .actions { display: flex; gap: 0.75rem; }

    /* Buttons */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.65rem 1.25rem;
        text-decoration: none;
        border-radius: 2rem;
        font-size: 0.9rem;
        font-weight: 600;
        transition: all 0.25s ease-in-out;
        border: none;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    .btn i { font-size: 0.9rem; }
    .btn:active { transform: scale(0.96); }

    .btn-primary {
        background: linear-gradient(135deg, #6366f1, #4f46e5);
        color: #fff;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);
    }
    .btn-primary:hover {
        box-shadow: 0 6px 18px rgba(99, 102, 241, 0.6);
        transform: translateY(-2px);
    }
    .btn-edit {
        background: linear-gradient(135deg, #34d399, #059669);
        color: #fff;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
    }
    .btn-edit:hover {
        box-shadow: 0 6px 18px rgba(16, 185, 129, 0.6);
        transform: translateY(-2px);
    }
    .btn-delete {
        background: linear-gradient(135deg, #f87171, #dc2626);
        color: #fff;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
    }
    .btn-delete:hover {
        box-shadow: 0 6px 18px rgba(239, 68, 68, 0.6);
        transform: translateY(-2px);
    }

    /* Table styles */
    .table-wrapper {
      max-width: 900px; /* mas makitid yung table */
      margin: 0 auto;   /* center yung table sa loob ng card */
      overflow-x: auto;
  }
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }
    th, td { padding: 1rem 1.5rem; text-align: center; font-size: 0.95rem; }
    th {
        background: linear-gradient(135deg, #6366f1, #a78bfa);
        color: #fff;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    th:first-child { border-top-left-radius: 1.5rem; }
    th:last-child { border-top-right-radius: 1.5rem; }
    
    tr { transition: background-color 0.25s ease, transform 0.2s ease; }
    tr:nth-child(even) td { background: rgba(243, 244, 246, 0.7); }
    tr:nth-child(odd) td { background: rgba(255, 255, 255, 0.7); }
    tr:hover td { background: rgba(224, 231, 255, 0.8); transform: scale(1.01); }

    td:last-child { display: flex; justify-content: center; gap: 0.75rem; }

    /* Empty state */
    .empty {
        padding: 2rem;
        text-align: center;
        color: #6b7280;
        font-style: italic;
        background: rgba(255,255,255,0.6);
        border-bottom-left-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }
</style>

</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="title"><i class="fa-solid fa-users"></i> User Directory</h1>
                <div class="actions">
                    <a href="<?= site_url('users/create') ?>" class="btn btn-primary">
                        <i class="fa-solid fa-user-plus"></i> Add New User
                    </a>
                </div>
            </div>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                            onclick="return confirm('Are you sure you want to permanently delete this user? This action cannot be undone.')">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="empty">
                                    <i class="fa-regular fa-circle-xmark"></i> No users found. Start by adding a new one!
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>