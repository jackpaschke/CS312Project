<body>
    <header>
        <h1>Color Coordinate Generator</h1>
    </header>
    <main>
        <?php
            function formBuild($err){ // Error printed on form validation failure
                if ($err == 1){
                    echo "<style> 
                        h3{
                            color: red;
                        }
                        </style>"; //Set error text style
                    echo "<h3>Form validation error: <br>
                     Parameter out of bounds. <br>
                     Rows/Columns must be [1-26] <br>
                     Colors must be [1-10] <br>
                     </h3>";
                }
                $self = $_SERVER["PHP_SELF"];
                echo    "<form action = '$self' method = 'POST''>
                            <label for='rowCol'># of Rows and Columns:</label>
                            <input type='text' id='rowCol' name='rowCol' required><br>
                            <label for='percent'># of Colors:</label>
                            <input type='text' id='numColors' name='numColors' required><br><br>
                            <input type='submit' value='Submit'>
                            </form>";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                echo "<style>
                        td{
                            width: 20px;
                            height: 20px;
                            border: 1px solid black;
                        }
                        table{
                            border-color: black;
                            border-style: solid;
                            border-width: 2px;
                        }

                    </style>"; //Stule for color coordinate table

                if ( $_POST['rowCol'] > 0 && $_POST['rowCol'] < 27 && $_POST['numColors'] > 0 && $_POST['numColors'] < 11){ //form validation parameters
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
                    echo "<input type='submit' value='Submit'>";
                    echo "</form>";
                }
                else{// Variables failed to validate
                    formBuild(1);
                }
            }// End of POST request
            else{
                echo "Get request has been made <br>";
                formBuild(0);
            }
        ?>
    </main>
</body>
