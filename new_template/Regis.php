<?php
if(isset($_POST["signup_btn"]))
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hawks";

    $conn = mysqli_connect($server, $username, $password, $dbname);

    $type = $_POST['Type'];
    $regId = $_POST['RegId'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $cpassword = $_POST['Cpassword'];
    $email = $_POST['Email'];
    $Mobile_No = $_POST['Mobile'];
    $fullName = $_POST['FullName'];
    $address = $_POST['Address'];
    $Questions = $_POST['Question'];
    $Answers = $_POST['Answer'];

    $usernamequery = "SELECT * FROM Registration where Username = '$username' ";
    $uquery = mysqli_query($conn, $usernamequery);

    $usernamecount = mysqli_num_rows($uquery);

    if ($usernamecount > 0) {
        ?>
        <script>
            alert("Username already exists");
        </script>
        <?php
    } else {
        if ($password === $cpassword) {
            
            $sql = "INSERT INTO Registration VALUES ('$type',$regId,'$username','$password', '$cpassword', '$email',$Mobile_No,'$fullName','$address','$Questions','$Answers')";

            if (mysqli_query($conn, $sql)) {
                ?>
                <script>
                    alert("Data Inserted Successfully");
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Data Not Inserted");
                </script>
                <?php
            }

            // Check the type and insert into the respective table
            if ($type === 'customer') {
                $customerSql = "INSERT INTO Customers VALUES ($regId,'$username', '$password', '$cpassword','$email', $Mobile_No, '$fullName', '$address','$Questions','$Answers')";
                if (mysqli_query($conn, $customerSql)) {
                    ?>
                    <script>
                        alert("Customer Data Inserted Successfully");
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert("Customer Data Not Inserted");
                    </script>
                    <?php
                }
            }

        } else {
            ?>
            <script>
                alert("Password not matching");
            </script>
            <?php
        }
    }

   


//if ($type === 'admin') {
           // header("Location: index2.html");
            //exit();
        //} else {
          //  header("Location: index1.html");
            //exit();
        //}

mysqli_close($conn);
}
?>