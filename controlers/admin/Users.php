<?php
namespace App\admin;
use App\helpers\Connection;
use PDO;
Use PDOException;
/**
 * Login authorization class
 */
class Users extends Connection
{
    private $id;
    private $name;
    private $email;
    private $password;    
    private $phone;
    private $nid_number;
    private $address;
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
        if (array_key_exists('phone', $data)) {
            $this->phone = $data['phone'];
        } 
        if (array_key_exists('nid_number', $data)) {
            $this->nid_number = $data['nid_number'];
        }
        if (array_key_exists('address', $data)) {
            $this->address = $data['address'];
        }
        if (array_key_exists('image', $data)) {
            $this->image = $data['image'];
        }        
        return $this;
    }

    //User Insert Database
    public function store()
    {
        try {
            $stmt = $this->con->prepare("INSERT INTO `users`(`name`, `email`, `password`, `phone`, `nid_number`, `address`, `image`) VALUES(:name, :email, :password, :phone, :nid_number, :address, :image)");
            
            $result = $stmt->execute(array(
                ':name' => $this->name,
                ':email' => $this->email,
                ':password' => md5($this->password),
                ':phone' => $this->phone,
                ':nid_number' => $this->nid_number,
                ':address' => $this->address,
                ':image' => $this->image 
            ));            
            if ($result) {
                $_SESSION['user_insert'] = 'Registration successfully !!';
                header('location: ../../../views/admin/auth/index.php');            
            }
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    public function login(){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `users` WHERE email=:email AND password=:password");            
            $stm->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stm->bindValue(':password', md5($this->password), PDO::PARAM_STR);
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);            

            if(!empty($result['id'])){
                $_SESSION['id'] = $result['id'];         
                $_SESSION['email'] = $result['email'];
                $_SESSION['user_name'] = $result['name'];                                            
                $_SESSION['user_phone'] = $result['phone'];                                            
                $_SESSION['user_nid_number'] = $result['nid_number'];                                     
                $_SESSION['user_address'] = $result['address'];                                   
                $_SESSION['user_image'] = $result['image'];            
                               
                header('location:../../../views/admin/users/index.php');
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
    public function index()
    {
        try {            
            $stmt = $this->con->prepare("SELECT * FROM `users`"); //update table name
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);            
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function view($id){
        try {

            $stmt = $this->con->prepare("SELECT * FROM `users` WHERE id = :id"); //update table name
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function delete_bill_user($user_id){
        try {

            $stmt = $this->con->prepare("DELETE `users`,`billing` FROM `users` INNER JOIN `billing` ON `users`.`id` = `billing`.`user_id` WHERE `billing`.`user_id` = '$user_id'"); //update table name
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute(); 
            if($stmt){
                $_SESSION['delete_bill_user'] = 'Data successfully Deleted !!';
                header('location:../../../admin/users/index.php');
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function delete_user($id){
        try {

            $stmt = $this->con->prepare("DELETE FROM `users` WHERE `users`.`id` = :id"); //update table name
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute(); 
            if($stmt){
                $_SESSION['delete_user'] = 'Data successfully Deleted !!';
                header('location:../../../admin/users/all-members.php');
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


     public function update(){
        try {

        $stmt = $this->con->prepare("UPDATE `users` SET `name` = :name, `email` = :email, `phone` = :phone, `nid_number` = :nid_number, `address` = :address, `image` = :image WHERE `users`.`id` = :id;"); //update table name         
        $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $stmt->bindValue(':nid_number', $this->nid_number, PDO::PARAM_STR);
        $stmt->bindValue(':address', $this->address, PDO::PARAM_STR);
        $stmt->bindValue(':image', $this->image, PDO::PARAM_STR);        
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();           
            if($stmt){
                $_SESSION['update'] = 'Data successfully Updated !!';
                header('location:../../../views/admin/users/all-members.php');
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    
}