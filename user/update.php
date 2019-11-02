<?php
require_once '../load.php';

$userRepository = new \App\Repositories\UserRepository();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = $userRepository->get($id);

    echo '<form name="update" method="post" action="update.php">
    <input type="hidden" name="id" value="'. $user['id'] .'">
    <input type="text" name="first_name" value="'. $user['first_name'] .'" placeholder="Fist Name">
    <br>
    <input type="text" name="last_name" value="'. $user['last_name'] .'" placeholder="Last Name">
    <br>
    <input type="text" name="email" value="'. $user['email'] .'" placeholder="Email">
    <br>
    <input type="submit" value="Save">
    </form>';
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $user = $userRepository->get((int) $id);

    $user['first_name'] = $_POST['first_name'];
    $user['last_name'] = $_POST['last_name'];
    $user['email'] = $_POST['email'];

    $userRepository->update((int) $id, $user);

    header("Location:  /l-21/user/show.php");
}
