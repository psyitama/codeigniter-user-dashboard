<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="<?=base_url()?>">Regeddit</a>
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="<?=base_url()?>">Dashboard</a>
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

<div class="container  mt-3">
    <div class="row">
        <div class="col-md-4 p-3 text-white bg-dark rounded">
            <?=form_open('admin/add_user')?>
            <h3>Add a new user</h3>
            <p class="text-success text-center mb-0"><?=$this->session->userdata('success')?></p>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email">
                <span class="text-danger"><?=$this->session->flashdata('email_error')?></span>
            </div>
            <div class="form-group">
                <label for="email">First Name</label>
                <input type="text" class="form-control" placeholder="Enter first name" name="first_name">
                <span class="text-danger"><?=$this->session->flashdata('first_name_error')?></span>
            </div>
            <div class="form-group">
                <label for="email">Last Name</label>
                <input type="text" class="form-control" placeholder="Enter last name" name="last_name">
                <span class="text-danger"><?=$this->session->flashdata('last_name_error')?></span>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="password">
                <span class="text-danger"><?=$this->session->flashdata('password_error')?></span>
            </div>
            <div class="form-group">
                <label for="pwd">Confirm Password:</label>
                <input type="password" class="form-control" placeholder="Confirm password" name="confirm_password">
                <span class="text-danger"><?=$this->session->flashdata('confirm_password_error')?></span>
            </div>
            <div class="text-right">
                <input type="submit" class="btn btn-success mb-3" value="Create"></input>
            </div>
            </form>
        </div>

        <div class="col text-right">
            <a class="btn btn-primary" href="<?=base_url()?>">Return to Dashboard</a>
        </div>
    </div>
</div>
