<html>
<header>
<h1>Nemo Tech inc.</h1>
<?php echo Asset::img('nemotechgs.png', array('style' => 'width: 190px')) ?>
</header>
 <body>
<?php
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
        $rowCol = $_POST['printRowCol'];
        $numColors = $_POST['printNumColors'];
        $colors = array('red', 'orange', 'yellow', 'green', 'teal', 'blue', 'purple', 'brown', 'black', 'grey');
        echo'<form method="post" action="print.php">';
        echo "<input type = 'hidden' name = 'printRowCol' value ='$rowCol'>";
        echo "<input type = 'hidden' name = 'printNumColors' value = '$numColors'>";
        echo "<table style='width:50%'>";
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
        echo '<input type="submit" name="submit" value="Submit">';
        echo "</form>";        

    ?>
 </body>
 </html> 