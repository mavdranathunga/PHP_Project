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

?>





<html>
<head>
    <title>News Home</title>

    <style>
        body{
            /* font-family: Tahoma, sans-serif; */
            background-color: rgba(252, 252, 250, 1);
        }

        .mainContainer{
            width:85%;
            margin: 10px auto;
            border: 0px solid black;
        }

        /* nav bar.................................................................. */
        .navBar{
            position: sticky;
            width: 100%;
            top: 0px;
        }

        .navBar ::selection {
            background: transparent;
        }

        .navBar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #faf9fa;
            /* background-color: rgba(80, 80, 80, 1); */
            font-size: larger;
            font-weight: bold;
            border-bottom:red 3px solid;
        }

        .navBar li {
            float: left;
        }

        li a , .logoImg{
            display: block;
            color: black;
            text-align: center;
            padding: 16px 20px;
            text-decoration: none;
        }

        li a:hover {
            background-color: rgba(200, 200, 200, 0.4);
        }

        .logoImg img{
            height:25px;
        }



        /* content............................................................... */
        .content {
            display: flex;
            flex-wrap: wrap;
            margin: 20px 10px;
            padding: 5px;
            border: 0px solid blue;
            justify-content: space-around;
        }

        .newsBox-breaking{
            background-color: rgba(240, 240, 240, 0.6);
            display: flex;
            flex-direction: column;
            margin: 10px 8px;
            padding: 10px;
            border: 0px solid black;
            border-radius: 10px;
            min-height: 100px ;
            min-width: 300px;
            max-width: 580px;
        }

        .newsBox-other{
            background-color: rgba(240, 240, 240, 0.6);
            display: flex;
            flex-direction: column;
            margin: 10px 8px;
            padding: 10px;
            border: 0px solid black;
            border-radius: 10px;
            min-height: 100px ;
            min-width: 300px;
            max-width: 360px;
        }

        .newsBox-breaking:hover, .newsBox-other:hover{
            background-color: rgba(230, 230, 230, 1);
        }

        .newsBox-content-breaking, .newsBox-content-other{
            display: flex;
        }

        .newsBox-breaking .picture {
            border: 0px solid red;
            padding: 5px;
            width: 120px;
        }

        .newsBox-other .picture {
            border: 0px solid red;
            padding: 5px;
            width: 90px;
            max-width:120px;

        }

        .newsBox-breaking .heading{
            font-weight: bold;
            background-color: rgb(255, 58, 58);
            color: white;
            border: 0px solid red;
            padding: 5px;
            min-width: 180px;
            max-width: 460px;
            max-height: 53px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .newsBox-other .heading {
            font-weight: bold;
            /* background-color: rgb(255, 58, 58); */
            color: black;
            border: 0px solid red;
            padding: 5px;
            min-width: 300px;
            max-width: 360px;
            max-height: 53px;
            overflow: hidden;
            text-overflow: ellipsis;

        }

        .newsBox-other .heading:hover {
            color:red;
        }

        .newsBox-breaking .heading:hover {
            color:black;
        }

        .newsBox-breaking .summary{
            border: 0px solid blue;
            padding: 5px;
            min-width: 180px;
            max-width: 460px;
            min-height: 92px;
            max-height: 184px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .newsBox-other .summary{
            border: 0px solid blue;
            padding: 5px;
            min-width: 180px;
            max-width: 330px;
            min-height: 92px;
            max-height: 184px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .reporter {
            font-size: smaller;
            border: 0px solid green;
            padding: 5px;
            max-height: 18.4px;
            overflow: hidden;
            color: rgb(116, 116, 116);
        }

        .date {
            font-size: small;
            color: blue;
            border-left: 1px solid blue;
            padding: 5px;
            max-height: 18.4px;
            overflow: hidden;
            float: right;
        }

        button {
            margin: 0px auto;
            float: inline-end;
        }

        hr{
            width: 0vw;
        }

        .footer{
            width: 100%;
            display: flex;
            height: 200px;
            background-color: rgba(180, 180, 180, 1);
            color: black;
            justify-content: center;
            align-items: center;
            bottom: 0;
            letter-spacing:5px;
            font-weight:light;
            font-size:medium;
        }

        .newsTypes{
            /* background-color:#eaeaed; */
            padding: 5px;
            letter-spacing: 5px;
            border-bottom:2px solid Blue;
        }

        .logo{
            font-size:larger;
            font-weight: bold;
            letter-spacing: 5px;
        }

        .banner{
            border-radius: 30px 0px 30px 0px;
            border: 0px red solid;
            background-color:red;
            height:150px;
            width:100%;
            background: url("banner_news.jpg");
            background-size:cover;
            background-position:center;
        }

        .timeDate{
            color:red;
            float:right;
            font-size:medium;
            font-weight:bold;
            margin:5px;
            padding:5px;
            letter-spacing:2px;

        }

        .sectionLinks{
            display:flex;
            margin:10px;
            justify-content:space-around;
            border: 0px solid black;
        }

        .sectionLinks a{
            margin:5px;
            padding:5px;
            border: 0px solid black;
            text-decoration:none;
        }

        .sectionLinks a:hover{
            color:red;
        }

        h3{
            overflow: hidden;
            text-overflow: ellipsis;
        }

    </style>
</head>
<body>
    <div class="mainContainer">
        <div class="banner"></div>
        <div class="navBar">
            <ul>
                <li><a href="home.php" class="logo">World News</a></li>
                <li class="logoImg"><img src="http://www.adaderana.lk/2021/assets/images/sl_flag.gif" alt=""></li>
                <li style="float:right"><a href="signin.php" target="_blank">Log In</a></li>
            </ul>
        </div>

        <div class="sectionLinks">
            <a href="#breakingNews">Breaking News</a>
            <a href="#latestNews">Latest News</a>
            <a href="#localNews">local News</a>
            <a href="#foreignNews">Foreign News</a>
            <a href="#sportsNews">Sports News</a>
            
            <span class="timeDate"><?php echo date('M d, Y h:i:s')  ?></span>
        </div>

        <h3 class="newsTypes" id="breakingNews" style="background-color:#fbfb8; color:red; border-bottom:2px solid red;">Breaking News... </h3>
        <div class="content">
            
            <?php 

                $sql = "SELECT * FROM content WHERE type = 'breaking' ORDER BY updatedDate DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    echo    "<div class='newsBox-breaking' >
                                <div class='newsBox-content-breaking'>
                                    <div class='picture' style=\"background:url('". $row["picture"] . "'); background-color: #cccccc; background-position: center; background-repeat: no-repeat; background-size: cover;\"></div>
                                    <div>
                                        <div class='heading'>". $row["heading"] . "</div>
                                        <div class='summary'>". $row["summary"] . "</div>
                                        <div class='reporter'>Reported by : ". $row["reporter"] . "</div>
                                        <div class='date'>". $row["updatedDate"] . "</div>
                                    </div>
                                </div>
                                <button>Read more</button>
                            </div>";

                        // "<div class=\"newsBox\" style=\"width: 500px; min-width: 35%;  min-height: 200px;\">
                        //         <table style=\"width:100%; height:100%; border:0px solid black;\"> 
                                    
                        //             <tr > ;
                        //                 <td rowspan=4 style=\"background:url('". $row["picture"] . "'); background-size:cover; background-position:center;\"></td>
                        //                 <td style=\" color:white; background-color:#ff4c4a; height:10px; padding:10px 5px 0px 10px;\"> <h4>" . $row["heading"] . "</h4></td>
                        //             </tr>
                        //             <tr>
                        //                 <td style=' height:10px;'><p>" . $row["summary"] . "<p></td>
                        //             </tr>
                        //             <tr>
                        //                 <td style=' font-size:14px; height:10px; color:#80808b;'><p>Reported by : " . $row["reporter"] . "<p></td>
                        //             </tr>
                        //             <tr>
                        //                 <td style='float:right; font-size:smaller; height:10px; color:blue;'><p>" . $row["updatedDate"] . "<p></td>
                        //             </tr>

                        //         </table>
                        //         <button>Read More</button>
                        //     </div>";

                }
                } else {
                echo "No News yet....";
                }

            ?>
        </div>
            
        <hr>
        <h3 class="newsTypes" id="latestNews" >Latest News...</h3>
        <div class="content">
            
            <?php 

                $sql = "SELECT * FROM content ORDER BY updatedDate DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {


                    echo    "<div class='newsBox-other'>
                                <div>
                                    <div class='heading'>". $row["heading"] . "</div>
                                    <div class='newsBox-content-other'>
                                        <div class='picture' style=\"background:url('". $row["picture"] . "'); background-color: #cccccc; background-position: center; background-repeat: no-repeat; background-size: cover;\"></div>
                                        <div>
                                            <div class='summary'>". $row["summary"] . "</div>
                                            <div class='reporter'>Reported by : ". $row["reporter"] . "</div>
                                            <div class='date'>". $row["updatedDate"] . "</div>
                                        </div>
                                    </div>
                                </div>
                                <button>Read more</button>
                            </div>";

                    // echo    "<div class=\"newsBox\" style=''>
                    //             <table style=\"width:100%; height:95%;\"> 
                    //                 <tr >
                    //                     <td colspan=2 style=\"color:black; background-color:; padding:10px 5px 0px 10px;\"> <h4 style='border-left:2px solid blue; padding:5px;'>" . $row["heading"] . "</h4></td>
                    //                 </tr>
                    //                 <tr>
                    //                     <td rowspan=3 style=\"background:url('". $row["picture"] . "'); background-size:cover; background-position:center; width:40%;\"></td>
                    //                     <td style=' height:59%;'><p>" . $row["summary"] . "<p></td>
                    //                 </tr>
                    //                 <tr>
                    //                     <td style=' font-size:14px; height:10px; color:#80808b;'><p>Reported by : " . $row["reporter"] . "<p></td>
                    //                 </tr>
                    //                 <tr>
                    //                     <td style='float:right; font-size:smaller; height:10px; color:blue;'><p>" . $row["updatedDate"] . "<p></td>
                    //                 </tr>

                    //             </table>
                    //             <button >Read More</button>
                    //         </div>";

                }
                } else {
                echo "No News yet....";
                }
            ?>
        </div>

        <hr>
        <h3 class="newsTypes" id="localNews">Local News...</h3>
        <div class="content">
            
            <?php 
            
                $sql = "SELECT * FROM content WHERE type = 'local' ORDER BY updatedDate DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    echo    "<div class='newsBox-other'>
                                <div>
                                    <div class='heading'>". $row["heading"] . "</div>
                                    <div class='newsBox-content-other'>
                                        <div class='picture' style=\"background:url('". $row["picture"] . "'); background-color: #cccccc; background-position: center; background-repeat: no-repeat; background-size: cover;\"></div>
                                        <div>
                                            <div class='summary'>". $row["summary"] . "</div>
                                            <div class='reporter'>Reported by : ". $row["reporter"] . "</div>
                                            <div class='date'>". $row["updatedDate"] . "</div>
                                        </div>
                                    </div>
                                </div>
                                <button>Read more</button>
                            </div>";
                
                }
                } else {
                echo "No News yet....";
                }

            ?>
        </div>

        <hr>
        <h3 class="newsTypes" id="foreignNews" >Foreign News...</h3>
        <div class="content">
            
            <?php 
            
            $sql = "SELECT * FROM content WHERE type = 'foreign' ORDER BY updatedDate DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {

                echo    "<div class='newsBox-other'>
                            <div>
                                <div class='heading'>". $row["heading"] . "</div>
                                <div class='newsBox-content-other'>
                                    <div class='picture' style=\"background:url('". $row["picture"] . "'); background-color: #cccccc; background-position: center; background-repeat: no-repeat; background-size: cover;\"></div>
                                    <div>
                                        <div class='summary'>". $row["summary"] . "</div>
                                        <div class='reporter'>Reported by : ". $row["reporter"] . "</div>
                                        <div class='date'>". $row["updatedDate"] . "</div>
                                    </div>
                                </div>
                            </div>
                            <button>Read more</button>
                        </div>";
            }
            } else {
            echo "No News yet....";
            }

            ?>
        </div>

        <hr>
        <h3 class="newsTypes" id="sportsNews" >Sports News...</h3>
        <div class="content">
            
            <?php 

                $sql = "SELECT * FROM content WHERE type = 'sports' ORDER BY updatedDate DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {


                    echo    "<div class='newsBox-other'>
                                <div>
                                    <div class='heading'>". $row["heading"] . "</div>
                                    <div class='newsBox-content-other'>
                                        <div class='picture' style=\"background:url('". $row["picture"] . "'); background-color: #cccccc; background-position: center; background-repeat: no-repeat; background-size: cover;\"></div>
                                        <div>
                                            <div class='summary'>". $row["summary"] . "</div>
                                            <div class='reporter'>Reported by : ". $row["reporter"] . "</div>
                                            <div class='date'>". $row["updatedDate"] . "</div>
                                        </div>
                                    </div>
                                </div>
                                <button>Read more</button>
                            </div>";
                }
                } else {
                echo "No News yet....";
                }

            $conn->close();
            

            ?>
        </div>
        
        <hr>
        <div class="footer">
            <h4>Created by a Team</h4>
        </div>
    </div>


</body>
</html>