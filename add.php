<?php 

include 'db_conn.php'; 

$message = ""; 

if (isset($_POST['save_student'])) {
    // Soo qabo xogta
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $tel      = mysqli_real_escape_string($conn, $_POST['tel']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);
    $gender   = mysqli_real_escape_string($conn, $_POST['gender']);
    $date     = mysqli_real_escape_string($conn, $_POST['date']);

    // SQL Query
    $query = "INSERT INTO students (fullname, tel, email, address, gender, date) 
              VALUES ('$fullname', '$tel', '$email', '$address', '$gender', '$date')";

    if (mysqli_query($conn, $query)) {
        
        $message = "<div class='alert alert-success'>Ardayga si guul leh ayaa loo kaydiyey! ✅</div>";
        header("Refresh:2; url=index.php");
    } else {
        $message = "<div class='alert alert-danger'>Khalad: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f4f7f6; padding-top: 50px; }
        .card-custom { border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: none; }
        .card-header { background-color: #006600; color: white; border-radius: 15px 15px 0 0 !important; text-align: center; padding: 20px; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-custom">
                <div class="card-header">
                    <h4 class="m-0"><i class="fa fa-user-plus"></i> Add New Student</h4>
                </div>
                <div class="card-body p-4">
                    
                    <?php echo $message; ?>

                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="fw-bold">Full Name</label>
                                <input type="text" name="fullname" class="form-control" placeholder="Geli magaca oo dhammaystiran" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Telephone</label>
                                <input type="text" name="tel" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="@gmail.com" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="fw-bold">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Gender</label>
                                <select name="gender" class="form-select" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Reg. Date</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" name="save_student" class="btn btn-success p-2">
                                <i class="fa fa-save"></i> Save Student
                            </button>
                            <a href="index.php" class="btn btn-outline-secondary p-2">
                                <i class="fa fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
