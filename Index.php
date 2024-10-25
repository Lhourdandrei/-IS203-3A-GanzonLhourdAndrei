<?php
require('./Read.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .navbar {
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .table thead th {
            background-color: #007bff;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">User Management</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Email.php">Email Notification</a></li>
                    <li class="nav-item"><a class="nav-link" href="SMS.php">SMS API</a></li>
                    <li class="nav-item"><a class="nav-link" href="ChangePassword.php">Change Password</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Welcome</h1>
        <h3>Create User Info</h3>
        <form action="Create.php" method="post" class="form-inline">
            <div class="form-group flex-fill">
                <input type="text" class="form-control" name="Fname" placeholder="First Name" required />
            </div>
            <div class="form-group flex-fill">
                <input type="text" class="form-control" name="Mname" placeholder="Middle Name" required />
            </div>
            <div class="form-group flex-fill">
                <input type="text" class="form-control" name="Lname" placeholder="Last Name" required />
            </div>
            <button type="submit" name="create" class="btn btn-primary">Create</button>
        </form>

        <br>

        <h3>List of Users</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($results = mysqli_fetch_array($sqlAccount)) { ?>
                    <tr>
                        <td><?php echo $results['ID']; ?></td>
                        <td><?php echo $results['FirstName']; ?></td>
                        <td><?php echo $results['MiddlName']; ?></td>
                        <td><?php echo $results['LastName']; ?></td>
                        <td>
                            <form action="Edit.php" method="post" style="display:inline-block;">
                                <input type="hidden" name="editID" value="<?php echo $results['ID']; ?>">
                                <input type="hidden" name="editF" value="<?php echo $results['FirstName']; ?>">
                                <input type="hidden" name="editM" value="<?php echo $results['MiddlName']; ?>">
                                <input type="hidden" name="editL" value="<?php echo $results['LastName']; ?>">
                                <button type="submit" name="edit" class="btn btn-warning btn-sm">Edit</button>
                            </form>
                            <form action="Delete.php" method="post" style="display:inline-block;">
                                <input type="hidden" name="deleteID" value="<?php echo $results['ID']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>
