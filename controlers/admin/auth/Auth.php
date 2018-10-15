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
    private $user_id;    
    private $rule_id;    
    private $company_name;    
    private $company_email;    
    private $company_contact;    
    private $logo;    
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

        if (array_key_exists('user_id', $data)) {
            $this->user_id = $data['user_id'];
        }

        if (array_key_exists('rule_id', $data)) {
            $this->rule_id = $data['rule_id'];
        }

         if (array_key_exists('company_name', $data)) {
            $this->company_name = $data['company_name'];
        }

         if (array_key_exists('company_email', $data)) {
            $this->company_email = $data['company_email'];
        }

        if (array_key_exists('company_contact', $data)) {
            $this->company_contact = $data['company_contact'];
        }        
        
        return $this;
    }   

    public function login(){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `supar_admin` WHERE email=:email AND password=:password");            
            $stm->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stm->bindValue(':password', md5($this->password), PDO::PARAM_STR);
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);            

            if(!empty($result['id'])){
                $_SESSION['supar_id'] = $result['id']; 
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

     //All User show
    public function supar_admin(){
        try {

            $stmt = $this->con->prepare("SELECT * FROM `supar_admin` WHERE id = '1'"); //update table name
            
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    public function rule()
    {
        try {            
            $stmt = $this->con->prepare("SELECT * FROM `rule`"); //update table name
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);           
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

     public function rule_user()
    {
        try {            
            $stmt = $this->con->prepare("SELECT rule_user.id, users.id, rule_user.user_id, rule_user.rule_id FROM users INNER JOIN rule_user ON users.id = rule_user.user_id"); //update table name                        
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);            
            return $result;

            if(!empty($result['id'])){
                $_SESSION['rule_id'] = $result['id']; 
                                                        
                header('location:../../../index.php');
            }          
        }
        
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function user_rule_store()
   {
        try {            
            $stmt = $this->con->prepare("UPDATE `rule_user` SET `user_id` = :user_id, `rule_id` = :rule_id WHERE `rule_user`.`id` = '1'");
        $stmt->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);
        $stmt->bindValue(':rule_id', $this->rule_id, PDO::PARAM_INT);
        $stmt->execute();           
            if($stmt){
                $_SESSION['rule_update'] = 'Data successfully Updated !!';
                header('location: ../../../views/admin/auth/user-access.php');
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /*Site Configaration*/

     public function site_config()
    {
        try {            
            $stmt = $this->con->prepare("SELECT * FROM `site_config`"); //update table name
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;       
            if(!empty($result['id'])){                                         
                $_SESSION['logo'] = $result['image'];               
            }
         }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

     public function site_config_update()
    {
        try {            
            $stmt = $this->con->prepare("UPDATE `site_config` SET `company_name` = :company_name, `company_email` = :company_email, `company_contact` = :company_contact, `image` = :image, `update_at` = NOW() WHERE `site_config`.`id` = :id"); //update table name
            $stmt->bindValue(':company_name', $this->company_name, PDO::PARAM_STR);
            $stmt->bindValue(':company_email', $this->company_email, PDO::PARAM_STR);
            $stmt->bindValue(':company_contact', $this->company_contact, PDO::PARAM_STR);
            $stmt->bindValue(':image', $this->image, PDO::PARAM_STR);
            $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);           
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
     
}