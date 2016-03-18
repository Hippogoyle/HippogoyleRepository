<?php
    
    // display original measurements
    
    // display most resent measurements
    
    // display the difference in  %
    
    $stats = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        $stats[] = [
            "time" => $row["time"],
            "price" => $row["price"],
            "shares" => $row["shares"],
            "symbol" => $row["symbol"],
            "type" => $row["type"],
            "cashbalance" => $row["price"] *  $row["shares"],
        ];
    }
    
    // render portfolio
    render("history.php", ["positions" => $positions, "title" => "History"]);
 
?>
