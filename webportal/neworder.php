<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
require 'connect.php';


if ($_SERVER["REQUEST_METHOD"]=="POST") {
  $sql = "INSERT INTO orders(client_name,client_number,host_person,accepted_date,problem,status)
          VALUES ('".$_POST['client_name']."',
                  '".$_POST['client_number']."',
                  '".$_SESSION['user']['Name']."',
                  '".$_POST['accepted_date']."',
                  '".$_POST['problem']."',
                  'notdone')";
  $res = mysqli_query($conn,$sql);
  if($res===false){
    echo mysqli_error($conn);
  }else{
    $id = mysqli_insert_id($conn);
    echo "Inserted with id:$id";
  }

}
require "header.php";
?>
<div class="bari">
        <nav class="white2"></nav>
        <form  class="mard" method="POST">
            <input class="name1" type="text" name="client_name"  style="padding-left: 20px; width: 100%;" value required placeholder="Имя клиента" maxlength="100">
            <input class="name1" type="text" name="client_number" style="padding-left: 20px;width: 100%;" value required placeholder="Номер клиента" maxlength="100">
            <input class="name1" type="date" name="accepted_date" style="padding-left: 20px;width: 100%;" value required >
            <textarea class="name" type="text" name="problem" style="padding-left: 20px;padding-right:20px;width: 100%;" value required placeholder="Проблема: " maxlength="250"></textarea>
            <button type="submit" class="Send1" id="QWE">Добавить</button>
        </form>
        <nav class="white2"></nav>
    </div>
    
    </main>

  </body>
</html>
