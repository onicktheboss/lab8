<?php
// including the database connection file
include_once("db.php");
 
f(isset($_POST['Submit'])) { 
$name = $_POST['name']   ;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
     $gender = $_POST['gender'];
      $dob = $_POST['dob'];
        
    // checking empty fields
    if(empty($dob)|| empty($gender)|| empty($password)|| empty($name) || empty($email)) { 

     if(empty($name)) {
            echo "<font color='red'>Id field is empty.</font><br/>";
        }

        if(empty($username)) {
            echo "<font color='red'>userame field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>email field is empty.</font><br/>";
        }
        
        if(empty($password)) {
            echo "<font color='red'>password field is empty.</font><br/>";
        }
        if(empty($gender)) {
            echo "<font color='red'>gender field is empty.</font><br/>";
        }
        if(empty($dob)) {
            echo "<font color='red'>dob field is empty.</font><br/>";
        }
        
         echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        exit();
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE products SET name='$name',email='$email',gender='$gender',dob='$dob' WHERE username=$username");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: home.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $des = $res['des'];
    $quantity = $res['quantity'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
 <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            
            <tr> 
                <td>Password</td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" name="gender">Male</td>
                <td><input type="radio" name="gender">Female</td><br><br>
            </tr>
             <tr> 
                <td>Date</td>
                <td><input type="Date" name="dob"></td>
            </tr>                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>