
<form action="create_workout.php" method="post">
    
        <div class="dropdown">
            Week:
            <select name= "week">
                <?php for($i = 1; $i <= 10; $i++)
                    {?> <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
            </select>
        </div>
       
        <div class="dropdown">
            Exercise 1:
            <select name="1">
            <?php foreach($exercises as $option) : ?>
            
                <option name = "exe1" value="<?php echo $option['index']; ?>"><?php echo $option['exercise']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="dropdown">
            Exercise 2:
           <select name="2">
            <?php foreach($exercises as $option) : ?>
                <option value="<?php echo $option['index']; ?>"><?php echo $option['exercise']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="dropdown">
            Exercise 3:
            <select name="3">
            <?php foreach($exercises as $option) : ?>
                <option value="<?php echo $option['index']; ?>"><?php echo $option['exercise']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="dropdown">
            Exercise 4:
           <select name="4">
            <?php foreach($exercises as $option) : ?>
                <option value="<?php echo $option['index']; ?>"><?php echo $option['exercise']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="dropdown">
            Exercise 5:
            <select name="5">
            <?php foreach($exercises as $option) : ?>
                <option value="<?php echo $option['index']; ?>"><?php echo $option['exercise']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="dropdown">
            Exercise 6:
           <select name="6">
            <?php foreach($exercises as $option) : ?>
                <option value="<?php echo $option['index']; ?>"><?php echo $option['exercise']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="dropdown">
            Exercise 7:
            <select name="7">
            <?php foreach($exercises as $option) : ?>
                <option value="<?php echo $option['index']; ?>"><?php echo $option['exercise']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="dropdown">
            Exercise 8:
           <select name="8">
            <?php foreach($exercises as $option) : ?>
                <option value="<?php echo $option['index']; ?>"><?php echo $option['exercise']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="dropdown">
            Exercise 9:
            <select name="9">
            <?php foreach($exercises as $option) : ?>
                <option value="<?php echo $option['index']; ?>"><?php echo $option['exercise']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="dropdown">
            Exercise 10:
           <select name="10">
            <?php foreach($exercises as $option) : ?>
                <option value="<?php echo $option['index']; ?>"><?php echo $option['exercise']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="dropdown">
            Exercise 11:
            <select name="11">
            <?php foreach($exercises as $option) : ?>
                <option value="<?php echo $option['index']; ?>"><?php echo $option['exercise']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="dropdown">
            Exercise 12:
           <select name="12">
            <?php foreach($exercises as $option) : ?>
                <option value="<?php echo $option['index']; ?>"><?php echo $option['exercise']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="dropdown">
            Exercise 13:
            <select name="13">
            <?php foreach($exercises as $option) : ?>
                <option value="<?php echo $option['index']; ?>"><?php echo $option['exercise']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="dropdown">
            Exercise 14:
           <select name="14">
            <?php foreach($exercises as $option) : ?>
                <option value="<?php echo $option['index']; ?>"><?php echo $option['exercise']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        
        
            <button type="submit" value="Submit" class="btn btn-default">Create</button>
        </div>
   
</form>


