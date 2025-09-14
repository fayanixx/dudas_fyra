<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

<style>
/* --- Palette Variables --- */
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
}

/* --- Reset & Base --- */
* { box-sizing: border-box; margin:0; padding:0; }
body {
    font-family: 'Poppins', sans-serif;
    background: url('./background.jpg') no-repeat center center fixed;
    background-size: cover;
    color: var(--silver);
    min-height: 100vh;
    padding: 2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
}

/* Overlay for readability */
body::before {
    content:'';
    position: fixed;
    inset: 0;
    background: rgba(45,39,40,0.75);
    z-index: -1;
}

/* --- Main Title --- */
h1.main-title {
    font-family: 'Playfair Display', serif;
    font-size: 3rem;
    font-weight: 700;
    text-align: center;
    color: var(--white);
    text-shadow: 1px 1px 15px rgba(0,0,0,0.6);
    margin-bottom: 2rem;
}

/* --- Container --- */
.container { width: 100%; max-width: 1200px; }

/* --- Card --- */
.card {
    background: rgba(63,55,53,0.85);
    border-radius: 2rem;
    backdrop-filter: blur(15px);
    overflow: hidden;
    box-shadow: 0 15px 40px rgba(0,0,0,0.35);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.45);
}

/* --- Card Header --- */
.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem 2rem;
    background: var(--jet);
    font-family: 'Playfair Display', serif;
    font-weight: 600;
    font-size: 1.6rem;
    color: var(--white);
    border-bottom: 1px solid rgba(199,194,191,0.3);
    border-top-left-radius: 2rem;
    border-top-right-radius: 2rem;
}

/* --- Add User Button --- */
.btn-add {
    background: var(--black) !important;
    color: var(--white) !important;
    padding: 0.5rem 1.4rem;
    font-size: 1.3rem;
    border-radius: 1.2rem;
    font-weight: 500;
    text-decoration: none;
    box-shadow: 0 3px 8px rgba(0,0,0,0.5);
    transition: all 0.25s ease;
}
.btn-add:hover {
    background: #010101 !important;
    transform: translateY(-2px);
    transition: all 0.2s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.6);
}

/* --- Other Action Buttons --- */
.btn-edit, .btn-delete {
    padding: 0.4rem 0.9rem;
    border-radius: 1rem;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: all 0.2s ease;
    cursor: pointer;
}
.btn-edit { background: var(--davys-gray); color: var(--white); }
.btn-edit:hover { background: var(--jet); }
.btn-delete { background: #9B2C2C; color: var(--white); }
.btn-delete:hover { background: #7B2424; }

/* --- Action Buttons --- */
.btn-add, .btn-edit, .btn-delete {
    text-decoration: none; /* prevents underline */
}

.btn-add i, .btn-edit i, .btn-delete i {
    text-decoration: none; /* specifically for icons */
}


/* --- Table Wrapper --- */
.table-wrapper {
    overflow-x: auto;
    margin: 1.5rem;
}

/* --- Table --- */
table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border-radius: 1.5rem;
    overflow: hidden;
}
th, td {
    padding: 1rem 1.5rem;
    text-align: center;
    transition: all 0.2s;
}
th {
    background: var(--smoky-black);
    color: var(--white);
    font-weight: 600;
}
tr:nth-child(even) td { background: rgba(56,50,50,0.55); }
tr:nth-child(odd) td { background: rgba(63,55,53,0.55); }
tr:hover td { background: var(--jet); transform: scale(1.01); }
td:last-child { display: flex; justify-content: center; gap: 0.5rem; }

/* --- Empty State --- */
.empty {
    padding: 2rem;
    text-align: center;
    font-style: italic;
    background: rgba(45,39,40,0.65);
    border-radius: 0 0 2rem 2rem;
    color: var(--silver);
    font-family: 'Poppins', sans-serif;
}
</style>
</head>
<body>

<h1 class="main-title"><i class="fa-solid fa-users"></i> User Management System</h1>

<div class="container">
    <div class="card">
        <div class="card-header">
            <span><i class="fa-solid fa-users"></i> User Directory</span>
            <div class="actions">
                <a href="<?= site_url('users/create') ?>" class="btn-add"><i class="fa-solid fa-user-plus"></i> Add User</a>
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
                <?php if(!empty($users)): ?>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <a href="<?= site_url('users/update/'.$user['id']) ?>" class="btn-edit" title="Edit User"><i class="fa-solid fa-pen"></i></a>
                            <a href="<?= site_url('users/delete/'.$user['id']) ?>" class="btn-delete" title="Delete User" onclick="return confirm('Are you sure?');"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="empty"><i class="fa-regular fa-circle-xmark"></i> No users found</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
