<?php
if(isset ($_POST['submit']))
{
    $con=mysql_connect("localhost","root","");
    if($con)
    {
        echo "Connection Succesful";
        mysql_select_db("hawks",$con);
        
        $DD1=$_POST['D1'];
        $DD2=$_POST['D2'];
        $DD3=$_POST['D3'];
        $DD4=$_POST['D4'];
        $DD5=$_POST['D5'];
        $DD6=$_POST['D6'];
        $DD7=$_POST['D7'];
        
        $update="Update Customers Set Username='$DD2', Password='$DD3', Email='$DD4', Phone_No='$DD5', FullName=$DD6, Address='$DD7' where Id=$DD1";
        if(mysql_query($update,$con))
        {
            echo  "<script type='text/javascript'>
    alert('Record Updated Successfully!')
 window.location.href='cust_edit.php'
 </script>"; 
            echo "Update successful"; 
        }
        else
        {
            echo "Record Not Updated";
        }
    }
    
    mysql_close($con);
}


?>