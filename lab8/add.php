<html>
<head>
    <title>Add Data</title>
</head>
 
<body>

<?php
//including the database connection file
include_once("db.php");
$msg = "";
 
if(isset($_POST['Submit'])) { 
    $id = $_POST['id']   ;
$name = $_POST['name']   ;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
     $gender = $_POST['gender'];
      $dob = $_POST['dob'];
      $image = $_FILES['image']['name'];

        
    // checking empty fields
    if(empty($id)||empty($dob)|| empty($gender)|| empty($password)|| empty($username)|| empty($name) || empty($email)) { 
        if(empty($id)) {
            echo "<font color='red'>Id field is empty.</font><br/>";
        }


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
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO user (id,name,email,username,password,gender,dob,image) VALUES('$id','$name','$email','$username','$password','$gender','$dob','$image')");

        $target = "images/".basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {    $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
            # code...
        }
        //display success message
        echo "<font color='blue'>Data added successfully.";
        echo "<br/><a href='home.php'>View Result</a>";
    }
}
?>
</body>
</html>