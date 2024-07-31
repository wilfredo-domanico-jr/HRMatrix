<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/app.css'); ?>?v=<?php echo time(); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('css/header.css'); ?>?v=<?php echo time(); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('css/sidenav.css'); ?>?v=<?php echo time(); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('css/main.css'); ?>?v=<?php echo time(); ?>" type="text/css" />
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="icon" href="<?php echo base_url('images/logo.png'); ?>" type="image/x-icon"/>

    <title>HRIS</title>
</head>

<body>

    <header class="header">
        <div class="row px-4">
            <div class="col-3">
                <img src="<?php echo base_url('images/logo.png'); ?>" id="logo-img" alt="App Logo">
            </div>
            <div class="col-5 header-search">
                <div class="header-search-bar">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    <input type="text" placeholder="Search" class="search-input">
                </div>
            </div>
            <div class="col-4">
                <div class="far-right">
                    <i class="fa-solid fa-bell icons"></i>
                    <img src="<?php echo base_url('images/logo.png'); ?>" alt="Avatar" class="avatar">
                    <span><?php echo session()->get('name'); ?></span>
                </div>
            </div>
        </div>
    </header>

    <nav class="side-nav container">
    <select class="form-select mb-3">
            <option selected disabled>Search</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>

        <?php

            // Get the full URI string
            $fullUri = uri_string();

            // Split the URI into parts
            $uriParts = explode('/', $fullUri);

            $page = $uriParts[0];

            ?>

        <a href="<?= base_url('/home')?>" class="nav-item <?= (base_url('/home') === base_url($page)) ? 'active' : '' ?>"><i class="fas fa-home"></i> Home</a>
        <a href="<?= base_url('/request-forms')?>" class="nav-item <?= (base_url('/request-forms') === base_url($page)) ? 'active' : '' ?>"><i class="fa-solid fa-file-waveform"></i> Request Forms</a>

    </nav>

    <main class="main-content">



