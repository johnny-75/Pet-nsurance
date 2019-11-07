<?php
    session_start();
    if(!isset($_SESSION['admin']))
        header("location:index.php");
?>
<!DOCTYPE html>
<html>
<?php
    include "header.php";
?>

<div class="container-fluid">
    <div class="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-lg shadow" style="max-width:90%;">
          <div class="modal-content border-0">
            <div class="modal-header text-info">
                <h4 class="modal-title" id="myModalLabel">All Proposers</h4>
            </div>
            <div class="container-fluid">
                <div class="table-responsive">
                    <table class="table">
                            <tbody>
                            <tr class="text-dark">
                                <th scope="row" style="font-weight: 600">SL No.</th>
                                <th scope="row" style="font-weight: 600">Pic</th>
                                <th scope="row" style="font-weight: 600">Proposer ID</th>
                                <th scope="row" style="font-weight: 600">Name</th>
                                <th scope="row" style="font-weight: 600">Gender</th>
                                <th scope="row" style="font-weight: 600">Address</th>
                                <th scope="row" style="font-weight: 600">Email</th>
                                <th scope="row" style="font-weight: 600">Phone</th>
                            </tr>

                                <?php
                                    include "../connect.php";
                                    $query = "select * from user u,profile p where u.userid=p.userid";
                                    $result1=$mysqli->query($query);
                                    $sl_no=0;
                                    if($result1->num_rows>0)
                                    {
                                        while($row=$result1->fetch_assoc())
                                        {
                                            $sl_no+=1;
                                            $userid=$row['userid'];
                                            $phone=$row['phone'];
                                            $address=$row['add1'].", ".$row['city'].", ".$row['state'];
                                            $gender=$row['gender'];
                                            $email=$row['email'];
                                            $name=$row['name'];
                                            echo '
                                            <tr class="text-secondary">
                                            <td class="align-middle">'.$sl_no.'</td>
                                            <td class="align-middle">';
                                            
                                            if(file_exists("../assets/img/profile_pic/$userid.jpg"))
                                                echo'<img class="img-fluid rounded-circle" width="50px" src="../assets/img/profile_pic/'.$userid.'.jpg">';
                                            else
                                                echo'<i class="fa fa-user-circle" style="font-size: 50px"></i>';

                                            echo'</td>
                                            <td class="align-middle">'.$userid.'</td>
                                            <td class="align-middle">'.$name.'</td>
                                            <td class="align-middle">'.$gender.'</td>
                                            <td class="align-middle">'.$address.'</td>
                                            <td class="align-middle">'.$email.'</td>
                                            <td class="align-middle">'.$phone.'</td>';
                                        }
                                        echo'</tr>';
                                    }
                                ?>
                        </tbody>
                    </table>
                  </div>
            </div>
          </div>
        </div>
      </div>
</div>

<?php
    include "footer.php";
?>
</html>