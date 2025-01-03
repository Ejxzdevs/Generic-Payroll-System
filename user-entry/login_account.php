<?php 
include "../connection/connection.php";
session_start();

if (isset($_POST['submit'])) {

    if (empty($_POST['user']) || empty($_POST['pass'])) {
        // Handle empty user or pass fields
    } else {
        $username = trim($_POST['user']);
        $password = trim($_POST['pass']);

        // Use prepared statement to avoid SQL injection
        $sql = "SELECT * FROM tbl_accounts WHERE TRIM(Username) = ? AND Password = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $users = mysqli_fetch_array($result);

        if ($users) {
            $id = $users['Employees_ID'];

            $_SESSION['Emp'] = 'Regular';
            $_SESSION['username'] = $_POST['user'];
            $_SESSION['password'] = $_POST['pass'];
            $_SESSION['id_user'] = $users['Employees_ID'];
            $_SESSION['type'] = $users['User_Type'];
            $_SESSION['status'] = $users['Status'];

            if ($_SESSION['type'] == "Admin") {
                if ($_SESSION['status'] == "Enable") {
                    header("Location: ../admin-side/dashboard/dashboard_layout.php");
                    exit();
                } else {
                    header("Location: login.php");
                    exit();
                }
            }

            if ($_SESSION['type'] == "Processor") {
                if ($_SESSION['status'] == "Enable") {
                    header("Location: ../side-bar/dashboard/dashboard_layout.php");
                    exit();
                } else {
                    header("Location: login.php");
                    exit();
                }
            }

        } else {
            header("Location: login.php");
            exit();
        }
    }
}
