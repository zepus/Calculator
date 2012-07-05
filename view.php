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
        <form name="submitForm" action="controller.php" method="post">
            
            Result: <input type="text" name="currentResult" value="<?php $newController->addRes(); ?>" style="height: 50px; width: 161px; font-size:25px" /><br/>
            Input:  <input type="text" name="output" value="<?php $newController->addNr(); $newController->addSn(); ?>" size="10" style="height: 40px; width: 114px; font-size:20px;" />
            <input type="submit" name="eq" value="=" style="height: 50px; width: 50px; font-size:25px" /><br/>

            <button type="submit" name="number" value="7" style="height: 50px; width: 50px; font-size:25px">7</button>
            <button type="submit" name="number" value="8" style="height: 50px; width: 50px; font-size:25px">8</button>
            <button type="submit" name="number" value="9" style="height: 50px; width: 50px; font-size:25px">9</button>
            <button type="submit" name="eq" value="/" style="height: 50px; width: 50px; font-size:25px">/</button><br/>
            
            <button type="submit" name="number" value="4" style="height: 50px; width: 50px; font-size:25px">4</button>
            <button type="submit" name="number" value="5" style="height: 50px; width: 50px; font-size:25px">5</button>
            <button type="submit" name="number" value="6" style="height: 50px; width: 50px; font-size:25px">6</button>
            <button type="submit" name="eq" value="*" style="height: 50px; width: 50px; font-size:25px">*</button><br/>
            
            <button type="submit" name="number" value="1" style="height: 50px; width: 50px; font-size:25px">1</button>
            <button type="submit" name="number" value="2" style="height: 50px; width: 50px; font-size:25px">2</button>
            <button type="submit" name="number" value="3" style="height: 50px; width: 50px; font-size:25px">3</button>
            <button type="submit" name="eq" value="-" style="height: 50px; width: 50px; font-size:25px">-</button>
            <button type="submit" name="database" value="start" style="height: 50px; width: 220px; font-size:25px">Start/Reset</button><br/>
            
            <button type="submit" name="number" value="0" style="height: 50px; width: 104px; font-size:25px">0</button>
            <button type="submit" name="number" value="." style="height: 50px; width: 50px; font-size:25px">.</button>
            <button type="submit" name="eq" value="+" style="height: 50px; width: 50px; font-size:25px">+</button>
            <button type="submit" name="database" value="showDatabase" style="height: 50px; width: 220px; font-size:25px">Show Database</button><br/>
            
            <br/><input type="text" name="currentNumber" value="<?php $newController->addNr(); ?>" style="height: 50px; width: 500px; font-size:25px" />
            <br/><input type="text" name="oldSign" value="<?php $newController->addOldSign(); ?>" style="height: 50px; width: 500px; font-size:25px" />
            <br/><input type="text" name="currentSign" value="<?php $newController->addSn(); ?>" style="height: 50px; width: 500px; font-size:25px" />
            <br/><input type="text" name="fullEquation" value="<?php $newController->addEq(); ?>" style="height: 50px; width: 500px; font-size:25px" />
        </form>

    </body>
</html>

