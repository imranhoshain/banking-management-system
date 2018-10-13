<?php
namespace App\admin;
use App\helpers\Connection;
use PDO;
Use PDOException;
/**
 * Login authorization class
 */
class Billing extends Connection
{
    private $id;
    private $name;
    private $month;
    private $year;    
    private $paid;
    private $due;    
    //Set Method
    public function set($data = array())
    {
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
        if (array_key_exists('user_id', $data)) {
            $this->user_id = $data['user_id'];
        }
        if (array_key_exists('month', $data)) {
            $this->month = $data['month'];
        }
        if (array_key_exists('year', $data)) {
            $this->year = $data['year'];
        }
        if (array_key_exists('paid', $data)) {
            $this->paid = $data['paid'];
        } 
        if (array_key_exists('due', $data)) {
            $this->due = $data['due'];
        }        
        return $this;
    }

    //User Insert Database
    public function store()
    {
        try {
            $stmt = $this->con->prepare("INSERT INTO `billing`(`user_id`, `month`, `year`, `paid`, `due`, `created_at`) VALUES(:user_id, :month, :year, :paid, :due, NOW())");
            
            $result = $stmt->execute(array(
                ':user_id' => $this->user_id,
                ':month' => $this->month,
                ':year' => $this->year,
                ':paid' => $this->paid,
                ':due' => $this->due                 
            ));            
            if ($result) {
                $_SESSION['bill_insert'] = 'Billing Add successfully !!';
                header('location: ../../../views/admin/billing/index.php');            
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
            $stmt = $this->con->prepare("SELECT users.name, billing.month, billing.id, billing.year, billing.paid, billing.due, billing.user_id  FROM users INNER JOIN billing ON users.id = billing.user_id"); //update table name
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);            
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }   

    public function filterData($data){           
            $month  = $data['month'];
            $year  = $data['year'];            
            $sql = "SELECT users.name, billing.month, billing.year, billing.paid, billing.due  FROM users INNER JOIN billing ON users.id = billing.user_id WHERE month = '$month' and year = '$year' ";            
            $query = $this->con->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            return $result; 
            
        }  
    public function view($user_id){
        try {

            $stmt = $this->con->prepare("SELECT * FROM `billing` WHERE user_id = :user_id"); //update table name
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);           

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function single_view($id){
        try {

            $stmt = $this->con->prepare("SELECT billing.id, users.name, billing.month,  billing.year, billing.paid, billing.due, billing.user_id  FROM users INNER JOIN billing ON users.id = billing.user_id WHERE billing.id = :id"); //update table name
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);          

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function user_total_paid($user_id){
        try {

            $stmt = $this->con->prepare("SELECT SUM(paid) FROM billing WHERE user_id = :user_id"); //update table name
             $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);           

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function user_total_due($user_id){
        try {

            $stmt = $this->con->prepare("SELECT SUM(due) FROM billing WHERE user_id = :user_id"); //update table name
             $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);           

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function delete_bill($id){
        try {

            $stmt = $this->con->prepare("DELETE FROM `billing` WHERE `billing`.`id` = :id"); //update table name
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute(); 
            if($stmt){
                $_SESSION['delete'] = 'Data successfully Deleted !!';
                header('location:../../../admin/billing/index.php');
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

     public function update(){
        try {

        $stmt = $this->con->prepare("UPDATE `billing` SET `month` = :month, `year` = :year, `paid` = :paid, `due` = :due, `updated_at` = NOW() WHERE `billing`.`id` = :id;"); //update table name  
        $stmt->bindValue(':month', $this->month, PDO::PARAM_STR);
        $stmt->bindValue(':year', $this->year, PDO::PARAM_INT);
        $stmt->bindValue(':paid', $this->paid, PDO::PARAM_INT);
        $stmt->bindValue(':due', $this->due, PDO::PARAM_INT);              
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();           
            if($stmt){
                $_SESSION['update'] = 'Data successfully Updated !!';
                header('location:../../../views/admin/billing/index.php');
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }          
    
}