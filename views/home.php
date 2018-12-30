<!DOCTYPE html> 
<html lang="en" style="height:100%;">
    <head> 
        <meta charset="utf-8"> 
        <title>BikeApp</title>
        <link rel="shortcut icon" type="image/x-icon" href="img/homeImag.jpg">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="keywords" content="pinegrow, blocks, bootstrap" />
        <meta name="description" content="My new website" />
        <link rel="shortcut icon" href="ico/favicon.png"> 
        <!-- Core CSS -->         
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <!-- Style Library -->         
        <link href="css/style-library-1.css" rel="stylesheet">
        <link href="css/plugins.css" rel="stylesheet">
        <link href="css/blocks.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->         
        <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->         
    </head>     
    <body data-spy="scroll" data-target="nav">
        <nav class="navbar navbar-default"> 
            <div class="container-fluid"> 
                <div class="navbar-header"> 
                    <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> 
                        <span class="sr-only">Toggle navigation</span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                    </button>                     
                    <a href="#" class="navbar-brand text-info">FenapVelo</a> 
                </div>                 
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
                    <ul class="nav navbar-nav"> 
                        <li class="active">
</li>                         
                        <li>
</li>                         
                    </ul>                     
                    <ul class="nav navbar-nav navbar-right"> 
                        <li>
</li>                         
                    </ul>                     
                </div>                 
            </div>             
        </nav>
        <div class="container">
            <div class="row">
                <div class="col col-md-6">
                    <!--<img src="image/velo1.jpeg" width="500" height="500">-->
                    <img src="img/homeImag.jpg" width="500" height="500">
                </div>
                <br>
                <br>
                <br>
                <hr>
                <div class="col col-md-6 well">
                    <div class="text-center" style=" font-weight : bold ;">
                        AUTHENTIFIEZ VOUS
                        <hr>
                    </div>
                    <form class="form" action="../controleurs/authentification.php" method="post">
                        <div class="input-group input-group-lg"> 
                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock"></i></span> 
                            <input name="password" class="form-control" placeholder="Saisir le mot de passe" type="password" 
                                   aria-describedby="sizing-addon1" > 
                        </div>
                        <div class="text-center"> 
                            <hr>
                            <button class="btn btn-success" type="submit">
                                VALIDER
</button>                             
                        </div>
                    </form>
                </div>
            </div>
            <hr>
        </div>
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>         
        <script type="text/javascript" src="js/bootstrap.min.js"></script>         
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/bskit-scripts.js"></script>         
    </body>     
</html>
