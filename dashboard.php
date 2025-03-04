<?php
    session_start();
    if(!isset($_SESSION["userdata"])){
        header("location:../");
    }
    $userdata=$_SESSION["userdata"];
    $groupsdata=$_SESSION["groupsdata"];
    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red">Not Voted</b>';
    }
    else{
        $status = '<b style="color:green">Voted</b>';
    }   
?>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System-Dashboard</title>
    <link rel="stylesheet" href="../CSS/stylesheet.css">

</head>

<body>

    <style>
    #backbut{
    padding: 5px;
    border-radius: 5px;4
    width: 5%;
    background-color:rgb(68, 26, 204);
    color: aqua;
    float: left;
    margin: 5px;
    }

    #but{
    padding: 5px;
    border-radius: 5px;
    width: 5%;
    background-color:rgb(68, 26, 204);
    color: aqua;
    float: left;
    }
    
    #profile{
    float: left;
    background-color: rgba(0, 0, 0, 0.8);;
    padding: 10px;
    width: 30%;
    height: 80%;
    }

    #group{
    float: right;
    background-color: rgba(0, 0, 0, 0.8);;
    padding: 10px;
    width: 60%;
    }

    #logoutbut{
    padding: 5px;
    border-radius: 5px;
    width: 5%;
    background-color:rgb(68, 26, 204);
    color: aqua;
    float: right;
    margin: 5px;
    }

    #bodysec{
    padding: 10px;
    }
   
    #voted{
    padding: 5px;
    border-radius: 5px;
    width: 5%;
    background-color:green;
    color: aqua;
    float: left;
    }

    #grp{
        padding: 20px;
    }

    </style>

    <div id="mainsection">
        <div id="headersection">
            <button id="backbut" onclick="history.back()">Back</button>
            <button id="logoutbut" onclick="location.href='../API/logout.php'">Logout</button>
        
            <h1>Online Voting System</h1>
        </div>
    </div>
    <hr>

    <div id="bodysec">
    <div id="Profile">
        <img src="../Uploads/<?php echo $userdata['photo']?>"height="380" width="350" alt="Profile Picture"><br><br>
        <b>Name: <?php echo $userdata['name']?> </b><br><br>
        <b>Mobile: <?php echo $userdata['mobile']?> </b><br><br>
        <b>Address: <?php echo $userdata['address']?> </b><br><br>
        <b>Status: <?php echo $status?> </b><br><br>
    </div>

    <div id="Group">
    <?php 
        if($_SESSION["groupsdata"]){
            for($i=0;$i<count($groupsdata);$i++){
                ?>
                <div id="grp">
                    <img style="float:right" src="../Uploads/<?php echo $groupsdata[$i]['photo']?>" height="150" width="250"><br><br>
                    <b style="float: left">Group Name: <?php echo $groupsdata[$i]['name']?></b><br><br>
                    <b style="float: left">Votes: <?php echo $groupsdata[$i]['votes']?></b><br><br>
                    <form action="../Api/vote.php" method="POST">
                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                        <?php
                            if($_SESSION['userdata']['status']==0){
                                ?>
                                <input type="submit" name="votebtn" value="vote" id="but">
                                <?php
                            }
                            else{?>
                                <button disabled type="button" name="votebtn" value="vote" id="voted">Voted</button>
                                <?php
                            }
                        ?>
                    </form>
                </div><br><br><hr>
                <?php
            }}
        else{

        }
    ?>
    </div>
    </div>

</body>

</html>