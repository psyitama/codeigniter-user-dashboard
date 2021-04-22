<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-5">
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
                <a class=" nav-link font-weight-bold" href="<?='register'?>">Register</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="col-md-3 p-3 text-white bg-dark rounded">
        <?=form_open('users/login')?>
        <h3>Sign-in</h3>
        <span class="text-danger"><?=$this->session->flashdata('login_error');?></span>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email"
                value="<?=$this->session->flashdata('email')?>">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="password">
        </div>
        <div class="text-right">
            <input type="submit" class="btn btn-success mb-3" value="Sign in"></input>
        </div>
        <a href="<?='register'?>">Don't have an account? Register</a>
        </form>
    </div>
</div>
