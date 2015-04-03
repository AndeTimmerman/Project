<?php 



?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Rent-A-Student">
    <meta name="keywords" content="Rent,Student,Multimedia,Thomas More, Mechelen">
    <meta name="author" content="Ande Timmerman,Manuel van den Notelaer,Nick van Puyvelde,Stijn Van Doorslaer">
    
    <link rel="icon" href="img/Rent-A-Student.png">
    <title>Rent-A-Student</title>
    
    <!-- OPENGRAPH TAGS -->
    <meta property="og:image" content="img/Rent-A-Student.png"/>
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
</head>
<body>
    <!--CONTAINER-->
    <div class="container">
           
        <!--HEADER-->
        <header class="jumbotron">
            <h1>Rent-A-Student</h1>
            <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen.</p>
        </header>

        <!--NAV-->
        <nav>
            <ul class="nav nav-tabs nav-justified">
              <li><a href="">Home</a></li>
              <li><a href="">About us</a></li>
              <li><a href="">Contact</a></li>
            </ul>
        </nav>
           
        <!--ALERT SUCCESS-->
        <?php if(isset($succes)){ ?>
            <div class="alert alert-success" role="alert">
                <b>Well done!</b> You successfully read this important alert message.
            </div>
        <?php } ?>

        <!--ALERT DANGER-->
        <?php if(isset($error)){ ?>
            <div class="alert alert-danger" role="alert">
                <b>Oh snap!</b> Change a few things up and try submitting again.
            </div>
        <?php } ?>
            
        <!--FORMULIER REGISTREREN-->
        <h2 id="registration">Registratie</h2>
        <form role="form">
            <!--VOORNAAM-->
            <div class="form-group">
                <label for="firstname">Voornaam:<span class="required">*</span></label>
                <input type="text" class="form-control" id="firstname" placeholder="Voornaam">
            </div>
            <!--ACHTERNAAM-->
            <div class="form-group">
                <label for="lastname">Achternaam:<span class="required">*</span></label>
                <input type="text" class="form-control" id="lastname" placeholder="Achternaam">
            </div>
            <!--EMAILADRES-->
            <div class="form-group">
                <label for="email">E-mailadres:<span class="required">*</span></label>
                <input type="email" class="form-control" id="email" placeholder="E-emailadres">
            </div>
            <!--WACHTWOORD-->
            <div class="form-group">
                <label for="password">Wachtwoord:<span class="required">*</span></label>
                <input type="password" class="form-control" id="password" placeholder="Wachtwoord">
            </div>
            <!--JAAR-->
            <div class="form-group">
                <label for="year">Jaar:<span class="required">*</span></label>
                <select class="form-control" id="year">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </div>
            <!--RICHTING-->
            <div class="form-group">
                <label for="education">Richting:<span class="required">*</span></label>
                <select class="form-control" id="education">
                    <option>Niet van toepassing</option>
                    <option>Webdesign</option>
                    <option>Webdevelopment</option>
                </select>
            </div>
            <!--WOONPLAATS-->
            <div class="form-group">
                <label for="city">Woonplaats:</label>
                <input type="text" class="form-control" id="city" placeholder="Woonplaats">
            </div>
            <!--TEXTAREA-->
            <div class="form-group">
                <label for="bio">Biografie:</label>
                <textarea class="form-control" id="bio" cols="30" rows="10">Lorem Ipsum is slechts een proeftekst.</textarea>
            </div>
            <!--PROFIELFOTO-->
            <div class="form-group">
                <label for="profilePicInputFile">Profielfoto uploaden</label>
                <input type="file" id="profileInputFile">
            </div>
            <button type="submit" class="btn btn-default">Registreren</button>
            </form>
         
        </section>
        
        <br>

        <!-- FOOTER -->
        <footer class="footer">
            <p>&copy;2015</p>    
        </footer>
        
    </div>  
</body>
</html>