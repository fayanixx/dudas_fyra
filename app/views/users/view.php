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
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            color: #374151;
            background: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background-image: radial-gradient(at 0% 0%, hsla(216, 100%, 96%, 0.5) 0, transparent 50%),
                              radial-gradient(at 100% 100%, hsla(270, 100%, 96%, 0.5) 0, transparent 50%);
        }
        
        .container { width: 100%; max-width: 1000px; }
        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 1.5rem;
            border: 1px solid #e5e7eb;
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.08), 0 4px 16px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            transition: transform 0.3s ease-out, box-shadow 0.3s ease-out;
        }

        /* Card header and actions */
        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #e5e7eb;
            background: #f9fafb;
        }
        .title {
            margin: 0;
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937;
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
            padding: 0.6rem 1rem;
            text-decoration: none;
            border-radius: 0.75rem;
            border: 1px solid transparent;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        .btn i { font-size: 0.875rem; }
        .btn:active { transform: scale(0.98); }

        .btn-primary {
            background: #4f46e5;
            color: #fff;
            background-image: linear-gradient(to right, #6366f1, #4f46e5);
        }
        .btn-primary:hover {
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
            transform: translateY(-1px);
        }
        .btn-edit {
            background: #10b981;
            color: #fff;
            background-image: linear-gradient(to right, #34d399, #10b981);
        }
        .btn-edit:hover {
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
            transform: translateY(-1px);
        }
        .btn-delete {
            background: #ef4444;
            color: #fff;
            background-image: linear-gradient(to right, #f87171, #ef4444);
        }
        .btn-delete:hover {
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
            transform: translateY(-1px);
        }

        /* Table styles */
        .table-wrapper { overflow-x: auto; }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        th, td { padding: 1rem 1.5rem; text-align: left; font-size: 0.9375rem; }
        th {
            background: #4f46e5;
            color: #fff;
            font-weight: 600;
            text-align: center;
            letter-spacing: 0.5px;
        }
        th:first-child { border-top-left-radius: 1.5rem; }
        th:last-child { border-top-right-radius: 1.5rem; }
        
        tr { transition: background-color 0.2s ease; }
        tr:nth-child(even) td { background: #f9fafb; }
        tr:nth-child(odd) td { background: #fff; }
        tr:hover td { background: #eef2ff; }

        td:last-child { display: flex; justify-content: center; gap: 0.75rem; }

        /* Empty state */
        .empty {
            padding: 2rem;
            text-align: center;
            color: #6b7280;
            font-style: italic;
            background: #fff;
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
                                            <i class="fa-solid fa-pen"></i> Edit
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