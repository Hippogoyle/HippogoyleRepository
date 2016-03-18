<!-- data from measurements.php $measure $exercise -->

<h1> You're making progress!</h1>
<h2> Greatest Change</h2>
<p> </p>
<h2> Smallest Change</h2>
<h2> Choose Your Stats</h2>        
        <div class="dropdown">
            Week:
            <select name= "week">
                <?php for($i = 1; $i <= 10; $i++)
                    {?> <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
            </select>
        </div>  
</form>
