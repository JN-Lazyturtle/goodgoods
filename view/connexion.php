<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>


<form class="form-horizontal" method="post" action="TRTauthentification.php">
    <fieldset>

        <!-- Form Name -->
        <legend>Authentification</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Login</label>
            <div class="col-md-4">
                <input id="textinput" name="login" type="text" placeholder="placeholder" class="form-control input-md">
            </div>
        </div>
        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="passwordinput">Password</label>
            <div class="col-md-4">
                <input id="passwordinput" name="mdp" type="password" placeholder="placeholder" class="form-control input-md">
            </div>
        </div>
        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"><p></p></label>
            <div class="col-md-12 text-center">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Valider</button>
            </div>
        </div>

    </fieldset>
</form>