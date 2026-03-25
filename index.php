<?php 

include 'db_conn.php'; 

// 2. SQL query-ga lagu soo saaro xogta ardayda
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Inter', sans-serif;
        }
        .header-section {
            background-color: #006600; 
            color: white;
            padding: 15px 0;
            margin-bottom: 25px;
            text-align: center;
        }
        .main-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        .table thead {
            background-color: #e9ecef;
        }
        .btn-add {
            background-color: #198754;
            border: none;
            margin-bottom: 15px;
        }
        /* Qurxinta badhamada Action-ka */
        .btn-edit { color: #198754; font-size: 1.2rem; margin-right: 10px; }
        .btn-delete { color: #dc3545; font-size: 1.2rem; }
    </style>
</head>
<body>

    <div class="header-section">
        <h3 class="m-0">Register Form</h3>
    </div>

    <div class="container mt-4">
        <div class="main-container">
            
            <a href="add.php" class="btn btn-success btn-add">
    <i class="fa-solid fa-plus me-1"></i> Add New
</a>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead>
                        <tr class="table-primary"> <th>ID</th>
                            <th>Fullname</th>
                            <th>Tell</th>
                            <th>Email</th>
                            <th>Adress</th>
                            <th>Gender</th>
                            <th>Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // 3. Loop-ka xogta soo bandhigaya
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['fullname']; ?></td>
                                    <td><?php echo $row['tel']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Ma hubtaa inaad tirtirto?')">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            // Haddii database-ku madhan yahay
                            echo "<tr><td colspan='8' class='text-center py-4 text-muted'>No records found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
