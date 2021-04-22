<?php
if ($this->session->userdata('is_logged_in') != true) {
    redirect(base_url() . 'signin');
}
if ($this->session->userdata('user_level') != 'admin') {
    redirect(base_url() . 'dashboard');
}
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="<?=base_url() . 'dashboard'?>">Regeddit</a>
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?=base_url() . 'dashboard'?>">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url() . 'users/edit'?>">Profile</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class=" nav-link font-weight-bold" href="<?=base_url() . 'users/logout'?>">Log off</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h1>All users</h1>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-primary mt-2" href="<?=base_url() . 'users/new'?>">Add new</a>
        </div>
    </div>

    <table class="table table-hover">
        <thead class="bg-danger text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">created_at</th>
                <th scope="col">user_level</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <th scope="row"><?=$user['id']?></th>
                <td>
                    <a
                        href="<?=base_url() . 'users/show/' . $user['id']?>"><?=$user['first_name'] . ' ' . $user['last_name']?></a>
                </td>
                <td><?=$user['email']?></td>
                <td><?=date_format(date_create($user['created_at']), "F j Y")?></td>
                <td><?=$user['user_level']?></td>
                <td>
                    <?php if ($user['id'] == $this->session->userdata('user_id')): ?>
                    <span class="text-warning">current user</span>
                    <?php
else:
?>
                    <a href="<?=base_url() . 'users/edit/' . $user['id']?>">edit</a>
                    |
                    <a href="<?=base_url() . 'users/remove/' . $user['id']?>">remove</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
