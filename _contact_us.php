 <?php
    session_start();
    include "connect.php";
    if(isset($_SESSION['userid']))
    {
        $userid=$_SESSION['userid'];
        $query = "select u.email,u.fname,u.lname,p.phone from user u,profile p where u.userid='$userid' and u.userid=p.userid";
        $result1=$mysqli->query($query);
        if($result1->num_rows>0)
        {
            while($row=$result1->fetch_assoc())
            {
                $fname=$row['fname'];
                $lname=$row['lname'];
                $phone=$row['phone'];
                $email=$row['email'];
            }
            $message=$_POST['message'];
            insert($fname,$lname,$email,$phone,$message);
        }
    }
    else
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $message=$_POST['message'];
        insert($fname,$lname,$email,$phone,$message);
    }

    function insert($fname,$lname,$email,$phone,$message)
    {
        $mysqli=$GLOBALS['mysqli'];
        $query = "insert into enquiries (fname,lname,email,phone,query) VALUES(?,?, ?, ?, ?)";
        $statement = $mysqli->prepare($query);

        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('sssss',$fname,$lname,$email,$phone,$message);

        if($statement->execute()){
            $name=$fname." ".$lname;
            header("location:phpmailer/send_mail.php?task=enquiry&name=$name&email=$email&phone=$phone&message=$message");
            //header("location:contact_us.php?status=1");
        }
        else{
            echo "error".mysqli_error($mysqli);
        }

    }
 ?>