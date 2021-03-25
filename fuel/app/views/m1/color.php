<body>
    <main>
    <style>
.error {color: red;}
</style>
<?php
$rowColErr = $numColorsErr = "";
$rowCol = $numColors = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ( $_POST['rowCol'] > 0 && $_POST['rowCol'] < 27 && $_POST['numColors'] > 0 && $_POST['numColors'] < 11){ //form validation parameters
        echo "<style>
            td {
                width: 20px;
                height: 20px;
                border: 1px solid black;
                }
            table {
                border-color: black;
                border-style: solid;
                border-width: 2px;
                }

                    </style>"; //Stule for color coordinate table
        $rowCol = $_POST['rowCol'];
        $numColors = $_POST['numColors'];
        $colors = array('red', 'orange', 'yellow', 'green', 'teal', 'blue', 'purple', 'brown', 'black', 'grey');
        echo "<form>";
        echo "<table style='width:100%'>";
        for ($i = 0; $i < $numColors; $i++){ //Populate table values
            echo "<tr><td style='width:20%'>";
            echo "<select id='color$i' name='color'>";
                for ($j = 0; $j < $numColors; $j++){
                    $colorType = $colors[($i+$j)%$numColors];
                    echo "<option value='$colorType'>$colorType</option>";
                }
            echo "</td><td style='width:80%'></td></tr>";
        }
        echo "</table>";
        
        echo "<table>";
        echo "<tr><td></td>";
        $alpha = range('A', 'Z');
        for ($j = 0; $j < $rowCol; $j++){
            echo "<td>$alpha[$j]</td>";
        }
        for ($i = 1; $i < $rowCol+1; $i++){
            echo "<tr>";
            echo "<td>$i</td>";
            for ($j = 0; $j < $rowCol; $j++){
                echo "<td></td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<input type='submit' value='Print'>";
        echo "</form>";        
    }
    else{
        $rowColErr = "Number or rows and columns out of range must be [1-26}";
        $numColorsErr = "Number of colors must be [1-10]";
    }
}


    
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
# of Rows and Columns: <input type="text" name="rowCol" value="<?php echo $rowCol;?>">
  <span class="error">* <?php echo $rowColErr;?></span>
  <br><br>
# of Colors: <input type="text" name="numColors" value="<?php echo $numColors;?>">
  <span class="error">* <?php echo $numColorsErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit"> 
  </from>
    </main>
</body>
