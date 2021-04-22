<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-3">
    <div class="container">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="<?=base_url()?>">Regeddit</a>
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>">Home</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class=" nav-link font-weight-bold" href="<?='signin'?>">Sign in</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="col-md-4 p-3 mb-3 text-white bg-dark rounded">
        <?=form_open('users/create')?>
        <h3>Register</h3>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email">
            <span class="text-danger"><?=$this->session->flashdata('email')?></span>
        </div>
        <div class="form-group">
            <label for="email">First Name</label>
            <input type="text" class="form-control" placeholder="Enter first name" name="first_name">
            <span class="text-danger"><?=$this->session->flashdata('first_name')?></span>
        </div>
        <div class="form-group">
            <label for="email">Last Name</label>
            <input type="text" class="form-control" placeholder="Enter last name" name="last_name">
            <span class="text-danger"><?=$this->session->flashdata('last_name')?></span>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="password">
            <span class="text-danger"><?=$this->session->flashdata('password')?></span>
        </div>
        <div class="form-group">
            <label for="pwd">Confirm Password:</label>
            <input type="password" class="form-control" placeholder="Confirm password" name="confirm_password">
            <span class="text-danger"><?=$this->session->flashdata('confirm_password')?></span>
        </div>
        <div class="text-right">
            <input type="submit" class="btn btn-success mb-3" value="Register"></input>
        </div>
        <a href="<?='signin'?>">Already have an account? Login</a>
        </form>
    </div>
</div>

<?=($this->session->flashdata('success'))?>
