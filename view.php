<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
    </head>
    <body>
        
            
        <form name="calc" action="index.php" method="post">
        
            <input type="text" Id="equation" name="equation" value="<?php if (isset($_POST['number'])) if ($_POST['number'] != "start" && $_POST['number'] != "showDatabase") echo $newControler->buttonPressed(); ?>" size="10" style="height: 40px; width: 152px; font-size:20px;" />
            <input type="submit" Id="result" name="number" value="=" style="height: 50px; width: 50px; font-size:25px" />
            <button type="submit" Id="start" name="number" value="start" style="height: 50px; width: 220px; font-size:25px">Start/Reset</button><br/>

            <button type="submit" Id="7" name="number" value="7" style="height: 50px; width: 50px; font-size:25px">7</button>
            <button type="submit" Id="8" name="number" value="8" style="height: 50px; width: 50px; font-size:25px">8</button>
            <button type="submit" Id="9" name="number" value="9" style="height: 50px; width: 50px; font-size:25px">9</button>
            <button type="submit" Id="div" name="number" value="/" style="height: 50px; width: 50px; font-size:25px">/</button><br/>
            
            <button type="submit" Id="4" name="number" value="4" style="height: 50px; width: 50px; font-size:25px">4</button>
            <button type="submit" Id="5" name="number" value="5" style="height: 50px; width: 50px; font-size:25px">5</button>
            <button type="submit" Id="6" name="number" value="6" style="height: 50px; width: 50px; font-size:25px">6</button>
            <button type="submit" Id="mul" name="number" value="*" style="height: 50px; width: 50px; font-size:25px">*</button>
            <button type="submit" Id="showDatabase" name="number" value="showDatabase" style="height: 50px; width: 220px; font-size:25px">Show Database</button><br/>
            
            <button type="submit" Id="1" name="number" value="1" style="height: 50px; width: 50px; font-size:25px">1</button>
            <button type="submit" Id="2" name="number" value="2" style="height: 50px; width: 50px; font-size:25px">2</button>
            <button type="submit" Id="3" name="number" value="3" style="height: 50px; width: 50px; font-size:25px">3</button>
            <button type="submit" Id="dif" name="number" value="-" style="height: 50px; width: 50px; font-size:25px">-</button><br/>
            
            <button type="submit" Id="0" name="number" value="0" style="height: 50px; width: 104px; font-size:25px">0</button>
            <button type="submit" Id="." name="number" value="." style="height: 50px; width: 50px; font-size:25px">.</button>
            <button type="submit" Id="sum" name="number" value="+" style="height: 50px; width: 50px; font-size:25px">+</button><br/>
               
            <?php $newControler->showDatabaseButton(); $newControler->startButton(); ?>
        </form>    

    </body>
    
</html>
