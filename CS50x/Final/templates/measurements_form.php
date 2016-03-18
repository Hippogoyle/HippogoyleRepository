<form action="measurements.php" method="post">
    
        
    <div class="textbox">
        date: <input type="date" value="<?php echo date('Y-m-d'); ?>" />
        height:<br>
        <input type="number" step="0.001" name="height" min="1" max="200"><br>
        <br>
        weight:<br>
        <input type="number" step="0.001" name="weight" min="1" max="200"><br>
        <br>
        chest skinfold:<br>
        <input type="number" step="0.001" name="skinChest" min="1" max="200"><br>
        <br>
        abs skinfold:<br>
        <input type="number" step="0.001" name="skinAbs" min="1" max="200"><br>
        <br>
        thigh skinfold:<br>
        <input type="number" step="0.001" name="skinThigh" min="1" max="200"><br>
        <br>
        Neck:<br>
        <input type="number" step="0.001" name="neck" min="1" max="200"><br>
        <br>
        leftupper arm:<br>
        <input type="number" step="0.001" name="leftUpper" min="1" max="200"><br>
        <br>
        right upper arm:<br>
        <input type="number" step="0.001" name="rightUpper" min="1" max="200"><br>
        <br>
        left forearm:<br>
        <input type="number" step="0.001" name="leftForearm" min="1" max="200"><br>
        <br>
        right forearm:<br>
        <input type="number" step="0.001" name="rightForearm" min="1" max="200"><br>
        <br>
        chest:<br>
        <input type="number" step="0.001" name="chest" min="1" max="1000"><br>
        <br>
        waist:<br>
        <input type="number" step="0.001" name="waist" min="1" max="1000"><br>
        <br>
        hips:<br>
        <input type="number" step="0.001" name="hips" min="1" max="1000"><br>
        <br>
        left thigh:<br>
        <input type="number" step="0.001" name="leftThigh" min="1" max="200"><br>
        <br>
        righ thigh:<br>
        <input type="number" step="0.001" name="rightThigh" min="1" max="200"><br>
        <br>
        left calf:<br>
        <input type="number" step="0.001" name="leftCalf" min="1" max="200"><br>
        <br>
        right calf:<br>
        <input type="number" step="0.001" name="rightCalf" min="1" max="200"><br>
        <br>
    </div>
    
    <button type="submit" value="Submit" class="btn btn-default">Create</button>

</form>
