<?php
  require 'connect.php';
  session_start();
if (!$_SESSION['user']) {
    header('Location: loginwebportal.php');
}
  require 'includes/order.php';
  $orders = getOrder($conn,$_GET['id']);
  require 'header.php';
 ?>
 <?php if($orders===null): ?>
   <h2>No article has been found</h2>
<?php else: ?>
  <div class="all">
        <div class="numberoforder"><p class="number">Номер заказа: <?=$_GET['id']?></p></div>
       <div class="buttons">
       <a class="buttonupdate" href="edit_order.php?id=<?=$orders['order_id'];?>"><b> Изменить</b></a>
       <form  action="delete_order.php?id=<?=$orders['order_id']?>" method="post">
        <button class="buttondelete">Удалить</button>
      </form>
       </div>
        <div class="info">
            <div class="tables1"><b><p class="info">Имя клиента:</p></b></div>
            <div class="tables"><b><p class="info"><?=$orders['client_name']?></p></b></div>
        </div>
        <div class="info1">
        <div class="tables1"><b><p class="info1">Номер клиента:</p></b></div>
            <div class="tables"><b><p class="info1"><?=$orders['client_number']?></p></b></div>
        </div>
        <div class="info">
        <div class="tables1"><b><p class="info">Заказ принял:</p></b></div>
            <div class="tables"><b><p class="info"><?=$orders['host_person']?></p></b></div>
        </div>
        <div class="info1">
        <div class="tables1"><b><p class="info1">Дата заказа:</p></b></div>
            <div class="tables"><b><p class="info1"><?=$orders['accepted_date']?></p></b></div>
        </div>
        <div class="info">
        <div class="tables1"><b><p class="info">Проблема:</p></b></div>
            <div class="tables"><b><p class="info"><?=$orders['problem']?></p></b></div>
        </div>
        <div class="info1">
        <div class="tables1"><b><p class="info1">Что сделано:</p></b></div>
            <div class="tables"><b><p class="info1"><?=$orders['what_done']?></p></b></div>
        </div>
        <div class="info">
        <div class="tables1"><b><p class="info">Отдал клиенту:</p></b></div>
            <div class="tables"><b><p  class="info"><?=$orders['gave_date']?></p></b></div>
        </div>
        <div class="info1">
        <div class="tables1"><b><p class="info1">Кто отдал:</p></b></div>
            <div class="tables"><b><p class="info1"><?=$orders['who_gave']?></p></b></div>
        </div>
        <div class="info" >
        <div class="tables1"><b><p class="info">Статус:</p></b></div>
            <div class="tables"><?=
             '';
              if($orders['status']==='done'){
                echo'<b><p class="info"  style="color: green;background-color: white">Сделано</p></b>';
              }             
                   
              elseif ($orders['status']==='implementation') {
                echo'<b><span style="background-color:white"><p class="info"  style="color: grey;background-color: white">На реализаций</p></span></b>';
              }
              elseif ($orders['status']==='notdone') {
                echo'<b><span style="background-color:white"><p class="info"  style="color: red;background-color: white">Еще не рассмотрено</p></span></b>';
              }
              ?></div>
        </div>
        <div class="info1">
        <div class="tables1"><b><p class="info1">Цена:</p></b></div>
        <div class="tables"><b><p class="info1"><?=$orders['price']?></p></b></div>
        </div>
    </div>
    <div class="footer"></div>
<?php endif;
require 'footer.php'; ?>
