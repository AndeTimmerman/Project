<?php

    spl_autoload_register( function($class)
    {
        include_once("classes/" . $class . ".class.php");
    });



    if(!empty($_POST))
    {
        try
        {
        $g = new User();
        $g->Firstname=$_POST['firstname'];
        $g->Lastname=$_POST['lastname'];
        $g->Email=$_POST['email'];
        $g->Password=$_POST['password'];
        $g->Year=$_POST['year'];
        $g->Education=$_POST['education'];
        $g->City=$_POST['city'];
        $g->Bio=$_POST['bio'];
        $g->save();
        $success ="<b>Ok!</b> Je bent succesvol geregistreerd.";
        }

        catch(Exception $e)
        {
            $error=$e->getMessage();
        }
    }

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Rent-A-Student">
    <meta name="keywords" content="Rent,Student,Multimedia,Thomas More, Mechelen">
    <meta name="author" content="Ande Timmerman,Manuel van den Notelaer,Nick Van Puyvelde,Stijn Van Doorslaer">
    
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
            <a href="index.php"><img src="img/vector-logo.png" alt="logo"></a>
            <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen.</p>
        </header>

        <!--NAV-->
        <nav>
            <ul class="nav nav-tabs nav-justified">
              <li><a href="index.php">Home</a></li>
              <li><a href="">About us</a></li>
              <li><a href="">Contact</a></li>
            </ul>
        </nav>
           
        <!--ALERT SUCCESS-->
        <?php if(isset($success)){ ?>
            <div class="alert alert-success" role="alert">
            <?php echo $success ?>
            </div>
        <?php } ?>

        <!--ALERT DANGER-->
        <?php if(isset($error)){ ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>
        <?php } ?>
            
        <!--FORMULIER REGISTREREN-->
        <h2 id="registration">Registratie</h2>
        <form role="form" method="post" >
            <!--VOORNAAM-->
            <div class="form-group">
                <label for="firstname">Voornaam:<span class="required">*</span></label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Voornaam">
            </div>
            <!--ACHTERNAAM-->
               <div class="form-group">
                <label for="lastname">Achternaam:<span class="required">*</span></label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Achternaam">
            </div>
            <!--EMAILADRES-->
            <div class="form-group">
                <label for="email">E-mailadres:<span class="required">*</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-emailadres">
            </div>
            <!--WACHTWOORD-->
            <div class="form-group">
                <label for="password">Wachtwoord:<span class="required">*</span></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Wachtwoord">
            </div>
            <!--JAAR-->
           <div class="form-group">
                <label for="year">Jaar:<span class="required">*</span></label>
                <select class="form-control" id="year" name="year">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </div>
            <!--RICHTING-->
            <div class="form-group">
                <label for="education">Richting:<span class="required">*</span></label>
                <select class="form-control" id="education" name="education">
                    <option>Niet van toepassing</option>
                    <option>Webdesign</option>
                    <option>Webdevelopment</option>
                </select>
            </div>
            <!--WOONPLAATS-->
          <div class="form-group">
                <label for="city">Woonplaats:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Woonplaats">
            </div>
            <!--TEXTAREA-->
           <div class="form-group">
                <label for="bio">Biografie:</label>
                <textarea class="form-control" id="bio" cols="30" name="bio" rows="10" placeholder="Lorem Ipsum is slechts een proeftekst."></textarea>
            </div>
            <!--PROFIELFOTO-->
            <div class="form-group">
                <label for="profilePicInputFile">Profielfoto uploaden</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
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