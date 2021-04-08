<?php foreach ($users as $user) : ?>
    <h5><?= $user->name ?></h5>
    <p><?= $user->email ?></p>
<?php endforeach; ?>