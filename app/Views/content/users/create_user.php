<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>
<h2>Create Users</h2>


<?= form_open('users/create') ?>
    <label for="name">name</label>
    <input type="text" name="name" id="name">
    </br>
    <label for="name">email</label>
    <input type="email" name="email" id="email">
    </br>
    <label for="name">password</label>
    <input type="password" name="password" id="password">
    </br>
    <label for="name">confirm password</label>
    <input type="password" name="confirm_password" id="confirm_password">
    </br>
    <label for="number">phone</label>
    <input type="text" name="phone" id="phone">
    </br>
    <input type="submit" value="submit">
<?= form_close() ?>

<?= \Config\Services::validation()->listErrors() ?>

<?= $this->endSection() ?>

