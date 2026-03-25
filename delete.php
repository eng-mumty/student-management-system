<?php
// 1. Isku xirka database-ka
include "db_conn.php";

// 2. Hubi in ID-ga la soo diray (URL-ka)
if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    // Nadiifi ID-ga si looga hortago SQL Injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // 3. SQL Query-ga tirtirista
    $sql = "DELETE FROM students WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        // Haddii uu guuleysto, ku celi index.php
        header("Location: index.php?msg=Qofka si guul leh ayaa loo tirtiray");
        exit();
    } else {
        // Haddii uu khalad dhaco
        echo "Khalad ayaa dhacay xilli la tirtirayay: " . mysqli_error($conn);
    }
} else {
    // Haddii si toos ah loo soo galo faylka isagoon ID la wadin
    header("Location: index.php");
    exit();
}
?>