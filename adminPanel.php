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

    // $sqlNews = $conn->query("SELECT COUNT(*) FROM content ");
    // $newsCount = $sqlNews->fetch_assoc();

    // echo $newsCount;

    $sql = "SELECT * from content";
  
    if ($result = mysqli_query($conn, $sql)) {
  
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );

    }
     

    $sql = "SELECT * FROM content ORDER BY updatedDate DESC";
    $result = $conn->query($sql);
?>



<html>
<head>
    <title>Admin Dashboard</title>

    <style>
        .container{
            width:90%;
            margin:20px auto;
        }

        h1{
            letter-spacing:5px;
            padding:10px;
            border-bottom: 2px red solid;
        }

        table {
        border-collapse: collapse;
        width: 95%;
        margin: 0px auto;
        }

        td, th {
        border: 1px solid gray;
        text-align: left;
        padding: 8px;
        max-width: 120px;
        overflow: hidden;
        text-overflow: ellipsis;
        }

        .fContent{
            max-width:100px;
        }

        .main-headings td{
            text-align: center;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }

        .insertBtn{
            background-color: #289fdf;
            border:none;
            border-radius:10px;
            padding: 8px 5px;
            font-size: medium;
            font-weight:light;
        }

        .homeBtn{
            background-color: #289fdf;
            border:none;
            border-radius:10px;
            padding: 8px 5px;
            font-size: medium;
            font-weight:light;
        }

        .newsCount{
            background-color: ;
            border:none;
            border-radius:20px;
            padding: 20px;
            font-size: large;
            font-weight:bolder;
        }

        .homeBtn:hover, .insertBtn:hover{
            background-color:#1977aa;
        }

        .updateBtn{
            background-color: #289fdf;
            border:none;
            border-radius:10px;
            width:70px; 
        }

        .updateBtn:hover{
            background-color:#1977aa;
        }

        
        .deleteBtn:hover{
            background-color:#f22;
        }

        .deleteBtn{
            background-color: #f44;
            border:none;
            border-radius:10px;
            width:70px;
        }

        .updateBtn a, .deleteBtn a, .insertBtn a, .homeBtn a{

            display: block;
            color: white;
            text-align: center;
            padding: 8px 5px;
            text-decoration: none;
        }

        .btnContainer{
            display:flex;
            justify-content:space-around;
        }

        .footer{
            width:100%;
            margin:30px 0px;
            padding:20px 0px;
            border-top:3px solid red;
        }


    </style>

</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1><br>
        <div class="btnContainer">
            <button class="insertBtn"><a href="addNews.php" >Insert News</a></button></a>
            <button class="newsCount">Active News Count: <?php echo $rowcount ?></button></a>
            <button class="homeBtn"><a href="home.php" >Back to Home</a></button></a>
        </div>
        
        <div class="displayNews">
            <h2>Existing News</h2>
            <table>
                <tr class="main-headings">
                    <td>ID</td>
                    <td>Type</td>
                    <td>Heading</td>
                    <td>Summary</td>
                    <td>Full Content</td>
                    <td>Picture</td>
                    <td>Reporter</td>
                    <td>Update Date</td>
                    <td>Operations</td>
                </tr>

                <?php 
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {


                        echo    "<tr>
                                    <td>" . $row['id'] . "</td>
                                    <td>" . $row['type'] . "</td>
                                    <td>" . $row['heading'] . "</td>
                                    <td>" . $row['summary'] . "</td>
                                    <td>" . $row['fullContent'] . "</td>
                                    <td>" . $row['picture'] . "</td>
                                    <td>" . $row['reporter'] . "</td>
                                    <td>" . $row['updatedDate'] . "</td>
                                     <td>
                                        <button class='updateBtn'><a href='updateNews.php?updateid=" . $row["id"]. " ' >Update</a></button>
                                        <button class='deleteBtn'><a href='deleteNews.php?deleteid=" . $row["id"]. " ' >Delete</a></button>
                                    </td>
                                </tr> ";

                    }
                    } else {
                    echo "No News yet....";
                    }

                    $conn->close();

                    ?>
                        
                       
                
            </table>
        </div>

        <div class="footer"></div>
    </div>
</body>
</html>