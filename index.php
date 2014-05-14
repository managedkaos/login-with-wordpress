<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Logging in With WordPress</title>
        <!-- Bootstrap -->
        <link href="css/bria-myles.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <?php
        /* Turn off WP Themese and load the WP header file */
        /* Short and sweet */
        define('WP_USE_THEMES', false);
        require('./wordpress/wp-blog-header.php');
        ?>

        <div class="container ">
            <h1 class="jumbotron"><a href="http://localhost/loginwithwp/">Login With WordPress</a></h1>
        </div>

        <div class="container">
            <div class="col-md-4 col-md-offset-4">
                <?php
                if (is_user_logged_in()) {
                    ?>
                    <p>You&rsquo;re logged in as <strong><?php echo ucfirst($user_identity); ?></strong></p>
                    <?php
                } else {
                    echo '<p>Welcome! Please log in.</p>';
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form role="form" name="loginform2" id="loginform2" action="http://localhost/loginwithwp/wordpress/wp-login.php" method="post">
                                <div class="form-group">
                                    <label for="user_login">Username</label>
                                    <input type="text" class="form-control" style="border-radius:0px" name="log" id="user_login" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <label for="user_pass">Password</label>
                                    <input type="password" class="form-control" style="border-radius:0px" name="pwd" id="user_pass" placeholder="Password">
                                </div>
                                <input type="hidden" name="redirect_to" value="http://localhost/loginwithwp/" />
                                <input  type="submit" name="wp-submit" id="wp-submit" class="btn btn-sm btn-default" value="Log In" />
                            </form>
                        </div>
                    </div>
                    <p>Need an account?</p> <a href="http://localhost/loginwithwp/register.php" class="btn btn-sm btn-default">Register</a>
                <?php } ?>
            </div>
        </div>

        <?php if (is_user_logged_in()) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-offset-4 col-lg-6">
                        <div class="well profile">
                            <div class="col-col-sm-12">
                                <div class="col-xs-12 col-sm-8">
                                    <?php
                                    global $current_user;
                                    get_currentuserinfo();
                                    ?>

                                    <h2><?php echo ucfirst($current_user->display_name); ?></h2>
                                    <p><?php echo get_the_author_meta('description', $current_user->ID); ?></p>
                                </div>             
                                <div class="col-xs-12 col-sm-4 text-center">
                                    <figure>
    <?php $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($current_user->user_email))) . "?d=" . urlencode('') . "&s=" . 200; ?>
                                        <img src="<?php echo $grav_url ?>" alt="" class="img-circle img-responsive">;
                                    </figure>
                                </div>
                            </div>
                        </div>                 
                    </div>
                </div>
                <?php wp_loginout('http://localhost/loginwithwp/', 'true');
            }
            ?>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>

