<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        body{
            background-color: whitesmoke;
            font-family: 'Tajawal', sans-serif;

        }
        #mother{
            width: 100%;
            font-size: 20px;

        }
        main{
            float:right;
            border:1px solid gray;
            padding:5px;
        }
        input{
            padding:4px;
            border:2px solid black;
            text-align: center;
            font-size: 17px;
            font-family: 'Tajawal', sans-serif;

        }
        aside{
            text-align: center;
            width:300px;
            float:left;
            border:1px solid black;
            padding:10px;
            font-size: 20px;
            background-color: silver;
            color:white;
        }
        #tbl{
            width:890px;
            font-size: 20px;
        }
        #tbl th{
            background-color: silver;
            color:black;
            font-size: 20px;
            padding:10px;

        }
        aside button{
            width:200px;
            padding:8px;
            margin-top: 7px;
            font-size: 17px;
            font-family: 'Tajawal', sans-serif;
            font-weight: bold;


        }
    </style>
</head>
<body >
    <?php
        #connection with database
        $host="localhost";
        $user="root";
        $pass="123456";
        $db="student";
        $con=mysqli_connect($host,$user,$pass,$db);
        $res=mysqli_query($con,"select * from student");
        #button variable
        $id='';
        $name='';
        $address='';
        if(isset($_POST['id'])){
            $id=$_POST['id'];
        }
        if(isset($_POST['name'])){
            $name=$_POST['name'];
        }
        if(isset($_POST['address'])){
            $address=$_POST['address'];
        }
        $sqls='';
        if(isset($_POST['add'])){
            $sqls="insert into student value($id,'$name','$address')";
            mysqli_query($con,$sqls);
            header("location:home.php");
        }
        if(isset($_POST['del'])){
            $sqls="delete from student where name='$name'";
            mysqli_query($con,$sqls);
            header("location:home.php");
        }


    ?>
    <div id="mother">
        <form method="POST">
            <!-- Control Panel -->
            <aside>
            <div id="div">
                <img src="https://leadschool.in/wp-content/uploads/2022/02/Img_987-edited-e1643982754142.png" alt="logo of site" width="200">
                <h3>Director paint</h3>
                <label>student Number :</label><br>
                <input type="text" name="id" id="id"><br>
                <label>Student Name :</label><br>
                <input type="text" name="name" id="name"><br>
                <label>Student Address :</label><br>
                <input type="text" name="address" id="address"><br><br>
                <button name="add"> Add Student</button>
                <button name="del"> Delete Student</button>
            </div>
            </aside>
            <!-- student data display  -->
            <main>
            <table id="tbl">
                <tr>
                    <th>Serial number</th>
                    <th> Student Name</th>
                    <th> Student adress</th>
                </tr>
                <?php
                while ($row=mysqli_fetch_array($res)){
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['address']."</td>";
                    echo "</tr>";
                }
                ?>
            </table>

            </main>
        </form>
    </div>
</body>
</html>