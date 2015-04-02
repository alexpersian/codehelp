<?php

    if ( isset($_POST['email']) ) {
        $name = $email = $subject = $description = "";

        $name = clean_input( $_POST['name'] );
        $email = clean_input( $_POST['email'] );
        $subject = clean_input( $_POST['subject'] );
        $message = clean_input( $_POST['message'] );
        $header = "Reply-To: " . $email . "\r\n" .
            "From: admin@codehelp.scsugroups.com" . "\r\n" .
            "X-Mailer: PHP/" . phpversion();

        mail(
            "apersian@stcloudstate.edu",
            "CodeHelp::" . $subject,
            $message,
            $header
        );

        mail(
            "hest0401@stcloudstate.edu",
            "CodeHelp::" . $subject,
            $message,
            $header
        );

    } else {
        echo "Oops! We need your email!";
    }

    function clean_input($data) {
        //return htmlspecialchars( stripslashes( trim($data) ) );
        return $data;
    }

?>
<html>
    <body>
        Sent! Talk to you soon! - CodeHelp Team
    </body>
</html>