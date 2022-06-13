<?php
session_start();
$_SESSION['name'] = 'Danish';
$name = $_SESSION['name'];
?>

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AutumnBurg</title>    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<style>
    .brand:hover {
        background: rgb(255,47,5)!important; 
        background: linear-gradient(160deg, rgba(255,47,5,1) 26%, rgba(250,221,14,1) 90%)!important ;
    }

    .brand{
        background:#26a69a !important; 
    }

    .brand-text{
        color:#26a69a !important;    
        #cbb09c 
    }

    form{
        max-width : 460px;
        margin: 20px auto;
        padding:20px
    }

    .burgpic{
        width:100px;
        margin:40px auto -30px;
        display:block;
        position: relative;
        top: -20px;
    }

</style>

</head>
<nav class="white z-depth-0">
    <div class="container">
        <a href="index.php" class ="brand-logo brand-text left">AutumnBerg</a>
        <ul id='nav-mobile' class='right hide-small-and-down'>
        <li class='grey-text'>Hello, <?php echo htmlspecialchars($name); ?></li>
        <li><a href='addburger.php' class="btn brand z-depth-0">Add burgers</a></li>
        </ul>    
    </div>
</nav>
<body class="grey lighten-3">
