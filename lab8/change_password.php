<?php
session_start();
include_once("db.php");
?>

<?php
if(isset($_SESSION["id"])){
    $id =  $_SESSION["id"] ;
echo "eeeeeee". $_SESSION["id"] ."";
}
?>

<?php
// including the database connection file

 
if(isset($_POST['Update'])) { 
  

    $password1 = $_POST['password1'];
    $password = $_POST['password'];
    
        
    // checking empty fields
    if(empty($password1)||  empty($password) || ($password != $password1) ) { 

     if(empty($password1)) {
            echo "<font color='red'>Id field is empty.</font><br/>";
        }

       
        
        if(empty($password)) {
            echo "<font color='red'>password field is empty.</font><br/>";
        }
      if ($password != $password1) {
        echo "<font color='red'>both password need to be same.</font><br/>";
        
      }
        
         echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        exit();
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE user SET password=$password WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: home.php");
    }
}
?>
<?php
//getting id from url

 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $password = $res['password'];
    
}
?>
<html>
<head>    
    <title>Change Password</title>
</head>
 <style >
   body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.menubar {
  overflow: hidden;
  background-color: #3300FF;
}
.company{

float: right;
  color: ##060000 ;
  text-align: center;
  text-transform: bold;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.menubar a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  text-transform: bold;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.menubar a:hover {
  background-color: #3300FF;
  color: black;
}

.menubar a.active {
  background-color: #FFFFFF;
  color: blue;
}

.button {
  background-color: #3300FF;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
 </style>
<body><div class="Menubar">
     <a href="home.php">Home</a>
     <a href="delete.php">Delete</a>
    <a href="edit.php">Edit Info</a>
    <a href="change_password.php">CHANGE PASSWORD</a>
    <a href="login.php">LOGOUT</a>
    <div class="company"><h2>Aiub</h2></div>
    </div>
    <form name="form1" method="post" action="change_password.php">
        <table border="0">
           <tr>
     <td>
          <?php
 if(isset($_SESSION["id"])){
    $id =  $_SESSION["id"] ;
echo "Id :". $_SESSION["id"] ."";
}
?>
     </td>
 </tr>
 
            <tr> 
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            
            <tr> 
                <td>Password</td>
                <td><input type="password" name="password1"></td>
            </tr>
           
            </tr>   <tr>             <td><input type="submit" name="Update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>