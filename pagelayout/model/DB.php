<?php
/*class DB{
 
    private $host = 'localhost';
    private $username = 'username';
    private $password = 'password';
    private $database = 'projectrazerbd';
 
    protected $connection;
 
    public function __construct(){
 
        if (!isset($this->connection)) {
 
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
 
            if (!$this->connection) {
                echo"<script>
                     alert('Cannot connect to database server');
                     
                     </script>";
            }            
        }    
 
        return $this->connection;
    }*/
/*    // Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";*/
/*}*/
?>

<?php
/*$servername = "localhost";
$username = "root";
$password = "";
$database = "projectrazerbd";
$con = mysqli_connect($servername, $username, $password, $database);

if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());*/
   /* exit();*/
?>

<?php
$servername = "localhost";
/*$servername = '192.168.0.101';
$servername = 'localhost:2082';*/
$username = "root";
$password = "";
$database = "projectrazerbd";
$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    /*exit();*/
}  
?>
