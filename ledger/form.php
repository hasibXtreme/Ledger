    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
        <title>Document</title>
    </head>
    <body>
        <?php  $n=(int)$_POST['entries']; ?>        
        
    <form action="project.php" method="post">
       <input type="hidden" name="entries" value="<?php echo $n; ?>">

        <?php for($i=0;$i<$n;$i++):?>
         
          <fieldset id="entry">
                  <h1>Entry number <?php echo $i+1?></h1>
                Cash: <input type="number" name="cash[]"><br>
                Accounts receivable: <input type="number" name="a_r[]"><br>
                Supply: <input type="number"name="supply[]"><br>
                Equipments: <input type="number" name="equipments[]"><br>
                Notes payable: <input type="number" name="notes_payable[]"><br>
                Accounts payable: <input type="number" name="a_p[]"><br>
                Capital: <input type="number" name="capital[]"><br>
                Owners equity: <input type="number" name="owners_equity[]"><br>
                Revenues: <input type="number" name="revenues[]"><br>
                Expenses: <input type="number" name="expenses[]"><br>
          </fieldset>
          <br>
        <?php endfor; ?>  

        <input type="submit" value="Submit">
    </form>    

    </body>

        <style>
            /* style.css */

body {
    background-color: darkcyan;
    font-family: 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

#entry {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    padding: 30px;
    background-color: cyan;
    border-radius: 10px;
    box-shadow: 0 5px 15px darkcyan;
    max-width: 500px;
    width: 90%;
    text-align: center;
}


        </style>
        
    </html>    
        
        
        
        
        
        
        