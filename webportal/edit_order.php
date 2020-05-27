<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: loginwebportal.php');
}
require 'connect.php';
require 'includes/order.php';
require 'header.php';
$orders = getOrder($conn,$_GET['id']);
 ?>
<div class="bari">
        <nav class="white2"></nav>
        <form  class="mard" method="POST">
            
            <textarea class="name" type="text" name="problem" val style="padding-left: 20px;padding-right:20px;width: 100%;" value="<?=$orders['problem']?>"  placeholder="Проблема: " maxlength="250"></textarea>
            <textarea class="name" type="text" name="what_done" style="padding-left: 20px;padding-right:20px;width: 100%;" value="<?=$orders['what_done']?>"  placeholder="Что сделано: " maxlength="250"></textarea>
            <input class="name1" type="date" name="gave_date" style="padding-left: 20px;width: 100%;" value>
            <select class="name1"  name="status">
                <option value="done">Сделано</option>
                <option value="implementation">На реализаций</option>
                <option value="notdone">Еще не рассмотрено</option>
            </select>
            <input class="name1" type="text" name="price"  style="padding-left: 20px; width: 100%;" value  placeholder="Цена" maxlength="100">
            <button type="submit" class="Send1" id="QWE">Добавить</button>
        </form>
        <nav class="white2"></nav>
    </div>
<?php

require 'footer.php';
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $order_id = $_GET['id'];
    $problem=$_POST['problem'];
    $what_done=$_POST['what_done'];
    $gave_date=$_POST['gave_date'];
    $who_gave=$_SESSION['user']['Name'];
    $status=$_POST['status'];
    $price=$_POST['price'];
    if(!empty($gave_date)&&!empty($price)){
        $sql = "UPDATE orders SET problem='$problem',
        what_done = '$what_done',gave_date = '$gave_date',who_gave = '$who_gave',status = '$status',price = '$price'
        WHERE order_id = '$order_id'";
        $res = mysqli_query($conn,$sql);
        if($res===false){
        echo mysqli_error($conn);

        }else{
        header("Location: aboutorder.php?id=$order_id");
        }
    }
    else{
        $sql = "UPDATE orders SET problem='$problem',
        what_done = '$what_done',status = '$status'
        WHERE order_id = '$order_id'";
        $res = mysqli_query($conn,$sql);
        if($res===false){
        echo mysqli_error($conn);

        }else{
        header("Location: aboutorder.php?id=$order_id");
        }
    }
    
  }
?>
