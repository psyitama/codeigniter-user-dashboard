<?php
if ($this->session->userdata('is_logged_in') != true) {
    redirect(base_url() . 'signin');
}
if ($this->session->userdata('user_level') != 'normal') {
    redirect(base_url() . 'admin/dashboard');
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
    <h1 class="mb-3">All users</h1>
    <table class="table table-hover">
        <thead class="bg-danger text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">created_at</th>
                <th scope="col">user_level</th>
            </tr>
        </thead>
        <tbody>
            <?php
foreach ($users as $user):
?>
            <tr>
                <th scope="row"><?=$user['id']?></th>
                <td>
                    <a href="<?=base_url() . 'users/show/' . $user['id']?>">
                        <?=$user['first_name'] . ' ' . $user['last_name']?>
                    </a>
                </td>
                <td><?=$user['email']?></td>
                <td><?=date_format(date_create($user['created_at']), "F j Y")?></td>
                <td>
                    <?php if ($user['id'] == $this->session->userdata('user_id')): ?>
                    <span class="text-warning">current user</span>
                    <?php
else:
    echo $user['user_level'];
endif;
?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
