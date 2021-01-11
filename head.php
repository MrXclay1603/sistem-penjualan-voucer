<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>BISMILLAHPONSEL-Kisaran</title>
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="Assets/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="Assets/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
    body {
        margin-top: 70px;
    }

    .modalDialog {
        position: fixed;
        font-family: Arial, Helvetica, sans-serif;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.8);
        z-index: 99999;
        opacity: 0;
        transition: opacity 200ms ease-in;
        pointer-events: none;
    }

    .modalDialog:target {
        opacity: 1;
        pointer-events: auto;
    }

    .modalDialog>div {
        width: 400px;
        position: relative;
        margin: 10% auto;
        padding: 5px 20px 13px 20px;
        border-radius: 10px;
        background: #fff;
        background: linear-gradient(#fff, #aaa);
    }

    .close:hover {
        background: #00d9ff;
    }

    .close {
        background: #606061;
        color: #FFFFFF;
        line-height: 25px;
        position: absolute;
        text-align: center;
        top: -10px;
        right: -12px;
        width: 24px;
        text-decoration: none;
        font-weight: bold;
        border-radius: 12px;
        box-shadow: 1px 1px 3px #000;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }
    </style>
</head>

<body>
<div class="container">
    <!-- Fixed navbar -->
        <div class="navbar-header-">
              <?php if (isset($_SESSION['username'])) { ?>
                  <p align="right">Anda masuk sebagai <strong><?=$_SESSION['username']?></strong> | <?=$_SESSION['ket']?></p>
            <?php  } ?>

        </div>
        <!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="index.php?page=utama">SISTEM <span>PENJUALAN</span> VOUCER</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="?page=utama">Home</a></li>

                <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 1) { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master Data <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?page=datavoucer&actions=tampil">Input Data Voucer</a></li>
                        <li><a href="?page=kategorivoucer&actions=tampil">Kategori Voucer</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <!-- <li><a href="?page=penjualan&actions=report">Laporan Arsip</a></li> -->
						<li><a href="?page=penjualann&actions=report">Laporan Penjualan Voucer</a></li>
                    </ul>
                </li>
                
                <li><a href="?page=user&actions=tampil">User</a></li>
                <!-- <li><a href="?page=diary&actions=tampil">My Diary</a></li> -->
                <?php } ?>

                


                <li><a href="index.php?page=about&actions=tampil">About</a></li>
                <li><a href="index.php?page=kontak&actions=tampil">Contact</a></li>
                <li><a href="checkout.php">Checkout</a></li>
               
                
                
                
                <?php if (isset($_SESSION['username'])) { ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php } else { ?>
                <li><a href="index.php?page=login&actions=admin">Login</a></li>
                <?php } ?>

                

            </ul>
        </div>
    </div>
</nav>


</div>
