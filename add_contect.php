<?php

include('demo.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn = mysqli_connect('localhost', 'root', 'root', 'register');
    // session_start();
    $rs_id = $_SESSION['R_id'];
    if (isset($_GET['up_id']))
    {
        $up_id = $_GET['up_id'];
        $sel_query = "SELECT * FROM  add_contect WHERE c_id = $up_id";
        $sel_data = mysqli_query($conn,$sel_query);
        $sel_fetch = mysqli_fetch_assoc($sel_data);
    }
if (isset($_POST['submit'])) {
    $Name = $_POST['name'];
    $Surname = $_POST['surname'];
    $City = $_POST['city'];
    $Mo_no = $_POST['mobail'];

    if(isset($_GET['up_id']))
    {
        $up_query = "UPDATE  add_contect SET name = '$Name',surname = '$Surname',city ='$City',mobail_no = '$Mo_no' WHERE c_id = $up_id ";
        if(mysqli_query($conn,$up_query))
        {
            header('location:demo.php');
        }
        else
        {
            echo "Sorry Cannot updated Your Data";
        }
    }
    else{
        $insert_query = "INSERT INTO add_contect (user_id,name,surname,city,mobail_no) values ($rs_id,'$Name','$Surname','$City','$Mo_no')";
        if(mysqli_query($conn,$insert_query))
        {
            header('location:demo.php');
        }
        else{
            echo "<script> alert('Sorry Cannot Data Entered');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contect Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <style>
        input {
            box-shadow: 0 0 10px black;
            border-radius: 5px;
        }

        select {
            box-shadow: 0 0 10px black;
            border-radius: 5px;
            padding: 5px;
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card card-header rounded">
                    <h2 class="text-center">Contect Book</h2>
                </div>
            </div>
        </div>
        <div class="row-12 card card-body  rounded">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="col-12">
                    <div class="row mt-5">
                        <div class="col-1">
                            <h6 class="p-1">Name:</h6>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="name" id="" class="p-2" value="<?php echo @$sel_fetch['name'];    ?>">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-1">
                            <h6 class="p-1">Surname:</h6>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="surname" id="" class="p-2" value="<?php echo @$sel_fetch['surname'];    ?>">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-1">
                            <h6 class="p-1">City:</h6>
                        </div>
                        <div class="col-auto">
                            <select name="city" id="" value="<?php echo @$sel_fetch['city'];    ?>">
                                <option class="font-weight-bold">Surat</option>
                                <option class="font-weight-bold">Bardoli</option>
                                <option class="font-weight-bold">Navsari</option>
                                <option class="font-weight-bold">Vapi</option>
                                <option class="font-weight-bold">Mehsana</option>
                                <option class="font-weight-bold">Baroda</option>
                                <option class="font-weight-bold">Mubai</option>
                                <option class="font-weight-bold">Ahemdabad</option>
                                <option class="font-weight-bold">Bhavnager</option>
                                <option class="font-weight-bold">Rajkot</option>
                                <option class="font-weight-bold">Amreli</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-auto">
                            <h6 class="p-1">Mobail No:</h6>
                        </div>
                        <div class="col-auto">
                            <input type="number" name="mobail" id="" class="p-2" value="<?php echo @$sel_fetch['mobail_no'];    ?>">
                        </div>
                    </div>
                </div>
        </div>
        <div class="card card-footer">
            <div class="col-12">
                <div class="row mt-2">
                    <div class="col-1">
                        <h6 class="p-1"></h6>
                    </div>
                    <div class="col-auto">
                        <input type="submit" name="submit" id="" class="px-4 py-2 rounded-3  btn btn-dark text-white" value="submit">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</body>

</html>

<?php include('footer.php');     ?>