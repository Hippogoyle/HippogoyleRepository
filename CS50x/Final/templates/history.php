<div>
    <table >
        <tr>
            <tr>
            <th>Time</th>
            <th>Symbol</th>
            <th>Type</th>
            <th>Shares</th>
            <th>Price</th>
            <th>Value</th>
        </tr>
              
        <?php foreach ($positions as $position): ?>
            <tr>
                <td><?= $position["time"] ?></td>
                <td><?= $position["symbol"] ?></td>
                <td><?= $position["type"] ?></td>
                <td><?= $position["shares"] ?></td>
                <td><?= $position["price"] ?></td>
                <td><?= $position["cashbalance"] ?></td>
            </tr>
        <?php endforeach ?>
    </table> 
</div>
<br>
<div>
    <a href="logout.php">Log Out</a>
</div>

