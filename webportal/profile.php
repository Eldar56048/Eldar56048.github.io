<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
require 'header.php';
?>


    <form>
        <h2 class="name" style="margin: 10px 0;"><?= $_SESSION['user']['Surname'] ?></h2>
        <h2 style="margin: 10px 0;"><?= $_SESSION['user']['Name'] ?></h2>
        <a href="#"><?= $_SESSION['user']['Username'] ?></a>

        <a href="logout.php" class="logout">Выход</a>
    </form>

</body>
</html>