<?php
    $name = $email = $subject = $message = $errortext = $language = "";

    $success = false;

    if ( isset($_POST['email']) ) {


        $name = clean_input( $_POST['name'] );
        $email = clean_input( $_POST['email'] );
        $subject = clean_input( $_POST['subject'] );
        $message = clean_input( $_POST['message'] );
        $language = clean_input( $_POST['language'] );
        $headers = array();


        //$headers[] = "MIME-Version: 1.0";
        //$headers[] = "Content-type: text/plain; charset=iso-8859-1";
        $headers[] = "From:". $name . "<admin@codehelp.scsugroups.com>";
        $headers[] = "Reply-To: " . $name . "<" . $email . ">";
        $headers[] = "From: " . $email;
        $headers[] = "Subject: " . "CodeHelp::" . $subject . "(" . $language . ")";
        $headers[] = "X-Mailer: PHP/" . phpversion();

        $success = mail(
            "nerd@codehelp.scsugroups.com",
            "CodeHelp::" . $subject . "(" . $language . ")",
            $message,
            implode("\r\n", $headers)
        );

    } else {
        $errortext = "Oops! Something went wrong...";
    }

    function clean_input($data) {
        $data = trim( $data );
        $data = stripslashes( $data );
        $data = htmlspecialchars( $data );
        return $data;
    }

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeHelp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
        .header {
            color: #c10b12;
            font-size: 27px;
            padding: 10px;
        }
        body {
            background-color: rgba(255, 255, 255, 0);
        }
        .container {
            background-color: rgba(255, 255, 255, 0);
        }
        html {
            background: #fff no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

    </style>
    </head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal">
                    <fieldset>
                        <legend class="text-center header">
                            <?php
                                if ($errortext != "" || $success == false) {
                                    echo $errortext;
                                } else {
                                    echo "Success!";
                                }
                            ?>
                        </legend>
                        <h3 class="text-center">Here's what you sent us...</h3>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name:</label>
                            <div class="col-md-8 col-md-offset-2">
                                <p class="form-control-static"><?php echo $name ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email:</label>
                            <div class="col-md-8 col-md-offset-2">
                                <p class="form-control-static"><?php echo $email ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Class:</label>
                            <div class="col-md-8 col-md-offset-2">
                                <p class="form-control-static"><?php echo $subject ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Language:</label>
                            <div class="col-md-8 col-md-offset-2">
                                <p class="form-control-static"><?php echo $language ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Message:</label>
                            <div class="col-md-8 col-md-offset-2">
                                <p class="form-control-static"><?php echo $message ?></p>
                            </div>
                        </div>
                    </fieldset>
                    <h3 class="text-center">...We'll contact you shortly!</h3>
                </form>
            </div>
            <?php include("templates/include/createdby.php"); ?>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</html>