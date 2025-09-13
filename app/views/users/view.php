<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    /* New color theme: black, gray, navy blue, light gray */

    /* Base styles */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body {
        font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        color: #A0AEC0; /* Light gray text */
        background: linear-gradient(135deg, #171A21, #2C3E50); /* Dark gray to navy gradient */
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }
    .container {
        width: 100%;
        max-width: 1300px;
        margin: auto;
    }

    .card {
        align-items: center;
        background: rgba(26, 32, 44, 0.8); /* Semi-transparent black */
        backdrop-filter: blur(20px) saturate(150%);
        border-radius: 1.75rem;
        border: 1px solid rgba(160, 174, 192, 0.4); /* Light gray border */
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
    }

    /* Card header */
    .card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.5rem 2rem;
        border-bottom: 1px solid rgba(0,0,0,0.2);
        background: linear-gradient(170deg, #2C5282, #1A202C); /* Navy blue to dark gray gradient */
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
    .actions { display: flex; gap: 0.85rem; }

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
        background: linear-gradient(135deg, #2C5282, #2B6CB0); /* Navy blue gradient */
        color: #E2E8F0; /* Light gray */
        box-shadow: 0 4px 12px rgba(44, 82, 128, 0.4);
    }
    .btn-primary:hover {
        box-shadow: 0 6px 18px rgba(44, 82, 128, 0.6);
        transform: translateY(-2px);
    }
    .btn-edit {
        background: #4A5568; /* Dark gray */
        color: #E2E8F0; /* Light gray */
        box-shadow: 0 4px 12px rgba(74, 85, 104, 0.4);
    }
    .btn-edit:hover {
        background: #2D3748; /* Slightly darker gray */
        box-shadow: 0 6px 18px rgba(74, 85, 104, 0.6);
        transform: translateY(-2px);
    }
    .btn-delete {
        background: #9B2C2C; /* Muted red for delete */
        color: #E2E8F0; /* Light gray */
        box-shadow: 0 4px 12px rgba(155, 44, 44, 0.4);
    }
    .btn-delete:hover {
        background: #7B2424; /* Darker red */
        box-shadow: 0 6px 18px rgba(155, 44, 44, 0.6);
        transform: translateY(-2px);
    }

    /* Table styles */
    .table-wrapper {
      max-width: 900px;
      margin-top: 30px;
      margin-bottom: 30px;
      margin-right: 20px;
      margin-left: 20px;
      overflow-x: auto;
  }
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }
    th, td { padding: 1rem 1.5rem; text-align: center; font-size: 0.95rem; }
    th {
        background: linear-gradient(135deg, #2B6CB0, #4A5568); /* Navy blue to gray gradient */
        color: #E2E8F0; /* Light gray */
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    th:first-child { border-top-left-radius: 1.5rem; }
    th:last-child { border-top-right-radius: 1.5rem; }

    tr { transition: background-color 0.25s ease, transform 0.2s ease; }
    tr:nth-child(even) td { background: rgba(45, 55, 72, 0.6); } /* Dark gray */
    tr:nth-child(odd) td { background: rgba(26, 32, 44, 0.6); } /* Black */
    tr:hover td { background: rgba(44, 82, 128, 0.8); transform: scale(1.01); } /* Navy blue hover */

    td:last-child { display: flex; justify-content: center; gap: 0.75rem; }

    /* Empty state */
    .empty {
        padding: 2rem;
        text-align: center;
        color: #A0AEC0; /* Light gray */
        font-style: italic;
        background: rgba(26, 32, 44, 0.7); /* Semi-transparent black */
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