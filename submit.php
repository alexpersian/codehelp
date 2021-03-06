<?php

require( "config.php" );

$name = $email = $subject = $message = $error_text = $language = "";
$success = false;

$headers = array();
$body = array();

//cleans a submitted form data field (basic security stuff)
function clean_input($data) {
    $data = trim( $data );
    $data = stripslashes( $data );
    $data = htmlspecialchars( $data );
    return $data;
}

if ( isset($_POST['email']) ) {

    //get the (clean) inputs from the form
    $name = clean_input( $_POST['name'] );
    $email = clean_input( $_POST['email'] );
    $subject = clean_input( $_POST['subject'] );
    $message = clean_input( $_POST['message'] );
    $language = clean_input( $_POST['language'] );

    //construct the subject
    $subject = "Help Request! (" . $subject . " in " . $language . ")";

    //who's this email going to?
    $to = "nerd@codehelp.scsugroups.com";

    //construct the headers
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/html; charset=iso-8859-1";
    $headers[] = "From:". $name . "<admin@codehelp.scsugroups.com>";
    $headers[] = "Reply-To: " . $name . "<" . $email . ">";
    $headers[] = "From: " . $email;
    $headers[] = "Subject: " . $subject;
    $headers[] = "X-Mailer: PHP/" . phpversion();

    //construct the body
    $body[] = "<table cellspacing=\"0\" cellpadding=\"10\" border=\"0\">";
    $body[] = "<tr><td width=\"80\">Class/Subject:</td><td width=\"280\">". $subject . "</td></tr>";
    $body[] = "<tr><td width=\"80\">Language:</td><td width=\"280\">". $language . "</td></tr>";
    $body[] = "<tr><td width=\"80\">Message:</td><td width=\"280\">". $message . "</td></tr>";
    $body[] = "</tr></table>";

    try {
        $mandrill = new myMandrill();

        //ISSUE EMAIL
        $mail = array(
            'html' => implode("\r\n", $body),
            'subject' => $subject,
            'from_email' => 'admin@codehelp.scsugroups.com',
            'from_name' => $name,
            'to' => array(
                array(
                    'email' => $to,
                    'name' => $name,
                    'type' => 'to'
                )
            ),
            'headers' => $headers,
            'important' => true,
            'track_opens' => true,
            'track_clicks' => true,
            'auto_text' => true,
        );

        //CONFIRMATION EMAIL
        $template_name = "Confirmation";
        $template_content = array(
            array(
                'name' => $name
            )
        );
        $confEmail = array(
            'from_email' => 'nerd@codehelp.scsugroups.com',
            'from_name' => 'CodeHelp',
            'subject' => 'CodeHelp: Request Confirmation',
            'to' => array(
                array(
                    'email' => $email,
                    'name' => $name,
                    'type' => 'to'
                )
            ),
            'headers' => array('Reply-To' => 'nerd@codehelp.scsugroups.com'),
            'important' => true,
            'track_opens' => true,
            'track_clicks' => true,
            'auto_text' => true,
            'metadata' => array(
                'website' => 'codehelp.scsugroups.com',
                'LIST:COMPANY' => 'CodeHelp',
                'description' => 'You are receiving this email because you showed interest in our new company. Thank you!',
                'list_address_html' => '905 Kilian Blvd. SE<br />Apt.3<br />St. Cloud, MN 56304'
                )
        );

        $async = false;
        $result = $mandrill->messages->send($mail, $async);


        if ($result[0]['status'] == "sent") {

            $confResult = $mandrill->messages->sendTemplate($template_name, $template_content, $confEmail, $async);

            if ($confResult[0]['status'] == "sent") {
                $success = true;
            } else {
                $error_text = "Oops! Something's not quite right...";
            }




        } else {
            $error_text = "Oops! Something went kinda wrong...";

            mail(
                'nerd@codehelp.scsugroups.com',
                'MANDRILL FAILURE!',
                'status:' . $result[0]['status'] . ', reject_reason:' . $result[0]['reject_reason'],
                implode("\r\n", $headers)
            );
        }





    } catch(Mandrill_Error $e) {

        $error_text = "Oops! Something went wrong on our end...";

        mail(
            'nerd@codehelp.scsugroups.com',
            'MANDRILL ERROR!',
            $e->getMessage(),
            implode("\r\n", $headers)
        );
    }

} else {



    $error_text = "Oops! Something went wrong...";

    mail(
        'nerd@codehelp.scsugroups.com',
        'FORM FAILURE!',
        implode("\r\n", $_POST),
        "POST fail."
    );

    header("Location: index.php" );

}

$data = array();
$data['name'] = $name;
$data['email'] = $email;
$data['subject'] = $subject;
$data['message'] = $message;
$data['language'] = $language;
$data['success'] = $success;
$data['error_text'] = $error_text;

try {
    $request = new Request($data);
    $request->insert();
} catch (PDOException $e) {
    //ignore that
}


?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeHelp - <?php echo ($success == true) ? "Sent!" : "Fail..." ?></title>
    <link rel="icon" href="img/favicon.ico">
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
<?php include("templates/include/sefooter.php"); ?>
</html>