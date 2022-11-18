<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
// print_r($_SESSION);
if (isset($_SESSION['User_email']) && isset($_SESSION['User_pass']) && isset($_SESSION['User_email']) != '' && isset($_SESSION['User_pass']) != '') {
    echo "<h3>Welcome to our Website</h3>";
    // header("Location:demo.php");
} else {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <style>
        .logout_btn {
            background-color: black;
            color: white;
            box-shadow: 0 0 5px red;
            font-weight: bold;
            padding: 8px;
            border: none;
            border-radius: 4px;
            margin-left: 15px;
        }

        .logout_btn a{
            color: white;
            list-style: none;
            text-decoration: none;
            padding: 10px;
        }
        .main_header .logout_btn li a {
            color: white;
        }


        .logo_img img {
            height: 100%;
            /* width: 100%; */
            box-sizing: border-box;
        }

        .main_header ul {
            margin: 0;
            height: 100px;

        }

        .main_header ul li {
            margin-left: 20px;
            list-style: none;
            justify-content: space-between;
            border-radius: 5px;
            padding: 10px;

        }
        h3{
            text-align: center;
        }

        .main_header ul li a {
            color: black;
            text-decoration: none;
            font-weight: 500;
            /* padding: 10px;  */

        }
        ul li:hover{
            background: black;
            cursor: pointer;
            transition: .5s;
            /* color: white; */
        }
        .main_header ul li:hover a{
        color:  white;
      }
    </style>
</head>

<body>
    <div class="bg-warning">

        <div class="container">
            <div class="row">
                <div class="d-flex">
                    <div class="col-4">
                        <div style="height: 100px;" class="logo_img">
                            <img src="https://silentinfotech.com/wp-content/uploads/2019/10/Silent-Infotech-Logo-with-Text-500dpi-1.png" alt="">
                        </div>
                    </div>
                    <div class="col-8 main_header">
                        <ul class="d-flex  align-items-center justify-content-around">
                            <li><a href="add_contect.php" id="add_contect">Add Contect</a></li>
                            <li><a href="view_contect.php">View Contect</a></li>
                            <li><a href="manag_account.php">Manage Account</a></li>
                            <button class="logout_btn">
                                <li class="p-0 m-0 ">
                                    <a href="logout.php">Logout</a>
                                </li>
                            </button>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

<?php
include('footer.php');

?>