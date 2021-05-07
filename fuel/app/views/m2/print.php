<html>
<header>
<h1>Nemo Tech inc.</h1>
<?php echo Asset::img('nemotechgs.png', array('style' => 'width: 190px;' )) ?>
</header>
 <body>
 <main>
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
            $rowCol = $_POST['rowCol'];
            $numColor = $_POST['numColor'];
            $color1 = 'blue';
            $colorArray = array('red', 'orange', 'yellow', 'green', 'teal', 'blue', 'purple', 'grey', 'brown', 'black');
            echo "<table style='width:85%'>";
            for ($i = 0; $i < $numColor; $i++){
                echo "<tr><td style='width:20%'>";
                    $colorConcat = 'color' . $i;
                    $colorIndexIGuess = $_POST[$colorConcat];
                    echo"$colorArray[$colorIndexIGuess]";
                    
                    $tempList = $_POST['dataRowForm'.$i];
                echo "</td><td style='width:80%'>$tempList</td></tr>";
            }
            echo "</table>";
            
            echo "<table>";
            echo "<tr><td></td>";
            $alphaBet = range('A', 'Z');
            for ($j = 0; $j < $rowCol; $j++){
                echo "<td>$alphaBet[$j]</td>";
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

        ?>
    </main>
 </body>
 </html> 