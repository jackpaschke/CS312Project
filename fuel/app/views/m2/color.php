<html lang="en">
    
    <style> 
        .red {background-color: red;}
        .orange {background-color: orange;}
        .yellow {background-color: yellow;}
        .green {background-color: green;}
        .teal {background-color: teal;}
        .blue {background-color: blue;}
        .purple {background-color: purple;}
        .gray {background-color: gray;}
        .brown {background-color: brown;}
        .black {background-color: black;}
    </style>
</html>

<body>
    <main>
        
        <?php
            $cetters = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']; // Letters for coordinate grid
            $numColor = $rowCol = 0;
            echo Asset::js(array("https://code.jquery.com/jquery-3.6.0.min.js"));
            echo "
            <script type='text/javascript'>
            function stopDupes(){
                let selectArray = $('color');
                for (let i = 0; i < selectArray.length; i++){
                    selectArray[i].selectedIndex = i;
                }
            }
            </script>";
            
            function buildForm($errCode){ //Create form an validate form data
                if ($errCode == 1){ //If data out of bounds
                    echo "<p>>Number of rows and columns out of range must be [1-26}</p>";
                }
                $self = $_SERVER["PHP_SELF"];
                echo    "<form action = '$self' method = 'POST'>
                <label for='rowCol'>Number of Rows and Columns:</label>
                <input type='text' id='rowCol' name='rowCol' required><br>
                <label for='percent'>Number of Colors:</label>
                <input type='text' id='numColor' name='numColor' required><br><br>
                <input type='hidden' name='test' value='a'>
                <input type='submit' value='Submit'>
                </form>";
            }
            
            $colors = array('red','orange','yellow','green','teal','blue','purple','grey','brown','black');
            $colorKey = array( 0 => 'red', 1 => 'orange', 2 => 'yellow', 3 => 'green', 4 => 'teal', 5 => 'blue', 6 => 'purple', 7 => 'grey', 8 => 'brown', 9 => 'black');
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
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
                    </style>";

                if ( $_POST['rowCol'] >= 1 && $_POST['rowCol'] <= 26 && $_POST['numColor'] >= 1 && $_POST['numColor'] <= 10){
                    $rowCol = $_POST['rowCol'];
                    $numColor = $_POST['numColor'];
                    
                    echo'<form method="post" action="print.php">';
                    echo "<table style='width:90%'>";
                    for ($d = 0; $d < $numColor; $d++){
                        echo "<tr><td style='width:20%'>";
                        echo "<select name='color$d' id='color$d'>";
                            for ($a = 0; $a < 10; $a++){
                                $colorType = $colors[$a];
                                if ($d == $a){
                                    echo "<option value='$a' selected>$colorType</option>";
                                }else{
                                    echo "<option value='$a'>$colorType</option>";
                                }
                            }   
                        echo "</select>";
                        if ($d == 0){
                            echo "<input type='radio' name='colorSelect' id='radio$d' value='$d' checked>";
                        }else{
                            echo "<input type='radio' name='colorSelect' id='radio$d' value='$d'>";
                        }
                        echo "</td><td style='width:80%' id='longRow$d'></td></tr>";
                        echo "<input type='hidden' name='longRowForm$d' id='longRowForm$d' value=' '>";
                    }
                    echo "</table>";
                    
                    echo "<table>";
                    echo "<tr><td></td>";
                    $cetters = range('A', 'Z');
                    for ($a = 0; $a < $rowCol; $a++){
                        echo "<td>$cetters[$a]</td>";
                    }

                    for ($d = 0; $d < $rowCol; $d++){
                        echo "<tr>";
                        $val = $d+1;
                        echo "<td>$val</td>";
                        for ($a = 0; $a < $rowCol; $a++){
                            $cetter = $cetters[$a];
                            $number = $d+1;
                            echo "<td name='$cetter$number' id='$d-$a' onclick='mainClick($d,$a)'></td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";

                    echo "<input type='hidden' name='test' value='b'>";
                    echo "<input type='hidden' name='numColor' value='$numColor'>";
                    echo "<input type='hidden' name='rowCol' value='$rowCol'>";
                    echo "<input type='submit' value='Submit'>";
                    echo "</form>";

                }
                else{
                    buildForm(1);
                }
            }
            else{
                buildForm(0);
            }
        ?>
        <script type='text/javascript'>
            let colors = ['red','orange','yellow','green','teal','blue','purple','gray','brown','black'];
            var selected = [];

            <?php for ($a = 0; $a < $numColor; $a++){?>
                selected.push(parseInt($("#color<?=$a;?> option:selected").val()));
            <?php } ?>
            
            <?php for ($b = 0; $b < 10; $b++){?>
                if (selected.includes(<?=$b;?>)){
                    $("select option[value=<?=$b;?>]").prop("disabled", true);
                }
            <?php } ?>

            <?php for ($c = 0; $c < $numColor; $c++){?>
                $("#color<?=$c;?> option:selected").prop("disabled", false);
            <?php } ?>

            $(function(){
                <?php
                for($d = 0; $d < $numColor; $d++){ 
                    ?>
                    $("#color<?=$d;?>").change(function(){
                        $("select option").prop("disabled", false);

                        for (let l = 0; l < 10; l++){ // Update cell color
                            var selectedColor = ($("#color" + l).val()); // 
                            $(".radioCheck" + l).removeClass().addClass(colors[selectedColor]).addClass("radioCheck" + l);
                        }

                        var selected = [];
                        <?php for ($a = 0; $a < $numColor; $a++){?>
                            selected.push(parseInt($("#color<?=$a;?> option:selected").val()));
                        <?php } ?>
                        
                        <?php for ($b = 0; $b < 10; $b++){?>
                            if (selected.includes(<?=$b;?>)){
                                $("select option[value=<?=$b;?>]").prop("disabled", true);
                            }
                        <?php } ?>

                        <?php for ($c = 0; $c < $numColor; $c++){?>
                            $("#color<?=$c;?> option:selected").prop("disabled", false);
                        <?php } ?>
                    });
                <?php } ?>
            });
            function mainClick(x,y){
                var radioIndex = ($('input[name = colorSelect]:checked').val());
                var selectedColor = ($("#color" + radioIndex).val());
                $("#" + x + "-" + y).removeClass().addClass(colors[selectedColor]).addClass("radioCheck" + radioIndex);

                for (let i = 0; i < 10; i++){
                    var values = [];
                    $(".radioCheck" + i).each(function(){
                        values += $(this).attr("name");
                        values += ", ";
                    });
                    
                    $('#longRow' + i).html(values);
                    $('#longRowForm' + i).attr('value', values);
                }
            }
        </script>
    </main>
</body>