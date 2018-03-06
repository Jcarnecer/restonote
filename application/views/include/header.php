<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        <link rel="shortcut icon" href="payakapps.com/assets/images/favicon.png" type="image/x-icon">
               
        <title>Bulletin Board</title>


        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Slabo+27px">
        
        <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/flavored-reset-and-normalize.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.min.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/styles.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/task.css'); ?>" />     
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/cork.css'); ?>" />
        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '137684347031781'); 
        fbq('track', 'PageView');
        </script>
        <noscript>
        <img height="1" width="1" 
        src="https://www.facebook.com/tr?id=137684347031781&ev=PageView
        &noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->
    </head>
    <body>

        <div id="sidebar" style="overflow-y: auto;">

            <!-- sidebar menu start-->
            <div id="nav-icon-close" class="custom-toggle">
                <span></span>
                <span></span>
            </div>

            <ul class="sidebar-menu">		

                <li class="">
                    <a class="font-weight-bold text-warning" href="#tutorialModal" data-toggle="modal">
                        <i class="fa fa-star" aria-hidden="true"></i>
                            <span>Get Started with Bulletin Board</span>
                    </a>
                </li>

                <li class="">
                    <a class="task-create" href="#searchTaskModal" data-toggle="modal">
                        <i class="fa fa-search" aria-hidden="true"></i>
                            <span>Search</span>
                    </a>
                </li>
                
                <li class="">
                    <a class="" href="<?= LOGOUT_URL ?>">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>

        <div class="main-content h-100">

            <div class="topbar">
                <nav class="navbar navbar-custom clearfix">
                    <div id="nav-icon-open" class="custom-toggle hidden-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <a class="navbar-brand" href="<?= base_url('tasks'); ?>">Bulletin Board</a>

                    <span class="ml-auto">
                        <a href="#searchTaskModal" data-toggle="modal"><i class="fa fa-search"></i> Search</a>
                        <a href="#" data-toggle="popover" data-placement="bottom"  data-content="<?= $email ?>" data-trigger="hover">
                            <!-- <i class="fa fa-user-circle"></i> <?= $user_name ?> -->
                            <img class="img-avatar" src="<?= $avatar_url ?>"> <?= $user_name ?>
                        </a>
                    </span>
                </nav>
            </div>

            <div class="inner-content h-100">
            