<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn = mysqli_connect('localhost', 'root', 'root', 'register');
session_start();

if (isset($_SESSION['User_email']) && isset($_SESSION['User_pass']) && isset($_SESSION['User_email']) != '' && isset($_SESSION['User_pass']) != '') {
    header("Location:demo.php");
}

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password  = $_POST['password'];
    $sel_query = "SELECT * FROM register_form where Email = '$email' AND Password = '$password'";
    $data = mysqli_query($conn, $sel_query);
    $count =  mysqli_num_rows($data);
    if ($count == 1) {
        $row =  mysqli_fetch_assoc($data);
        $_SESSION['User_email'] = $row['Email'];
        $_SESSION['User_pass'] = $row['Password'];
        $_SESSION['R_id'] = $row['R_id'];
        header("Location:demo.php");
    } else if ($email == '' && $password == '') {
        echo "<script> alert('Plz, Enter Your Email and Password')</script>";
    } else {
        echo "<script> alert('Sorry, Invaild Id and Password')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main {
            height: auto;
            width: 500px;
            border: 1px solid black;
            margin-top: 20px;
            box-shadow: 0 0 10px black;
        }

        .user_icon {
            font-size: 24px;
        }
    </style>
</head>
<body>
    <section>
        <div class="container d-flex justify-content-center ">
            <div class="row-6">
                <div class="col-12  main rounded">
                    <div class="card card-header p-3 d-flex text-center">
                        <i class="bi bi-people-fill user_icon"></i>
                        <h4>Login Page</h4>
                    </div>
                    <div class=" card card-body">
                        <form action="" method="post">
                            <table>
                                <tr>
                                    <td class="p-3">Emaill:</td>
                                    <td class="ps-2">
                                        <input type="email" name="email" id="" class="p-2">
                                    </td>
                                </tr>
                                <tr class="mt-3">
                                    <td class="p-3">Password:</td>
                                    <td class="ps-2">
                                        <input type="password" name="password" id="" class="p-2">
                                    </td>
                                </tr>
                                <tr class="mt-3">
                                    <td class="ps-2" colspan="2">
                                        <i class="bi bi-box-arrow-in-right"></i>
                                        <input type="submit" value="Login" name="login" class="px-4 py-2 rounded bg-dark text-white mt-3">

                                        <i class="bi bi-person-plus-fill" style="margin-left: 10px"></i>
                                        <button class="btn btn-primary py-2 px-4">
                                            <a href="register.php" class="text-white" style="text-decoration: none">Register</a>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>