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

            $rowCol = $_POST['rowCol'];
            $numColor = $_POST['numColor'];

            $colorArray = array('red', 'orange', 'yellow', 'green', 'teal', 'blue', 'purple', 'brown', 'gray', 'black');
            echo "<table style='width:85%'>";
            for ($i = 0; $i < $numColor; $i++){
                echo "<tr><td style='width:20%'>";
                    $colornum = 'color'.$i;
                    $colorInd = $_POST[$colornum];
                    echo"$colorArray[$colorInd]";
                    
                    $dataList = $_POST['dataRowForm'.$i];

                echo "</td><td style='width:80%'>$dataList</td></tr>";
            }

            echo "</table>";
            
            echo "<table>";
            echo "<tr><td></td>";

            $alphaBet = range('A', 'Z');
            for ($k = 0; $k < $rowCol; $k++){
                echo "<td>$alphaBet[$k]</td>";
            }

            for ($l = 1; $l<$rowCol+1; $l++){
                echo "<tr>";
                echo "<td>$l</td>";

                for ($k = 0; $k<$rowCol; $k++ ){
                    echo "<td></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
 </body>
 </html> 