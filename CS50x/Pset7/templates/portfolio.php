<div>
    <table >
            <tr>
                <th>Symbol</th>
                <th>Shares</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            <?php foreach ($positions as $position): ?>
                <tr>
                    <td><?= $position["symbol"] ?></td>
                    <td><?= $position["shares"] ?></td>
                    <td><?= $position["price"] ?></td>
                    <td><?= $position["linetotal"]?></td>
                </tr>
            <?php endforeach ?>
    </table> 
</div>
<br>
<div>
    <?= "$". $cash ." in available funds." ?>
</div>
<div>
<?php $sum = 0; 
 
$sum += $cash + $value;

?>
</div>
<div>
    <?= "Total account value: $" . $sum ?>
</div>
<div>
    <a href="funds.php">Add Funds</a>
</div>
<div>
    <a href="password.php">Change Password</a>
</div>
<div>
    <a href="logout.php">Log Out</a>
</div>

