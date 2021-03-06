<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="<?=base_url()?>">Regeddit</a>
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?=base_url() . 'users/edit'?>">Profile</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class=" nav-link font-weight-bold" href="<?='signin'?>">Log off</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <h1>Edit Profile</h1>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-primary mt-2" href="<?=base_url()?>">Return to Dashboard</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-5 mr-auto p-3 text-white bg-dark rounded">
                <?=form_open('admin/update_user_overall')?>
                <h3>Edit Informations</h3>
                <input type="hidden" name="action" value="change_overall">
                <input type="hidden" name="id" value="<?=$user['id']?>">
                <div class="form-group">
                    <label>Email address:</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="email"
                        value="<?=$user['email']?>">
                    <span class="text-danger"><?=$this->session->flashdata('email_error')?></span>
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="Enter first name" name="first_name"
                        value="<?=$user['first_name']?>">
                    <span class="text-danger"><?=$this->session->flashdata('first_name_error')?></span>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Enter last name" name="last_name"
                        value="<?=$user['last_name']?>">
                    <span class="text-danger"><?=$this->session->flashdata('last_name_error')?></span>
                </div>
                <div class="form-group">
                    <label>User Level</label>
                    <select name="user_level" class="custom-select">
                        <option selected disabled>Choose...</option>
                        <option <?php if ($user['user_level'] == 'normal') {echo "selected";}?> value="normal">
                            Normal
                        </option>
                        <option <?php if ($user['user_level'] == 'admin') {echo "selected";}?> value="admin">
                            Admin
                        </option>
                    </select>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-success mb-3" value="Save"></input>
                </div>
                </form>
            </div>
            <div class="col-md-5 mb-5 ml-auto p-3 text-white bg-dark rounded">
                <?=form_open('admin/update_user_overall')?>
                <h3>Change Password</h3>
                <input type="hidden" name="action" value="change_password">
                <input type="hidden" name="id" value="<?=$user['id']?>">
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
                    <input type="submit" class="btn btn-success mb-3" value="Update Password"></input>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col mt-3">
                <?=form_open('admin/update_user_overall')?>
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
