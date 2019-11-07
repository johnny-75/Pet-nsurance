<?php
    session_start();
    if(!isset($_SESSION['userid']))
        header("location:login.php");


    if(!isset($_GET['insurance_id']))
        header("location:user_panel.php");
?>
<!DOCTYPE html>
<html>

<?php
    include "header.php";
    include "connect.php";
    $insurance_id=test_input($_GET['insurance_id']);
    $query = "select p.name,i.invest from insured_pet i,profile p where i.insurance_id=$insurance_id and i.userid=p.userid";
    $result1=$mysqli->query($query);
    if($result1->num_rows>0)
    {
        $row=$result1->fetch_assoc();
        $invest=test_input($row['invest']);
        $name=$row['name'];
    }
?>

  </style>
<div class="container mt-4">
    <div id="printArea">
<div class="row">
    <div class="col-sm-6">
        <table class="table table-bordered">
            <tbody>
                <tr>
                <td colspan="2" scope="row" class="text-center">Proposer's Copy</td>
                </tr>
                <tr>
                <th colspan="2" scope="row" class="text-center"  style="font-size:25px">Pet Insurance co. Ltd</th>
                </tr>
                <tr>
                <th colspan="2" scope="row" class="text-center" style="font-size:20px">South Indian Bank Ltd</th>
                </tr>
                <tr>
                <td>Account No.:</td>
                <td>0108053000019932</td>
                </tr>
                <tr>
                <td>IFSC No.:</td>
                <td>SIBL0000108</td>
                </tr>
                <tr>
                <td>Address:</td>
                <td>vv puram Bangalore</td>
                </tr>
                <tr>
                <td>Proposer's Name:</td>
                <td><?php echo $name; ?></td>
                </tr>
                <tr>
                <td>Policy No.:</td>
                <td><?php echo $insurance_id; ?></td>
                </tr>
                <tr>
                <td>Amount:</td>
                <td><?php echo $invest; ?></td>
                </tr>
                <tr>
                <td colspan="2" scope="row" class="text-center">[Bank use only]</td>
                </tr>
                <tr>
                <td>Date of Challan:</td>
                <td></td>
                </tr>
                <tr>
                <td>Challan No.:</td>
                <td></td>
                </tr>
                <tr style="height:150px">
                <td>Bank Seal:</td>
                <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <table class="table table-bordered">
            <tbody>
                <tr>
                <td colspan="2" scope="row" class="text-center">Bank Copy</td>
                </tr>
                <tr>
                <th colspan="2" scope="row" class="text-center"  style="font-size:25px">Pet Insurance co. Ltd</th>
                </tr>
                <tr>
                <th colspan="2" scope="row" class="text-center" style="font-size:20px">South Indian Bank Ltd</th>
                </tr>
                <tr>
                <td>Account No.:</td>
                <td>0108053000019932</td>
                </tr>
                <tr>
                <td>IFSC No.:</td>
                <td>SIBL0000108</td>
                </tr>
                <tr>
                <td>Address:</td>
                <td>vv puram Bangalore</td>
                </tr>
                <tr>
                <td>Proposer's Name:</td>
                <td><?php echo $name; ?></td>
                </tr>
                <tr>
                <td>Policy No.:</td>
                <td><?php echo $insurance_id; ?></td>
                </tr>
                <tr>
                <td>Amount:</td>
                <td><?php echo $invest; ?></td>
                </tr>
                <tr>
                <td colspan="2" scope="row" class="text-center">[Bank use only]</td>
                </tr>
                <tr>
                <td>Date of Challan:</td>
                <td></td>
                </tr>
                <tr>
                <td>Challan No.:</td>
                <td></td>
                </tr>
                <tr style="height:150px">
                <td>Bank Seal:</td>
                <td></td>
                </tr>
            </tbody>
        </table>
    
    </div>
</div>
</div>
<button type="button" id="btn" onclick="printDiv('printArea')" class="btn btn-secondary mt-2">Print Challan</button>
</div>
<script>
        function printDiv(divName) {
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;
        
             document.body.innerHTML = printContents;
        
             window.print();
        
             document.body.innerHTML = originalContents;
        }
        </script>
<?php
    include "footer.php";
?>
</html>