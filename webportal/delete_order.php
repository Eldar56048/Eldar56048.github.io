<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: loginwebportal.php');
}
require 'connect.php';
require 'includes/order.php';

$orders = getOrder($conn, $_GET['id']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $orders['order_id'];
  $sql = "DELETE FROM orders
        WHERE order_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {

        echo mysqli_error($conn);

    } else {

        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {

            header("Location:order.php");

        } else {

            echo mysqli_stmt_error($stmt);

        }
    }
  }

 ?>
