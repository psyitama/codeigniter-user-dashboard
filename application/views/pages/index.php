<?php
if ($this->session->userdata('is_logged_in') == true) {
    if ($this->session->userdata('user_level') == 'admin') {
        redirect('dashboard/admin');
    } else if ($this->session->userdata('user_level') == 'normal') {
        redirect('dashboard');
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
    <div class="jumbotron mt-3">
        <h1>Bootstrap Tutorial</h1>
        <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile-first projects on
            the web.</p>
        <button type="button" class="btn btn-primary">Start</button>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h6>asdsad</h6>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo vero voluptatem consequuntur culpa eligendi
                et optio dolore cupiditate architecto. Molestiae rem debitis harum voluptatem excepturi mollitia
                incidunt similique esse ut.</p>
        </div>
        <div class="col-md-4">
            <h6>asdsad</h6>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo vero voluptatem consequuntur culpa eligendi
                et optio dolore cupiditate architecto. Molestiae rem debitis harum voluptatem excepturi mollitia
                incidunt similique esse ut.</p>
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">Bold text.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo vero voluptatem consequuntur culpa eligendi
                et optio dolore cupiditate architecto. Molestiae rem debitis harum voluptatem excepturi mollitia
                incidunt similique esse ut.</p>
        </div>
    </div>
</div>
