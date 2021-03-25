<body>
    <main>
    <style>
.error {color: red;}
</style>
<?php
$rowCol = $numColors = "";
$color = array('');

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
                padding: 2px;
                }

                    </style>"; //Style for color coordinate table
        $rowCol = $_POST['rowCol'];
        $numColors = $_POST['numColors'];
        $colors = array('red', 'orange', 'yellow', 'green', 'teal', 'blue', 'purple', 'brown', 'black', 'grey');
        echo'<form method="post" action="print.php">';
        echo "<input type = 'hidden' name = 'printRowCol' value ='$rowCol'>";
        echo "<input type = 'hidden' name = 'printNumColors' value = '$numColors'>";
        echo "<table style='width:100%'>";
        for ($i = 0; $i < $numColors; $i++){
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
        echo '<input type="submit" name="submit" value="Print">';
        echo "</form>";        
    }
    else{
        echo'<form method="post" action="color.php">
        <p style = "color: red;">Number or rows and columns out of range must be [1-26}</p>
        # of Rows and Columns: <input type="text" name="rowCol" required>
          <br><br>
        <p style = "color: red;">Number of colors must be [1-10]</p>
        # of Colors: <input type="text" name="numColors" required>
          <br><br>
          <input type="submit" name="submit" value="Submit"> 
          </from>';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    echo'<form method="post" action="color.php">
# of Rows and Columns: <input type="text" name="rowCol" required>
  <br><br>
# of Colors: <input type="text" name="numColors" required>
  <br><br>
  <input type="submit" name="submit" value="Submit"> 
  </from>';
}
    
?>

    </main>
</body>
