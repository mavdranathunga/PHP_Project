<?php 
$server = "localhost";
$user = "root";
$pw = "";
$db = "news";

//create connection

$conn = new mysqli($server, $user, $pw, $db);

date_default_timezone_set('Asia/Colombo');
$date = date("Y-m-d H:i:s"); 

//check connection
if ($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){
    $type= $_POST['type'];
    $heading= $_POST['heading'];
    $summary= $_POST['summary'];
    $fullContent= $_POST['fullContent'];
    $picture= $_POST['picture'];
    $reporter= $_POST['reporter'];

    $sql="INSERT INTO content (type, heading, summary, fullContent, picture, reporter, updatedDate) values('$type','$heading','$summary','$fullContent','$picture','$reporter','$date')";

    if ($conn->query($sql)==TRUE){
    header('location:adminPanel.php');
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
}
 


$conn->close();

?>

<html>
    <head>
        <title>Add News</title>

        <style>
            body{
                margin: 0px;
                padding: 0px;
            }

            .container{
                width: 70%;
                max-width:800px;
                border: 0px solid black;
                border-radius: 10px;
                margin: 40px auto;
                padding: 30px;
                background-color: rgba(200, 200, 200, 0.2);
            }

            h2{
                letter-spacing:5px;
                padding:5px;
                border-left:3px solid red;
            }
            
            input, select{
                display: block;
                width: 100%;
                margin: 10px;
                padding: 5px;
            }

            .submit, .clear {
                display: inline;
                width: 100px;
                align:center;
                margin: 5px;
                padding: 5px;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <h2 >Insert News</h2>
            <form action="" method="post">
                <label>Type : </label>
                <select id="type" name="type">
                    <option value="breaking">Breaking</option>
                    <option value="local">Local</option>
                    <option value="foreign">Foriegn</option>
                    <option value="sports">sports</option>
                </select><br>

                <label>Heading : </label>
                <input type="text" class="heading" name="heading" placeholder="Heading" required autocomplete="off"><br>

                <label>Summary : </label>
                <input type="text" class="heading" name="summary" placeholder="Summary" required autocomplete="off"><br>

                <label>Full content : </label>
                <input type="text" class="heading" name="fullContent" placeholder="Full Content" required autocomplete="off"><br>

                <label>Picture : </label>
                <input type="text" class="picture" name="picture" placeholder="Picture URL" autocomplete="off"><br>

                <label>Reporter : </label>
                <input type="text" class="reporter" name="reporter" placeholder="reporter" autocomplete="off"><br>

                <input type="submit" class="submit" name="submit">
                <input type="reset" class="clear" name="clear">
            </form>
        </div>
    </body>
</html>