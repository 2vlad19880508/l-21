<?php
require_once '../load.php';

$phone = new \App\Repositories\PhoneRepository();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $phone = $phone->get($id);

    if (!empty($phone)) {
        echo '<form name="delete" method="post" action="delete.php">
        <input type="hidden" name="id" value="'. $phone['id'] .'">
         Вы действитьельно хотете удалить пользоватиеля: '.
            $phone['first_name'] .' '. $phone['last_name'] .' ?
         <input type="submit" value="Удалить">
         <a href="show.php">Назад</a>
        </form>';
    } else {
        echo 'Вы пытаетесь удалить не существующего пользователя! 
            <a href="show.php">Вернутся назад.</a>';
    }
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $phone->delete($id);

    header("Location:  /l-21/user/show.php");
}
