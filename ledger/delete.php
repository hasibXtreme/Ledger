<?php
      $sql = new mysqli("localhost", "root", "gghabib", "ledger");

    $cancel= "DELETE FROM ledger";
      $sql->query($cancel);

      header("Location: input.html");
?>