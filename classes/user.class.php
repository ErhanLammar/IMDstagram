<?php
/**
 * Created by PhpStorm.
 * User: erhanlammar
 * Date: 23/04/16
 * Time: 10:13
 */
class User{

    private $_db;

    // todo: 1 private variabelen aanmaken voor firstname, lastname, ...

    private $m_sUsername;
    private $m_sFirstname;
    private $m_sLastname;
    private $m_sEmail;
    private $m_sPassword;
    private $m_sPasswordconfirmation;

    // todo: 2 getters & setters!

    public function __set($p_sProperty, $p_vValue){
        switch($p_sProperty){
            case "Username":
                if(!empty($p_vValue)){
                    $this->m_sUsername = $p_vValue;
                    break;
                }else{
                    //opvangen van leeg veld username.
                    throw new exception("vergeet geen username in te vullen");
                }
            case "Firstname":
                if(!empty($p_vValue)){
                    $this->m_sFirstname = $p_vValue;
                    break;
                }else{
                    //opvangen van leeg veld firstname.
                    throw new exception("Uw voornaam hebben we echt wel nodig");
                }
            case "Lastname":
                if(!empty($p_vValue)){
                    $this->m_sLastname = $p_vValue;
                    break;
                }else{
                    //opvangen van leeg veld lastname.
                    throw new exception("Heeft u geen achternaam?");
                }
            case "Email":
                if(!empty($p_vValue)){
                    $this->m_sEmail = $p_vValue;
                    break;
                }else{
                    //opvangen van leeg veld email.
                    throw new exception("Wij hebben uw email nodig om u op de hoogte te houden");
                }
            case "Password":
                if(!empty($p_vValue)){
                    $this->m_sPassword = $p_vValue;
                    break;
                }else{
                    //opvangen van leeg veld firstname.
                    throw new exception("Zonder wachtwoord geen login");
                }
            case "Passwordconfirmation":
                if(!empty($p_vValue)){
                    $this->m_sPasswordconfirmation = $p_vValue;
                    break;
                }else{
                    //opvangen van leeg veld firstname.
                    throw new exception("Zonder wachtwoord geen login");
                }
        }
    }
    public function __get($p_sProperty){
        switch($p_sProperty){
            case "Username":
                return $this->m_sUsername;
                break;
            case "Firstname":
                return $this->m_sFirstname;
                break;
            case "Lastname":
                return $this->m_sLastname;
                break;
            case "Email":
                return $this->m_sEmail;
                break;
            case "Password":
                return $this->m_sPassword;
                break;
            case "Passwordconfirmation":
                return $this->m_sPasswordconfirmation;
                break;
            }
    }

    private function checkPasswordConfirmation(){
        if($this->m_sPassword == $this->m_sPasswordconfirmation){
            return true;
        }else{
            throw new exception("wachtwoorden komen niet overeen");
        }
    }


    public function signup(){
        if(!$this->checkPasswordConfirmation()){
            throw new exception("De registratie is niet correct verlopen. Check alles nog eens");
        }
        // INSERT QUERY

        $conn = new PDO("mysql:host=localhost;dbname=IMDstagram", "root","");
        $options= ['cost' => 12];
        $this->m_sPassword = password_hash($this->m_sPassword, PASSWORD_DEFAULT, $options);
        $statement = $conn->prepare("INSERT INTO users(
          username,
          firstname,
          lastname,
          email,
          password
          )
          VALUES(
          :username,
          :firstname,
          :lastname,
          :email,
          :password
          )
          ");
        $statement->bindValue(":username", $this->m_sUsername);
        $statement->bindValue(":firstname", $this->m_sFirstname);
        $statement->bindValue(":lastname", $this->m_sLastname);
        $statement->bindValue(":email", $this->m_sEmail);
        $statement->bindValue(":password", $this->m_sPassword);
        return $statement->execute();
    }
    public function loggingIn(){
        if(!empty($this->m_sUsername) && !empty($this->m_sPassword)){
            $PDO = Db::getInstance();
            $stmt = $PDO->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindValue(":username", $this->m_sUsername, PDO::PARAM_STR);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $password = $this->m_sPassword;
                $hash = $result['password'];

                if(password_verify($password, $hash)){
                    $this->CreateSession($result['userid']);
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
}