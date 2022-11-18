<?php

include('demo.php');

$limit = 3;
$page = 1;
if (isset($_GET['page']) && isset($_GET['sr_txt'])) {
    $page = $_GET['page'];
}
else if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else{
    $page = 1;
}
$offset = ($page - 1)*$limit;
$r_id =  $_SESSION['R_id'];
//echo $_GET['sr_txt'];

$conn = mysqli_connect('localhost', 'root', 'root', 'register');
if (isset($_GET['sr_txt'])) {
    $sr_text = $_GET['sr_txt'];
    $sel_query =  "SELECT * FROM add_contect WHERE surname LIKE '%$sr_text%' AND user_id = $r_id  LIMIT {$offset},{$limit}";
} else {
    $sel_query = "SELECT * FROM add_contect Where user_id = $r_id LIMIT {$offset},{$limit}";
}
$data = mysqli_query($conn, $sel_query);
if (isset($_GET['d_id'])) {
    $delet_id = $_GET['d_id'];
    $del_query = "DELETE FROM add_contect WHERE c_id = $delet_id ";
    if (mysqli_query($conn, $del_query)) {
        header('location:demo.php');
    } else {
        echo "<script> alert('Sorry Didnot Delete Your Data '); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View contect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        table {
            box-shadow: 0 0 10px black;
            margin: auto;
            margin-top: 20px;
            text-align: center;
        }
        th {
            background-color: maroon;
            color: white;
            padding: 8px 20px 8px 20px;
        }
        td {
            font-weight: 600;
            color: black;
            padding: 10px;
            font-style: italic;
        }
        .pagi ul{
            margin-top: 20px;
            /* margin: auto; */
            margin-left: 600px;
        }
        .pagi ul li:hover{
            background: white;
        }
        .table_1 {
            padding: 10px;
        }
        .page_number{
           margin-left: 100px;
        }
    </style>
</head>
<body>
    <div class="conatainer">
        <form action="">
            <table style="border-radius: 20px">
                <tr>
                    <td class="table_1">Search Here:</td>
                    <td>
                        <input type="search" name="sr_txt" id="" class="table_1" placeholder="search here" value="<?php echo @$_GET['sr_txt'];?>">
                    </td>
                    <td class="table_1">
                        <input type="submit" value="search" name="sr_text" class="table_1" style="background: black; color: white;border:none; border-radius: 10px;">
                    </td>
                </tr>
            </table>
        </form>
        <table border="1">
            <tr>
                <!--                <th>Contect Id</th>-->
                <th>Name</th>
                <th>Surname</th>
                <th>City</th>
                <th>Contect Number</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php while ($fetch_data = mysqli_fetch_assoc($data))  {  ?>
                <tr>
                    <!--                    <td>--><?php //echo $fetch_data['c_id'];  
                                                    ?>
                    <!--</td>-->
                    <td><?php echo $fetch_data['name'];  ?></td>
                    <td><?php echo $fetch_data['surname']; ?></td>
                    <td><?php echo $fetch_data['city']; ?></td>
                    <td><?php echo $fetch_data['mobail_no']; ?></td>
                    <td><a href="add_contect.php?up_id=<?php echo $fetch_data['c_id']; ?>">Update</a></td>
                    <td><a href="view_contect.php?d_id=<?php echo $fetch_data['c_id'];   ?>">Delete </a></td>
                </tr>
            <?php   } ?>
        </table>
    </div>
    <?php
            $sel = "SELECT * FROM add_contect Where user_id = $r_id   ";
            $result = mysqli_query($conn,$sel) or die('Query Failed');

            if(mysqli_num_rows($result)>0)
            {
                if(isset($_GET['sr_txt']))
                {
                    $sr_text = $_GET['sr_txt'];
                    $sr_query = "SELECT * FROM add_contect WHERE surname LIKE '%$sr_text%' AND user_id = $r_id";
                    $row = mysqli_query($conn,$sr_query);$sr_count = mysqli_num_rows($row);
                    $total_pg = ceil($sr_count/$limit);
                }
                else{
                    $count = mysqli_num_rows($result);
                    // echo $count;
                    $total_pg = ceil($count/$limit);
                    // echo $total_pg;
                }
                echo ' <div class="container">';
                echo '   <div class="pagi">';
                echo '      <ul class="pagination">';
                for ($i=1; $i <= $total_pg; $i++) {
                    if (isset($_GET['sr_txt']))
                    {
                        $search_text = $_GET['sr_txt'];
//                        echo $search_text;
                        echo '<li class="page-item active"><a class="page-link" href="view_contect.php?page='.$i.'&sr_txt='.$search_text.'">'.$i.'</a></li>';
                    }
                    else{
                        echo '<li class="page-item active"><a class="page-link" href="view_contect.php?page='.$i.'">'.$i.'</a></li>';
                    }

                }
            }
            ?>
                </ul>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>



</body>

</html>


<?php include('footer.php'); ?>