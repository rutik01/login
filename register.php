<!DOCTYPE html>
<html lang="en">    
<?php

//include ('demo.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = mysqli_connect('localhost', 'root', 'root', 'register');
if (isset($_GET['up_id'])) {
    $u_id = $_GET['up_id'];
    $sel_query  = "SELECT * FROM register_form WHERE R_id = '$u_id'";
    $data = mysqli_query($conn, $sel_query);
    $fetch_data = mysqli_fetch_assoc($data);
    // echo '<pre>';
    // print_r($fetch_data);
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $address  = $_POST['address'];
    $email  = $_POST['email'];
    $password = $_POST['Password'];
    $dob = $_POST['dob'];
    $city = $_POST['City'];
    $document = $_POST['Document'];
    $image = $_FILES['image']['name'];
    $path = "img/" . $image;

    if (isset($_GET['up_id'])) {
        $img_data = $fetch_data['Image'];
        if ($image == '') {
            $img_up_data = $img_data;
        } else {
//            echo $img_data;
            $img_up_data = $image;
            if(move_uploaded_file($_FILES['image']['tmp_name'], $path))
            {
                unlink("img/".$img_data);
            }
        }
        $update_query = "UPDATE register_form SET Name = '$name',Surname = '$surname',Address ='$address',Email='$email ',Password='$password',Dob='$dob',City='$city',Document='$document',Image='$img_up_data' WHERE R_id = '$u_id'";
        if (mysqli_query($conn, $update_query)) {
            echo 'Data Successfully Updated';
            header('Location:demo.php');
        } else {
            echo 'Sorry Some Error';
        }
    }
    else{
        $insert_query =  "INSERT INTO register_form (Name,Surname,Address,Email,Password,Dob,City,Document,Image) values ('$name','$surname','$address','$email','$password','$dob','$city','$document','$image') ";
        //    $data = mysqli_query($conn,$insert_query);
        if (mysqli_query($conn, $insert_query)) {
            if ($image != '') {
                move_uploaded_file($_FILES['image']['tmp_name'], $path);
                echo "<script> alert('Data Successfully Added')</script>";
            }
            header('location:index.php');
        } else {
            echo "<script> alert('Plz Enter Your Information')</script>";
        }
    }
}
if (isset($_POST['exit'])) {
    header("Location:index.php");
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            border: 1px solid black;
            border-radius: 20px;
        }

        table {
            margin-left: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <div class="container bg-white border border-white-1">
            <hr>
            <div class="row card-header bg-dark text-white">
                <div class="col-12 text-center mt-4">
                    <h3>!! 🆁🅴🅶🅸🆂🆃🅴🆁-🅵🅾🆁🅼 !!</h3>
                </div>
            </div>
            <hr>
            <div class="row-12">
                <div class="col-12">
                    <div class="row mt-5">
                        <div class="col-2">
                            <h5 class="p-2">*First Name:</h5>
                        </div>
                        <div class="col-auto m-0">
                            <input type="text" name="name" id="" class="p-2 rounded-3" require value="<?php echo @$fetch_data['Name'];   ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2">
                            <h5 class="p-2">*Surname:</h5>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="surname" id="" class="p-2 rounded-3" require value="<?php echo @$fetch_data['Surname'];   ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2">
                            <h5 class="p-2">*Address:</h5>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="address" id="" class="p-2 rounded-3" require value="<?php echo @$fetch_data['Address'];   ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2">
                            <h5 class="p-2">*Email:</h5>
                        </div>
                        <div class="col-auto">
                            <input type="email" name="email" id="" class="p-2 rounded-3" require value="<?php echo @$fetch_data['Email'];   ?>">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-2">
                            <h5 class="p-2">*Password:</h5>
                        </div>
                        <div class="col-auto">
                            <input type="password" name="Password" class="p-2 rounded-3" require value="<?php echo @$fetch_data['Password'];   ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2">
                            <h5 class="p-2">*DOB:</h5>
                        </div>
                        <div class="col-auto">
                            <input type="date" name="dob" id="" class="p-2 rounded-3" require value="<?php echo @$fetch_data['Dob'];   ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2">
                            <h5 class="p-2">*City:</h5>
                        </div>
                        <div class="col-auto">
                            <select class="p-2 rounded-2 text-bold" name="City" require value="<?php echo @$fetch_data['City'];   ?>">
                                <option class="font-weight-bold">Surat</option>
                                <option class="font-weight-bold">Ahemdabad</option>
                                <option class="font-weight-bold">Baroda</option>
                                <option class="font-weight-bold">Bharuch</option>
                                <option class="font-weight-bold">Vapi</option>
                                <option class="font-weight-bold">Valsad</option>
                                <option class="font-weight-bold">Navsari</option>
                                <option class="font-weight-bold">Aanad</option>
                                <option class="font-weight-bold">Gandhinagar</option>
                                <option class="font-weight-bold">Banglore</option>
                                <option class="font-weight-bold">Rajkot</option>
                                <option class="font-weight-bold">Jamnagsr</option>
                                <option class="font-weight-bold">Porbander</option>
                                <option class="font-weight-bold">Bhavnagar</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2">
                            <h5 class="p-2">*Document:</h5>
                        </div>
                        <div class="col-auto">
                            <select class="p-2 rounded-3" name="Document" require value="<?php echo @$fetch_data['Document'];   ?>">
                                <option>Water Bill</option>
                                <option>Telephone (mobile bill)</option>
                                <option>Electricity bill</option>
                                <option>Income Tax Assessment Order</option>
                                <option>Election ID card</option>
                                <option>Proof of Gas Connection</option>
                                <option>Certificate from Employe</option>
                                <option>Spouse's passport copy </option>
                                <option>Parent's passport copy</option>
                                <option>Aadhaar Card</option>
                                <option>Rent Agreement</option>
                                <option>Photo Passbook</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3 mb-5">
                        <div class="col-2">
                            <h5 class="p-2">*Image:</h5>
                        </div>
                        <div class="col-auto rounded-3">
                            <input type="file" name="image" id="" class="p-2" require value="<?php echo @$fetch_data['Image'];  ?>">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row row-cols-2 card-footer bg-dark text-white">
                <div class="col-auto">
                    <div class="col-2">
                        <input type="submit" value="submit" class="btn btn-primary m-3" name="submit">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="col-2">
                        <input type="submit" value="Exit" class="btn btn-warning m-3" name="exit">
                    </div>
                </div>
            </div>
        </div>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>


