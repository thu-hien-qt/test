<p>Guessing game...</p>
<form method="post">
    <p><label for "guess">Input Guess</label>
        <input type="text" name="x" id="guess" />
    </p>
    <p>Time</p>
    <input type="radio" name="when" value="am" <?php
                                                if (isset($_POST["when"]) && $_POST["when"] == "am") {
                                                    echo "checked";
                                                }
                                                ?>>AM<br>
    <input type="radio" name="when" value="pm" <?php
                                                if (isset($_POST["when"]) && $_POST["when"] == "pm") {
                                                    echo "checked";
                                                }
                                                ?>>PM<br>

    <p>Classes taken:<br />
        <input type="checkbox" name="class[]" value="si502" checked>
        SI502 - Networked Tech<br>
        <input type="checkbox" name="class[]" value="si539">
        SI539 - App Engine<br>
        <input type="checkbox" name="class[]">
        SI543 - Java<br>
    </p>

    <p><label for="inp06">Which soda:
            <select name="soda" id="inp06">
                <option value="0">-- Please Select --</option>
                <option value="1">Coke</option>
                <option value="2">Pepsi</option>
                <option value="3">Mountain Dew</option>
                <option value="4">Orange Juice</option>
                <option value="5">Lemonade</option>
            </select>
    </p>
    <p><label for="inp09">Which are awesome?<br/>
            <select multiple="multiple" name="code[]" id="inp09">
                <option value="python">Python</option>
                <option value="css">CSS</option>
                <option value="html">HTML</option>
                <option value="php">PHP</option>
            </select>
    </p>
    
    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
  <label for="vehicle1"> I have a bike</label><br>
  <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
  <label for="vehicle2"> I have a car</label><br>
  <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
  <label for="vehicle3"> I have a boat</label><br><br>
  <input type="submit" value="Submit">
    <input type="submit" name= "dopost" value="nhap" />
</form>


<pre>
    <?php
    print_r($_POST);
    ?>
</pre>

<pre>
    <?php
    print_r($_GET);
    ?>
</pre>