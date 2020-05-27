<?php

  require 'connect.php';
  session_start();
  if (!$_SESSION['user']) {
      header('Location: /');
  }
  $sql = "SELECT * FROM orders";
  $res = mysqli_query($conn,$sql);
  if($res===false){
    echo mysqli_error($conn);
  }else{
    $orders = mysqli_fetch_all($res,MYSQLI_ASSOC);
  }
  require 'header.php';
 ?> 
        <div class="all">
        <div class="row">
            <div class="blocks2"><p class="names">Номер заказа</p></div>
            <div class="blocks2"><p class="names">Имя клиента</p></div>
            <div class="blocks2"><p class="names">Дата год / месяц / день</p></div>
            <div class="blocks3"><p class="names">Статус заявки</p></div>
            
        </div>
        <?php foreach ($orders as $order):?>
        <div class="row">
            <div class="blocks"><h2><a style="none" href="aboutorder.php?id=<?=$order['order_id'];?>"><?=$order['order_id'];?></a></h2></div>
            <div class="blocks"><p class="names"><?=$order['client_name'];?></p></div>
            <div class="blocks"><p class="names"><?=$order['accepted_date'];?></p></div>
            <div class="blocks1"><?=
             
             '';
              if($order['status']==='done'){
                echo'<p class="names"  style="color: green">Сделано</p>';
              }             
                   
              elseif ($order['status']==='implementation') {
               echo'<p class="names" style="color: grey">На реализаций</p>';
              }
              elseif ($order['status']==='notdone') {
               echo'<p class="names" style="color: red">Еще не рассмотрено</p>';
              }
              ?></div>
        </div>
        <?php endforeach; ?>
      </div>

      
       
       
       
<?php require 'footer.php'; ?>
