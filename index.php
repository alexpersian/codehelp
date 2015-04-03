<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeHelp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
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
        .header {
            color: #c10b12;
            font-size: 27px;
            padding: 10px;
        }
        .bigicon {
            font-size: 35px;
            color: #c10b12;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="submit.php">
                    <fieldset>
                        <legend class="text-center header">Welcome to CodeHelp<br /><small>a free service for SCSU students!</small></legend>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-6">
                                <input id="name" name="name" type="text" placeholder="What's your name?" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-6">
                                <input id="email" name="email" type="text" placeholder="What's your email address?" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-book bigicon"></i></span>
                            <div class="col-md-6">
                                <input id="subject" name="subject" type="text" placeholder="What course do you need help with?" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-6">
                                <textarea class="form-control" id="message" name="message" placeholder="What can we help you with?" rows="7" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <!-- button for submission -->
                                <button type="submit" class="btn btn-danger btn-block">Please Help!</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-61474768-1', 'auto');
    ga('send', 'pageview');

</script>