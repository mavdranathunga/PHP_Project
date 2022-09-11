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

date_default_timezone_set('Asia/Colombo');
$date = date("Y-m-d H:i:s"); 

$id = $_GET['updateid'];

$sql="SELECT * FROM content WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


if(isset($_POST['submit'])){
    $type= $_POST['type'];
    $heading= $_POST['heading'];
    $summary= $_POST['summary'];
    $fullContent= $_POST['fullContent'];
    $picture= $_POST['picture'];
    $reporter= $_POST['reporter'];

    $sql="UPDATE content set id=$id, type='$type', heading='$heading', summary='$summary', fullContent='$fullContent', picture='$picture', reporter='$reporter', updatedDate='$date'  WHERE id=$id";

    if ($conn->query($sql)==TRUE){
        //echo "updated successfully";
        header("Refresh:0; url=adminPanel.php");
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
                margin: ;
                padding: ;
            }

            .container{
                width: 70%;
                border: 0px solid black;
                border-radius: 10px;
                margin: 30px auto;
                padding: 20px;
                background-color: rgba(200, 200, 200, 0.1);
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
            <h2>Update News</h2>
            <form action="" method="post">
                <label>Type : </label>
                <select id="type" name="type">
                    <option value="<?php echo $row['type'] ?>"><?php echo $row['type'] ?></option>
                    <option value="breaking">Breaking</option>
                    <option value="local">Local</option>
                    <option value="foreign">Foriegn</option>
                    <option value="sports">sports</option>
                </select><br>

                <label>Heading : </label>
                <input type="text" class="heading" name="heading" placeholder="Heading" required autocomplete="off" value="<?php echo $row['heading'] ?>"><br>

                <label>Summary : </label>
                <input type="text" class="heading" name="summary" placeholder="Summary" required autocomplete="off" value="<?php echo $row['summary'] ?>"><br>

                <label>Full content : </label>
                <input type="text" class="heading" name="fullContent" placeholder="Full Content" required autocomplete="off" value="<?php echo $row['fullContent'] ?>"><br>

                <label>Picture : </label>
                <input type="text" class="picture" name="picture" placeholder="Picture URL" autocomplete="off" value="<?php echo $row['picture'] ?>"><br>

                <label>Reporter : </label>
                <input type="text" class="reporter" name="reporter" placeholder="reporter" autocomplete="off" value="<?php echo $row['reporter'] ?>"><br>

                <input type="submit" class="submit" name="submit" value="Update">
                
            </form>
        </div>
    </body>
</html>