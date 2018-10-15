<?php
if ( !isset($_SESSION)){
session_start();
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <title>Banking | Management System</title>
    <base href="http://mutualfriends.ml/">
    <?php
        if (!isset($_SESSION['email'])){
            echo "<script>  window.location ='views/admin/auth/index.php'</script>";
        }
    ?> 
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="models/admin/css/normalize.css">
    <link rel="stylesheet" href="models/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="models/admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="models/admin/css/themify-icons.css">
    <link rel="stylesheet" href="models/admin/css/flag-icon.min.css">
    <link rel="stylesheet" href="models/admin/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="models/admin/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="models/admin/css/bootstrap-select.less"> -->    
    <!-- Search filter --> 

    <link rel="stylesheet" href="models/admin/scss/style.css">
    <link rel="stylesheet" href="models/admin/css/lib/chosen/chosen.min.css">
    <link href="models/admin/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="views/admin/users/index.php"><img src="uploads/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="views/admin/users/index.php"><img src="uploads/logo.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <li class="active">
                        <a href="views/admin/users/all-members.php"> <i class="menu-icon fa fa-users"></i>All Menber </a>
                    </li>                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-money"></i>Billing</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-usd"></i><a href="views/admin/billing/add-bill.php">Add Bill</a></li>
                            <li><i class="menu-icon fa fa-indent"></i><a href="views/admin/billing/index.php">Billing List</a></li>                            
                        </ul>
                    </li>                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gear"></i>Admin Section</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sitemap"></i><a href="views/admin/auth/user-access.php">Access Penel</a></li>
                            <li><i class="menu-icon fa fa-bolt"></i><a href="views/admin/auth/site-config.php">Site Config</a></li>                            
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
    <!-- Left Panel -->
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">                   
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="uploads/<?php if (isset ($_SESSION['user_image'])){echo $_SESSION['user_image'];} else{echo $_SESSION['image']; } ?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="views/admin/users/profile.php/?=<?php echo $_SESSION['id'];?>"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="views/admin/auth/logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>    
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->
        <!-- <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="content mt-3"> 
			<!-- ################################## -->