<?php
if(!isset($_SESSION)){
    session_start();
}
include_once '../../../vendor/autoload.php';
 $auth = new \App\admin\auth\Auth();
 $users = new \App\admin\Users();
if(isset($_POST['submit'])){   
    $auth->set($_POST)->login();    
    $users->set($_POST)->login();
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Banking | Login Panel</title>
        <base href="http://localhost/banking/">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="models/admin/css/bootstrap.min.css">
        <link rel="stylesheet" href="models/admin/css/font-awesome.min.css">
        <link rel="stylesheet" href="models/admin/css/style.css">
        <link rel="stylesheet" href="models/admin/css/responsive.css">
        
    </head>
    <body>
        <div class="viewport-area" style="background: url('uploads/bg.jpg') no-repeat center center / cover;;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="launch-logo">
                            <!-- <a href="#"><i class="fa fa-rocket"></i>Launch</a> -->
                            <img class="main-logo" src="uploads/main_logo.png" alt="Mutual Friends" />
                            <img class="mobile-logo" src="uploads/mobile_logo.png" alt="Mutual Friends" />
                        </div>
                        <div class="launch-login">
                            <ul>
                                <li><button type="button" class="btn login-btn" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-sign-in"></i>Login</button></li>
                                <li><button type="button" class="btn signup-btn" data-toggle="modal" data-target="#exampleModalCenter2">Join Us</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="viewport-content">                            
                            <?php
                               if(isset($_SESSION['login_error'])){
                                    echo '<div class="alert alert-success">'
                                            .$_SESSION['login_error'].
                                        '</div>';
                                    unset($_SESSION['login_error']);
                                }
                            ?> 
                            <?php
                               if(isset($_POST['insert'])){
                                    echo '<div class="alert alert-success">'
                                            .$_SESSION['user_insert'].
                                        '</div>';
                                    unset($_SESSION['user_insert']);
                                }
                            ?>                             
                            <h1>Mutual Friends Multipurpose Limited</h1>
                            <h4>We born to explore the whole world by our talent, so get ready!</h4>
                            <a href="#" class="btn" data-toggle="modal" data-target="#exampleModalCenter3">Contact Us</a>
                            <p>Unity is strength</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                            <div class="form-group">
                                <label for="">User ID</label>
                                <input type="text" name="email" required="1" class="form-control"  aria-describedby="emailHelp" placeholder="Enter User ID">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" required="1" class="form-control"  placeholder="Your Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <button type="submit" name="submit" class="btn signin-btn">LogIn</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- SignUp Modal -->
        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Join Now</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="views/admin/users/store.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="reg-frm">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="exampleInputEmail1">Full Name <sup>*</sup></label>
                                        <input type="text" required="1" name="name" class="form-control" placeholder="Your Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Email Address</label>
                                        <input type="email" required="1" name="email" class="form-control" placeholder="Email Address">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Password <sup>*</sup></label>
                                        <input type="password" required="1" name="password" class="form-control" placeholder="Password">
                                    </div>                                   
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Phone Number <sup>*</sup></label>
                                        <input type="text" required="1" name="phone" class="form-control" placeholder="Phone Number">
                                    </div>                                    
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">NID Number <sup>*</sup></label>
                                        <input type="text" required="1" name="nid_number" class="form-control" placeholder="NID Number">
                                    </div>                                                                       
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Your Address <sup>*</sup></label>
                                        <input type="text" required="1" name="address" class="form-control" placeholder="Your Address">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Image <sup>*</sup></label>
                                        <input type="file" required="1" name="image" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="insert" class="btn reg-btn">Sign Up</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Us Modal -->
        <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="fmr-content text-center">
                                <h3>Contact us</h3>
                                <h4>Have any questions? Send us a message.</h4>
                                <ul>
                                    <li><i class="fa fa-phone"></i> +8801845720092</li>
                                    <li><i class="fa fa-envelope"></i> mutualfriendsml@gmail.com</li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Your Name*">
                            </div>
                            <div class="form-group">
                                <input type="num" class="form-control"  placeholder="Phome Number*">
                            </div>
                            <div class="form-group">
                                <textarea rows="4" name="message" class="form-control"  placeholder="Message*"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="num" class="form-control"  placeholder="Antispam Question: 7+3 = ?">
                            </div>
                            <button type="submit" class="btn send-btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="models/admin/js/vendor/jquery-2.1.4.min.js"></script>
        <script src="models/admin/js/popper.min.js"></script>
        <script src="models/admin/js/popper.js"></script>
        <script src="models/admin/js/bootstrap.min.js"></script>
        <script src="models/admin/js/main.js"></script>
    </body>
</html>