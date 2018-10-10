<?php
namespace App\admin\auth;
use App\helpers\Connection;
use PDO;
Use PDOException;
/**
 * Login authorization class
 */
class Auth extends Connection
{
    private $id;
    private $name;    
    private $email;
    private $password;
    private $image;    
    //Set Method
    public function set($data = array())
    {
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
        if (array_key_exists('name', $data)) {
            $this->name = $data['name'];
        }
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = $data['password'];
        }
        
        if (array_key_exists('image', $data)) {
            $this->image = $data['image'];
        }
        
        return $this;
    }   

    public function login(){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `supar_admin` WHERE email=:email AND password=:password");            
            $stm->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stm->bindValue(':password', $this->password, PDO::PARAM_STR);
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);            

            if(!empty($result['id'])){
                $_SESSION['id'] = $result['id']; 
                $_SESSION['email'] = $result['email'];             
                $_SESSION['name'] = $result['name'];             
                $_SESSION['image'] = $result['image'];                              
                header('location:../../../index.php');
            }else{
                $_SESSION['login_error'] = '<h5>Email and password are Incorrect!, Please try again!! &nbsp; &nbsp;<button class="close" aria-label="Close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button></h5>';
            }
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
     }
     
}