<?php
    $name = $email = $subject = $message = $error_text = $language = "";

    $success = false;

    if ( isset($_POST['email']) ) {

        //get the (clean) inputs from the form
        $name = clean_input( $_POST['name'] );
        $email = clean_input( $_POST['email'] );
        $subject = clean_input( $_POST['subject'] );
        $message = clean_input( $_POST['message'] );
        $language = clean_input( $_POST['language'] );

        //construct the subject
        $subject = "Help Request! (" . $subject . "/" . $language . ")";

        //who's this email going to?
        $to = "nerd@codehelp.scsugroups.com";

        //construct the headers
        $headers = array();
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/html; charset=iso-8859-1";
        $headers[] = "From:". $name . "<admin@codehelp.scsugroups.com>";
        $headers[] = "Reply-To: " . $name . "<" . $email . ">";
        $headers[] = "From: " . $email;
        $headers[] = "Subject: " . $subject;
        $headers[] = "X-Mailer: PHP/" . phpversion();

        //construct the body
        $body = array();
        $body[] = "<table cellspacing=\"0\" cellpadding=\"10\" border=\"0\">";
        $body[] = "<tr><td width=\"80\">Class/Subject:</td><td width=\"280\">". $subject . "</td></tr>";
        $body[] = "<tr><td width=\"80\">Language:</td><td width=\"280\">". $language . "</td></tr>";
        $body[] = "<tr><td width=\"80\">Message:</td><td width=\"280\">". $message . "</td></tr>";
        $body[] = "</tr></table>";

        //send the email!
        $success = true;
        /*mail(
            $to,
            $subject,
            implode("\r\n", $body), //append line breaks
            implode("\r\n", $headers) //append line breaks
        );*/

    } else {
        $error_text = "Oops! Something went wrong...";
    }

    //cleans a submitted form data field (basic security stuff)
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
    <title>CodeHelp - <?php echo ($success == true) ? "Sent!" : "Fail..." ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
    </head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm" id="main-content">
                <form class="form-horizontal">
                    <fieldset>
                        <legend class="text-center header">
                            <?php
                                if ($error_text != "" || $success == false) {
                                    echo $error_text;
                                } else {
                                    echo "Success!";
                                }
                            ?>
                        </legend>
                        <h3 class="text-center">Here's what you <?php echo ($error_text != "" || $success == false) ? "tried to send" : "sent" ?> us...</h3>
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
                    <h3 class="text-center">...We'll <?php echo ($error_text != "" || $success == false) ? "try to " : "" ?>contact you shortly!</h3>
                </form>
            </div>
        </div>
        <?php include("templates/include/createdby.php"); ?>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<?php //include("templates/include/sefooter.php"); ?>
</html>