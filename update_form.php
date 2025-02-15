<?php

    include 'User.php';
    include 'Database.php';

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    $userData = $user->getUser($_GET['matric']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Update User</h3>
                    <form action="update.php" method="post">
                        <div class="mb-3">
                            <label for="matric" class="form-label">Matric</label>
                            <input type="text" class="form-control" name="matric" id="matric" value="<?php echo $userData['matric']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $userData['name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select" required>
                                <option value="student" <?php if($userData['role'] === 'student') { echo "selected"; } ?>>Student</option>
                                <option value="lecturer" <?php if($userData['role'] === 'lecturer') { echo "selected"; } ?>>Lecturer</option>
                            </select>
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php

    $db->close();

?>
