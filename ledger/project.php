
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

       
       <?php
   $sql = new mysqli("localhost", "root", "gghabib", "ledger");


    $n1 = (int)$_POST['entries'];
    
    for($i=0;$i<$n1;$i++)
    {
        $cash = $_POST['cash'][$i]??0;
        $accounts_receivable= $_POST['a_r'][$i]??0;
        $supply = $_POST['supply'][$i]??0;
        $equipment = $_POST['equipments'][$i]??0;
        $notes_payable = $_POST['notes_payable'][$i]??0;
        $accounts_payable = $_POST['a_p'][$i]??0;
        $capital = $_POST['capital'][$i]??0;
        $owners_equity = $_POST['owners_equity'][$i]??0;
        $revenues = $_POST['revenues'][$i]??0;
        $expenses = $_POST['expenses'][$i]??0;

        $exc=$sql->prepare("INSERT INTO ledger (cash, accounts_receivable, supply, equipment, notes_payable, accounts_payable, capital, owners_equity, revenues, expenses) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $exc->bind_param("iiiiiiiiii", $cash, $accounts_receivable, $supply, $equipment, $notes_payable, $accounts_payable, $capital, $owners_equity, $revenues, $expenses);
        $exc->execute();
        $exc->close();
    }


       

     $total = "select 
            sum(cash+accounts_receivable+supply+equipment) as assets ,
            sum(notes_payable+accounts_payable) as liabilities,
            sum(capital+owners_equity+revenues+expenses) as equity

          FROM ledger";
        
    $result = $sql->query($total);
    $row = $result->fetch_assoc();
   

    $assets = (float)($row['assets']);
    $liabilities = (float)($row['liabilities']);
    $equity = (float)($row['equity']);

    $total = $liabilities + $equity;



    if($assets == $total)
    {
        echo "<h2 style='color: green;'>Balanced</h2>";
    }
    else
    {
        echo "<h2 style='color: red;'>Not Balanced</h2>";

    }

   


     $sql->close(); 
    $result->close();
     
?>


<h3>LEDGER TABLE</h3>
       <table border="8" style="color: azure;">
              <tr style="color: black;">
                 <th>ID</th>
                 <th>Cash</th>
                 <th>Accounts Receivable</th>
                 <th>Supply</th>
                 <th>Equipments</th>
                 <th>Notes Payable</th>
                 <th>Accounts Payable</th>
                 <th>Capital</th>
                 <th>Owners Equity</th>
                 <th>Revenues</th>
                 <th>Expenses</th>
              </tr>
          <?php

           $sql1 = new mysqli("localhost", "root", "gghabib", "ledger");

              $display = "SELECT * FROM ledger";
              $data=$sql1->query($display);
            
             $i=1;
        while($row1 = $data->fetch_assoc()) {
            echo "<tr style='color: black;'>
                    <td>".$i++."</td>
                    <td>".$row1["cash"]."</td>
                    <td>".$row1["accounts_receivable"]."</td>
                    <td>".$row1["supply"]."</td>
                    <td>".$row1["equipment"]."</td>
                    <td>".$row1["notes_payable"]."</td>
                    <td>".$row1["accounts_payable"]."</td>
                    <td>".$row1["capital"]."</td>
                    <td>".$row1["owners_equity"]."</td>
                    <td>".$row1["revenues"]."</td>
                    <td>".$row1["expenses"]."</td>
              
                </tr>";
        }

           $sql1->close();
           $data->close();
          ?>

       </table>

      <form action="delete.php">
        <input type="submit" value="Delete All Entries" style="color: red;  border-radius: 10px; padding: 10px;" id="delete">
      </form>
       

      <form action="redirect.php">
           <input type="submit" value="keep adding entries" style="color: green;  border-radius: 10px; padding: 10px;" id="keep">
      </form>


      <style>
         body {
             background-color: darkcyan;
         }

         #delete {
             position: absolute;
             top: 40%;
                
         }

         #keep {
             position: absolute;
             top: 45%;
         }
      </style>

</body>
</html>
 




        
     