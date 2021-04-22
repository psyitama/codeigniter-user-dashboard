<?php
date_default_timezone_set("Asia/Manila");
function time_ago($date)
{
    $currentDate = date("Y-m-d H:i:s");

    $datetime1 = strtotime($date);
    $datetime2 = strtotime($currentDate);

    $time = $datetime2 - $datetime1;

    if ($time < 60) {
        //minute ago
        return floor($time / 60) . ' minute ago';
    }if ($time > 60 && $time < 3599) {
        //minutes ago
        return floor($time / 60) . ' minutes ago';
    } else if ($time > 3599 && $time <= 7164) {
        //hour ago
        return floor($time / 3600) . ' hour ago';
    } else if ($time > 7164 && $time <= 86364) {
        //hours ago
        return floor($time / 3600) . ' hours ago';
    } else if ($time > 86400 && $time < 171936) {
        //day ago
        return floor($time / 86400) . ' day ago';
    } else if ($time > 171936 && $time < 603936) {
        //days ago
        return floor($time / 86400) . ' days ago';
    } else if ($time > 603936) {
        //if post exceed 7 days ago
        $date = date_create($date);
        return date_format($date, "F j Y");
    }
}
?>
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
                <a class=" nav-link font-weight-bold" href="<?=base_url() . 'users/logout'?>">Log off</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-2">
    <div class="row justify-content-md-center ">
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <img src="<?=base_url() . 'assets/image/user.png'?>" class="card-img-top img-thumbnail" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Personal Information</h5>
                    <p class="card-text">
                        <span class="font-weight-bold">Name: </span>
                        <?=$user['first_name'] . ' ' . $user['last_name']?>
                    </p>
                    <p class="card-text">
                        <span class="font-weight-bold">User ID: </span>
                        <?=$user['id']?>
                    </p>
                    <p class="card-text">
                        <span class="font-weight-bold">Email address: </span>
                        <?=$user['email']?>
                    </p>
                    <p class="card-text">
                        <span class="font-weight-bold">Description: </span>
                        <?=$user['description']?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container border-bottom-2 mt-3">
    <?=form_open('posts/post_message')?>
    <label class="font-weight-bold" for="message">
        LEAVE A MESSAGE FOR
        <?=strtoupper($user['first_name'])?>
    </label>
    <input type="hidden" name="receiver_id" value="<?=$user['id']?>">
    <input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id')?>">
    <textarea class="form-control" name="message" id="message" rows="3" placeholder="Write a message"></textarea>
    <div class="text-right mt-2 mb-5">
        <input type="submit" class="btn btn-success" value="Post">
    </div>
    </form>
</div>

<?php foreach ($messages as $message): ?>
<div class="container">
    <div class="row">
        <div class="col-12 ">

            <!-- who wrote message -->
            <div class="row">
                <div class="col-6 mr-auto">
                    <p class="text-danger font-weight-bold">
                        <?php
if ($message['from_id'] == $this->session->userdata('user_id')):
    echo $message['first_name'] . ' ' . $message['last_name'];
else:
?>
                        <a href=""><?=$message['first_name'] . ' ' . $message['last_name']?> </a>
                        <?php endif?>
                    </p>

                </div>
                <div class="col-6 text-right">
                    <p class="text-success font-weight-bold"><?=time_ago(($message['created_at']))?></p>
                </div>
            </div>

            <p class="border border-dark rounded py-3 px-2"><?=$message['message']?></p>
        </div>
        <?php foreach ($comments as $comment): ?>
        <div class="col-11 ml-auto">
            <?php if ($comment['message_id'] == $message['id']): ?>
            <div class="row">
                <div class="col-6 mr-auto">
                    <p class="text-success font-weight-bold">
                        <?php
if ($comment['user_id'] == $this->session->userdata('user_id')):
    echo $comment['first_name'] . ' ' . $comment['last_name'];
else:
?>
                        <a href=""><?=$comment['first_name'] . ' ' . $comment['last_name']?> </a>
                        <?php
endif;
?>
                    </p>
                </div>
                <div class="col-6 text-right">
                    <p class="text-success font-weight-bold"><?=time_ago(($comment['created_at']))?></p>
                </div>
            </div>
            <p class="border border-dark rounded py-3 px-2"><?=$comment['comment']?></p>
            <?php endif;?>
        </div>
        <?php endforeach;?>
        <div class="col-11 mt-3 ml-auto">
            <?=form_open('posts/post_comment')?>
            <div class="form-group">
                <input type="hidden" name="receiver_id" value="<?=$user['id']?>">
                <input type="hidden" name="message_id" value="<?=$message['id']?>">
                <input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id')?>">
                <textarea class="form-control" name="comment" id="message" rows="1"
                    placeholder="Write a comment"></textarea>
            </div>
            <div class="text-right mt-md-n2 ">
                <input type="submit" class="btn btn-success" value="Comment">
            </div>
            </form>
        </div>

    </div>
</div>
<?php endforeach?>
