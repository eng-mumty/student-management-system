<?php
include "db_conn.php";

// 1.  ID-ga qofka la rabo in wax laga beddelo
$id = $_GET['id'];

// 2. SQL query si xogta qofkaas kaliya loo soo saaro
$sql = "SELECT * FROM students WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// 3. Marka la riixo badhanka "Update Student"
if (isset($_POST['update_student'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $tel      = mysqli_real_escape_string($conn, $_POST['tel']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);
    $gender   = mysqli_real_escape_string($conn, $_POST['gender']);
    $date     = mysqli_real_escape_string($conn, $_POST['date']);

    // SQL-ka lagu cusboonaysiinayo xogta (UPDATE)
    $sql_update = "UPDATE students SET 
                    fullname='$fullname', 
                    tel='$tel', 
                    email='$email', 
                    address='$address', 
                    gender='$gender', 
                    date='$date' 
                   WHERE id = $id";

    if (mysqli_query($conn, $sql_update)) {
        echo "<script>alert('Xogta si guul leh ayaa loo cusboonaysiiyey!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f4f7f6; padding-top: 50px; }
        .card-custom { border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: none; }
        .card-header { background-color: #0d6efd; color: white; border-radius: 15px 15px 0 0 !important; text-align: center; padding: 20px; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-custom">
                <div class="card-header">
                    <h4 class="m-0"><i class="fa fa-user-pen"></i> Edit Student Information</h4>
                </div>
                <div class="card-body p-4">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="fw-bold">Full Name</label>
                            <input type="text" name="fullname" class="form-control" value="<?php echo $row['fullname']; ?>" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Telephone</label>
                                <input type="text" name="tel" class="form-control" value="<?php echo $row['tel']; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Gender</label>
                                <select name="gender" class="form-select" required>
                                    <option value="Male" <?php echo ($row['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                    <option value="Female" <?php echo ($row['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Reg. Date</label>
                                <input type="date" name="date" class="form-control" value="<?php echo $row['date']; ?>" required>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" name="update_student" class="btn btn-primary p-2">
                                <i class="fa fa-rotate"></i> Update Student
                            </button>
                            <a href="index.php" class="btn btn-outline-secondary p-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
