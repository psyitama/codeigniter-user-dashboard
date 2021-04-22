<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="<?=base_url() . 'dashboard'?>">Regeddit</a>
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url() . 'dashboard'?>">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?=base_url() . 'users/edit'?>">Profile</a>
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
    <h1>Edit Profile</h1>
    <div class="row">
        <div class="col-md-5 mb-5 mr-auto p-3 text-white bg-dark rounded">
            <?=form_open('users/update_user_info')?>
            <h3>Edit Informations</h3>
            <input type="hidden" name="action" value="change_personal_info">
            <input type="hidden" name="id" value="<?=$user['id']?>">
            <div class="form-group">
                <label>Email address:</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email"
                    value="<?=$user['email']?>">
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" placeholder="Enter first name" name="first_name"
                    value="<?=$user['first_name']?>">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Enter last name" name="last_name"
                    value="<?=$user['last_name']?>">
            </div>
            <div class="text-right">
                <input type="submit" class="btn btn-success mb-3" value="Save"></input>
            </div>
            </form>
        </div>
        <div class="col-md-5 mb-5 ml-auto p-3 text-white bg-dark rounded">
            <?=form_open('users/update_user_info')?>
            <h3>Change Password</h3>
            <input type="hidden" name="action" value="change_password">
            <input type="hidden" name="id" value="<?=$user['id']?>">
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="password">
            </div>
            <div class="form-group">
                <label for="pwd">Confirm Password:</label>
                <input type="password" class="form-control" placeholder="Confirm password" name="confirm_password">
            </div>
            <div class="text-right">
                <input type="submit" class="btn btn-success mb-3" value="Update Password"></input>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col mt-3">
            <?=form_open('users/update_user_info')?>
            <div class="form-group">
                <label class="font-weight-bold" for="message">Edit Description</label>
                <input type="hidden" name="action" value="change_description">
                <input type="hidden" name="id" value="<?=$user['id']?>">
                <textarea class="form-control" name="description" id="message" rows="3">
<?=$user['description']?>
                    </textarea>
            </div>
            <div class="text-right mt-md-n2 ">
                <input type="submit" class="btn btn-success" value="Post">
            </div>
            </form>
        </div>
    </div>
</div>
