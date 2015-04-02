<?php

    if ( isset($_POST['email']) ) {
        $name = $email = $subject = $description = "";

        $name = clean_input( $_POST['name'] );
        $email = clean_input( $_POST['email'] );
        $subject = clean_input( $_POST['subject'] );
        $message = clean_input( $_POST['message'] );
        $headers = array();


        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/plain; charset=iso-8859-1";
        $headers[] = "From:". $name . "<admin@codehelp.scsugroups.com>";
        $headers[] = "Reply-To: " . $name . "<" . $email . ">";
        $headers[] = "From: admin@codehelp.scsugroups.com";
        $headers[] = "Subject: " . $subject;
        $headers[] = "X-Mailer: PHP/" . phpversion();

        mail(
            "apersian@stcloudstate.edu",
            "CodeHelp::" . $subject,
            $message,
            implode("\r\n", $headers)
        );

        mail(
            "hest0401@stcloudstate.edu",
            "CodeHelp::" . $subject,
            $message,
            implode("\r\n", $headers)
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