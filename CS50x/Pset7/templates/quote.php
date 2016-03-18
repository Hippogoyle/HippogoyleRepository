<h2> <?=  "$name is $ $price per share."?></h2>
<h2> <?= "Symbol: $symbol"?></h2>
<div>
<br>
<h4> Number of shares you would like to buy </h4>
<form action="buy.php" method="post">
    <fieldset>
        <div class="form-group">
            <input type="hidden" name="symbol"  value= "<?= htmlspecialchars($symbol)?>" />
            <input autofocus class="form-control" name="quantity" placeholder="Quantity" type="number" min="0"/>
        </div>       
        <div class="form-group">
            <button type="submit" class="btn btn-default">Buy</button>
        </div>
    </fieldset>
</form>
<h4> Number of shares you would like to sell </h4>
<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <input type="hidden" name="symbol"  value= "<?= htmlspecialchars($symbol)?>" />
            <input class="form-control" name="quantity" placeholder="Quantity" type="number" min="0"/>
        </div>       
        <div class="form-group">
            <button type="submit" class="btn btn-default">Sell</button>
        </div>
    </fieldset>
</form>
<h4> Search another symbol</h4>
<form action="quote.php" method="post">
    <fieldset>
        <div class="form-group">
            <input class="form-control" name="symbol" placeholder="symbol" type="text"/>
        </div>       
        <div class="form-group">
            <button type="submit" class="btn btn-default">Get Quote</button>
        </div>
    </fieldset>
</form>
</div>

