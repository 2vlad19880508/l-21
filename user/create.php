<?php
require_once '../load.php';

$userRepository = new \App\Repositories\UserRepository();

if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])) {
    $user['first_name'] = $_POST['first_name'];
    $user['last_name'] = $_POST['last_name'];
    $user['email'] = $_POST['email'];

    $userRepository->create($user);

    header("Location: /l-21/user/show.php");
}

echo '<form name="create" method="post" action="create.php">
    <input type="text" name="first_name" value="" placeholder="Fist Name">
    <br>
    <input type="text" name="last_name" value="" placeholder="Last Name">
    <br>
    <input type="text" name="email" value="" placeholder="Email">
    <br>
    <input type="submit" value="Save">
    </form>';