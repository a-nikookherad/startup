<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <?php 
        if(!function_exists('get_title')){
            function get_title(){
                echo 'test title';
            }
        }
    ?>
    <title><?php  get_title(); ?></title>
    <meta charset="utf-8">
    <base href="http://localhost:8888" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="this site for template">
    <meta name="keywords" content="test site , pattern site , schema site ,  نمونه سایت,سایت نمونه">
    <link rel="shortcut icon" href="<?php  echo base_url; ?>asset\images\favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url; ?>asset/font/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>asset/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>asset/style.css">
</head>
<body>
<div id="container" class="container">
    <header class="">
        <img src="<?php echo base_url; ?>asset/them psd/pease of them/images/header.gif" width="100%" height="171" alt="header"/>
    </header>
    <?php include_once 'navbar.php'; ?>

    <div id="main_content" class="container">

        <div id="content" class="fav_color ">
