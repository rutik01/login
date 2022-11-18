<?php
include('demo.php');

$conn = mysqli_connect('localhost', 'root', 'root', 'register');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//session_start();
if(isset($_GET['d_id']))
{
    $del_id = $_GET['d_id'];
    $del_query = "DELETE FROM register_form WHERE R_id = $del_id ";

    if(mysqli_query($conn,$del_query))
    {
        $ad_delete_query = "DELETE FROM  add_contect WHERE user_id = $del_id";
        if(mysqli_query($conn,$ad_delete_query))
        {
            session_destroy();
            header('location:index.php');
        }
        else{
            echo "Sorry Cannot Delete Your contect data";
        }
    }
    else
    {
        echo "<script> alert('Sorry Some Problem Found'); </script>";
    }
}
$r_id =  $_SESSION['R_id'];
$sel_que = "SELECT * FROM register_form WHERE R_id = $r_id";

$user_info = mysqli_query($conn, $sel_que);
$data = mysqli_fetch_assoc($user_info);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contect </title>
  
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container{
            /* max-width: 1140px; */
            margin: auto;
        }
        table{
            margin-top: 20px;
        }
        table th{
            background: brown;
            color: white;
            padding: 10px;

        }
        table td{
            text-align: center;
            padding: 10px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container">
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Address</th>
                <th>Email</th>
                <th>Password</th>
                <th>Dob</th>
                <th>City</th>
                <th>Document</th>
                <th>Image</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <tr>
                <td><?php echo $data['Name'];    ?></td>
                <td><?php echo $data['Surname'];   ?></td>
                <td><?php echo $data['Address'];    ?></td>
                <td><?php echo $data['Email'];  ?></td>
                <td><?php echo $data['Password'];   ?> </td>
                <td><?php echo $data['Dob'];    ?></td>
                <td><?php echo $data['City'];    ?></td>
                <td><?php echo $data['Document'];  ?></td>
                <td>
                    <img src="img/<?php echo $data['Image']  ?>" alt="" height="100px" width="100px">
                </td>
                <td><a href="register.php?up_id=<?php echo $r_id;?>">Update</a></td>
                <td><a href="manag_account.php?d_id=<?php  echo $r_id   ?>">Delete</a></td>
            </tr>
        </table>
    </div>





</body>

</html>


<?php include ('footer.php');?>