<?php 
$server = "localhost";
$user = "root";
$pw = "";
$db = "news";

//create connection

$conn = new mysqli($server, $user, $pw, $db);

//check connection
if ($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
}


if(isset($_POST['submit'])){

    $userName = $_POST['userName'];
    $password = $_POST['password'];
    
    $sql = "SELECT Password FROM users WHERE userName='$userName'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if($row['Password']==$password){
        //echo "Login Successfull!";
        header('location:adminPanel.php');
    }
    else{
        header('location:signin.php?error=Invalid User name or Password !');
    }
}



$conn->close();

?>






<html>
<head>
    <title>News Admin Sign In</title>

    <style>
        body{
        margin: 10px;
        padding: 0;
        background-color: rgba(200, 200, 200, 0.05);
        /* background: url("login-bg.png"); */
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        }

        .container{
            text-align:center;
            width: 70%;
            max-width:400px;
            border: 0px solid black;
            border-radius: 10px;
            margin: 20vh auto;
            padding: 20px;
            background-color: rgba(200, 200, 200, 0.2);
        }

        input{
            display: block;
            width: 90%;
            margin: 10px auto;
            padding: 5px;
        }
        label{
            text-align:left;
            display: block;
            width: 100%;
            margin: 5px;
            padding: 5px;
        }

        .submit {
            display: inline;
            width: 100px;
            align:center;
            margin: 5px 5px 5px 50px;
            padding: 5px;
        }

        .clear{
            display: inline;
            width: 100px;
            align:center;
            margin: 5px 50px 5px 5px;
            padding: 5px;
            float:right;
        }

        .error{
            text-align:center;
            background: #F2DEDE;
            color: #A94442;
            padding:10px;
            width:90%;
            border-radius:5px;
        }

        h1 span{
            letter-spacing:6px;
            border-left:3px solid red;
            width:max-content;
            padding:5px;
        }

            
    </style>
</head>
<body>
    <div class="container">
        <h1><span></span>Sign In</h1>
        <br>
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error'] ?> </p>
        <?php } ?>
        <br>

        <form name="sign" method="post" action="">

            <label>User Name : </label>
            <input type="text"  name="userName" placeholder="User name" required autocomplete="off"><br>
            
            <label>Password : </label>
            <input type="password"  name="password" placeholder="password" required autocomplete="off"><br>
            
            <input type="submit" class="submit" name="submit" value="Log In">
            <input type="reset" class="clear" name="clear" value="Clear">

        </form>
    </div>
</body>
</html>