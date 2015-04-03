<?php
    $name = $email = $subject = $message = $errortext = "";
    $success = false;

    if ( isset($_POST['email']) ) {


        $name = clean_input( $_POST['name'] );
        $email = clean_input( $_POST['email'] );
        $subject = clean_input( $_POST['subject'] );
        $message = clean_input( $_POST['message'] );
        $headers = array();


        //$headers[] = "MIME-Version: 1.0";
        //$headers[] = "Content-type: text/plain; charset=iso-8859-1";
        $headers[] = "From:". $name . "<admin@codehelp.scsugroups.com>";
        $headers[] = "Reply-To: " . $name . "<" . $email . ">";
        $headers[] = "From: " . $email;
        $headers[] = "Subject: " . "CodeHelp::" . $subject;
        $headers[] = "X-Mailer: PHP/" . phpversion();

        $success = mail(
            "nerd@codehelp.scsugroups.com",
            "CodeHelp::" . $subject,
            $message,
            implode("\r\n", $headers)
        );

    } else {
        $errortext = "Oops! Something went wrong...";
    }

    function clean_input($data) {
        //return htmlspecialchars( stripslashes( trim($data) ) );
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
            background: url("img/CodeHelpBG.jpg") no-repeat center center fixed;
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
                <form class="form-horizontal" method="post">
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
                        <h3 class="text-left">Here's what you sent us...</h3>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <input id="name" name="name" type="text" placeholder="Name" class="form-control" value="<?php echo $name ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control" value="<?php echo $email ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <input id="subject" name="subject" type="text" placeholder="Class Subject" class="form-control" value="<?php echo $subject ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <textarea class="form-control" id="description" name="description" placeholder="Describe the problem you are encountering. We will get back to you within 2 hours." rows="7" readonly><?php echo $message ?></textarea>
                            </div>
                        </div>
                    </fieldset>
                    <h3 class="text-right">...We'll contact you shortly!</h3>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>