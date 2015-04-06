<?php
    spl_autoload_register( function($class)
    {
        include_once("classes/" . $class . ".class.php");
    });

    class User
    {
        private $m_sFirstname;
        private $m_sLastname;
        private $m_sEmail;
        private $m_sPassword;
        private $m_iYear;
        private $m_sEducation;
        private $m_sCity;
        private $m_sBio;

        //SET----------------------------------------
        public function __set($p_sProperty,$p_vValue)
        {
                switch($p_sProperty)
                {
                    case 'Firstname':
                    if($p_vValue=="")
                    {
                        throw new Exception("Voornaam moet ingevuld zijn.");
                    }
                    else
                    {
                        $this->m_sFirstname = $p_vValue;    
                    }
                    break;

                    case 'Lastname':
                    $this->m_sLastname = $p_vValue;
                    break;

                    case 'Email':
                    $this->m_sEmail = $p_vValue;
                    break;

                    case 'Password':
                    $this->m_sPassword = $p_vValue;
                    break;

                    case 'Year':
                    $this->m_iYear = $p_vValue;
                    break;

                    case 'Education':
                    $this->m_sEducation = $p_vValue;
                    break;

                    case 'City':
                    $this->m_sCity = $p_vValue;
                    break;

                    case 'Bio':
                    $this->m_sBio = $p_vValue;
                    break;

                }
        }

        //GET----------------------------------------
        public function __get($p_sProperty)
        {
                switch($p_sProperty)
                {
                    case 'Firstname':
                    return $this->m_sFirstname;
                    break;

                    case 'Lastname':
                    return $this->m_sLastname;
                    break;

                    case 'Email':
                    return $this->m_sEmail;
                    break;

                    case 'Password':
                    return $this->m_sPassword;
                    break;

                    case 'Year':
                    return $this->m_iYear;
                    break;

                    case 'Education':
                    return $this->m_sEducation;
                    break;

                    case 'City':
                    return $this->m_sCity;
                    break;

                    case 'Bio':
                    return $this->m_sBio;
                    break;


                }
        }
        
        
        

        
        public function checkExistingEmail()
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT gids_email FROM gids WHERE gids_email = :gebruikersnaam");
            $statement->bindParam(":email", $this->m_sEmail);
            $statement->execute();

            if ($statement->rowCount() > 0)
            {
                return false;
            }
            else
            {
                return true;
            }
        }

        public function Login()
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT * FROM gids WHERE gids_email = :email AND gids_wachtwoord = :wachtwoord");
            $statement->bindValue(":email", $this->Email);
            $statement->bindValue(":wachtwoord", $this->Password);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if($statement->rowCount() == 1)
            {
                session_start();
                $_SESSION['gids_id'] = $result['gids_id'];
                $_SESSION['gids_email'] = $result['gids_email'];
                $_SESSION['gids_wachtwoord'] = $result['gids_wachtwoord'];
                header("location: home.php");
            }
            else
            {
                throw new Exception ("E-mail of wachtwoord zijn onjuist");
            }
        }

        public static function Logout()
        {
            unset($_SESSION['gids_id']);
            unset($_SESSION['gids_email']);
            unset($_SESSION['gids_wachtwoord']);
            header("location: index.php");
        }
        
        
        
        
        
        
        
        
        

         //SAVE---------------------------------------
         public function save(){
         $conn = Db::getInstance();
         $statement = $conn->prepare("INSERT INTO gids  (
                                                        gids_voornaam,
                                                        gids_naam,
                                                        gids_email,
                                                        gids_wachtwoord,
                                                        gids_jaar,
                                                        gids_richting,
                                                        gids_stad,
                                                        gids_bio        
                                                        )

                                                 VALUES(
                                                        :firstname,
                                                        :lastname,
                                                        :email,
                                                        :wachtwoord,
                                                        :jaar,
                                                        :richting,
                                                        :stad,
                                                        :bio
                                                        )"
                                       ); 

             $statement->bindValue(':firstname',$this->Firstname);
             $statement->bindValue(':lastname',$this->Lastname);
             $statement->bindValue(':email',$this->Email);
             $statement->bindValue(':wachtwoord',$this->Password);
             $statement->bindValue(':jaar',$this->Year);
             $statement->bindValue(':richting',$this->Education);
             $statement->bindValue(':stad',$this->City);
             $statement->bindValue(':bio',$this->Bio);
             $statement->execute();

        }
    }
?>

