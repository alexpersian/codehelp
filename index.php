<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeHelp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="submit.php">
                    <fieldset>
                        <legend class="text-center header">Welcome to CodeHelp<br /><small class="subheading">Made by SCSU students, for SCSU students.</small></legend>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <label for="name" class="col-sm-2 control-label">Name:</label>
                            <div class="col-md-6">
                                <input id="name" name="name" type="text" placeholder="What's your name?" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <label for="email" class="col-sm-2 control-label">Email:</label>
                            <div class="col-md-6">
                                <input id="email" name="email" type="text" placeholder="What's your email address?" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-book bigicon"></i></span>
                            <label for="subject" class="col-sm-2 control-label">Class/Subject:</label>
                            <div class="col-md-6">
                                <input id="subject" name="subject" type="text" placeholder="What course do you need help with?" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-code bigicon"></i></span>
                            <label for="language" class="col-sm-2 control-label">Language:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="language">
                                    <option>C/C++</option>
                                    <option>C#</option>
                                    <option>HTML/CSS</option>
                                    <option>Java</option>
                                    <option>JavaScript/JSON</option>
                                    <option>PHP</option>
                                    <option>Python</option>
                                    <option>Ruby</option>
                                    <option>SQL</option>
                                    <option>(other)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <label for="message" class="col-sm-2 control-label">Message:</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="message" name="message" placeholder="What can we help you with?" rows="7" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <!-- button for submission -->
                                <button type="submit" class="btn btn-danger btn-block">Get Help</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <?php include("templates/include/createdby.php"); ?>
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