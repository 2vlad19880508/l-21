<?php
require_once '../load.php';

$userRepository = new \App\Repositories\UserRepository();
$users =  $userRepository->getList();

$phones = new App\Repositories\PhoneRepository();
$phones = $phones->getList();

echo '<a href="create.php">Create user</a>';
echo '<table border="1">';
echo '<tr>';
echo '<th>Fist Name</th>';
echo '<th>Last Name</th>';
echo '<th>Email</th>';
echo '<th>Create</th>';
echo '<th>Action</th>';
echo '</tr>';

foreach ($users as $user) {
    echo '<tr>';
    echo '<td>' . $user['first_name'] . '</td>';
    echo '<td>' . $user['last_name'] . '</td>';
    echo '<td>' . $user['email'] . '</td>';
    echo '<td>' . $user['creat_at'] . '</td>';
    echo '<td>';
    echo '<a href="update.php?id='. $user['id'] .'">Update</a> ';
    echo '<a href="delete.php?id='. $user['id'] .'">Delete</a>';
    echo '</td>';
    echo '</tr>';
}
echo '</table>';

echo '<table border="1">';
echo '<tr>';
echo '<th>Phone</th>';
echo '</tr>';
echo '<tr>';
foreach ($phones as $phone) {
    echo '<tr>';
    echo '<td>' . $phone['phone'] . '</td>';
    echo '</td>';
    echo '</tr>';
}
echo '</table>';

