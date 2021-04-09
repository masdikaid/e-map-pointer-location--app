<h1>User List</h1>
<?php foreach ($users as $user) : ?>
    <p><?= $user->name ?></p>
    <p><?= $user->email ?></p>
<?php endforeach; ?>