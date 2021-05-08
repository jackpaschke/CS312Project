<html lang="en">
    

</html>
<body>
    <main>
    <style> 
        .red {background-color: red;
        }
        .orange {background-color: orange;
        }
        .yellow {background-color: yellow;
        }
        .green {background-color: green;
        }
        .teal {background-color: teal;
        }
        .blue {background-color: blue;
        }
        .purple {background-color: purple;
        }
        .brown {background-color: brown;
        }
        .gray {background-color: gray;
        }
        .black {background-color: black;
        }
    </style>

        <?php
            echo Asset::js(array("https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"));

            $letters = range('A', 'Z');
            $numColor = $rowCol = 0;
            function buildForm($errCode){ //Create form an validate form data
                if ($errCode == 1){ //If data out of bounds
                    echo "<p>>Number of rows and columns out of range must be [1-26}</p>";
                }

                $self = $_SERVER["PHP_SELF"]; //Form Variables
                echo    "<form action = '$self' method = 'POST'>
                <label for='rowCol'># of Rows and Columns: </label>
                <input type='text' id='rowCol' name='rowCol' required><br>
                <label for='percent'># of Colors: </label>
                <input type='text' id='numColor' name='numColor' required><br><br>
                <input type='submit' value='Submit'>

                </form>";
            }
            
            $colors = array('red','orange','yellow','green','teal','blue','purple','brown','gray','black');
            $colorKey = array( 0 =>'red', 1 =>'orange', 2 =>'yellow', 3 =>'green', 4 =>'teal', 5 =>'blue', 6 =>'purple', 7 =>'brown', 8 =>'gray', 9 =>'black'); //For assigning colors
            
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                echo "<style>
                td {
                    width: 20px;
                    height: 20px;
                    border: 1px solid black;
                    text-align: center;
                    }

                table {
                    border-color: black;
                    border-style: solid;
                    border-width: 2px;
                    padding: 2px;
                    margin: 10px;
                    }
                    </style>";

                if ( $_POST['numColor'] >= 1 && $_POST['numColor'] <= 10 && $_POST['rowCol'] >= 1 && $_POST['rowCol'] <= 26 ){
                    $rowCol = $_POST['rowCol'];
                    $numColor = $_POST['numColor'];
                    
                    echo'<form method="post" action="print.php">';
                    echo "<table style='width:80%'>";
                    for ($d = 0; $d < $numColor; $d++){
                        echo "<tr><td style='width:20%'>";
                        echo "<select name='color$d' id='color$d'>";
                            for ($a = 0; $a < 10; $a++){
                                $colorType = $colors[$a];
                                if ($d == $a){
                                    echo "<option value='$a' selected>$colorType</option>";
                                }
                                else{
                                    echo "<option value='$a'>$colorType</option>";
                                }
                            }   
                        echo "</select>";

                        if ($d == 0){
                            echo "<input type='radio' name='colorSelect' id='radio$d' value='$d' checked>";
                        }
                        else{
                            echo "<input type='radio' name='colorSelect' id='radio$d' value='$d'>";
                        }
                        echo "</td><td style='width:80%' id='dataRow$d'></td> </tr>";
                        echo "<input type='hidden' name='dataRowForm$d' id='dataRowForm$d' value=' '>";
                    }
                    echo "</table>";
                    
                    echo "<table>";
                    echo "<tr><td></td>";//First Square
                    $letters = range('A', 'Z'); //Build Axes
                    for ($a = 0; $a < $rowCol; $a++){
                        echo "<td>$letters[$a]</td>";
                    }

                    for ($d = 0; $d < $rowCol; $d++){ //Build color grid
                        echo "<tr>";
                        $val = $d+1;
                        echo "<td> $val </td>";

                        for ($a = 0; $a < $rowCol; $a++){
                            $letter = $letters[$a];
                            $number = $d+1;
                            echo "<td name='$letter$number' id='$d-$a' onclick='gridClick($d,$a)'></td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "<input type='hidden' name='numColor' value='$numColor'>";
                    echo "<input type='hidden' name='rowCol' value='$rowCol'>";
                    echo "<input type='submit' value='Print'>";
                    echo "</form>";
                }
                else{ //Form data out of bounds
                    buildForm(1);
                }
            }
            else{
                buildForm(0);
            }
        ?>
        <script type='text/javascript'>
        
            let colors = ['red','orange','yellow','green','teal','blue','purple','brown','gray','black'];
            var selected = [];

            <?php for ($a = 0; $a < $numColor; $a++){?>
                selected.push(parseInt($("#color<?=$a;?> option:selected").val()));
            <?php } 
            ?>
            
            <?php for ($b = 0; $b < 10; $b++){?>
                if (selected.includes(<?=$b;?>)){
                    $("select option[value=<?=$b;?>]").prop("disabled", true);
                }
            <?php } 
            ?>

            <?php for ($c = 0; $c < $numColor; $c++){?>
                $("#color<?=$c;?> option:selected").prop("disabled", false);
            <?php } 
            ?>

            $(function(){
                <?php
                for($d = 0; $d < $numColor; $d++){ 
                    ?>
                    $("#color<?=$d;?>").change(function(){
                        $("select option").prop("disabled", false);

                        for (let l = 0; l < 10; l++){ // Update cell color
                            var selectedColor = ($("#color" + l).val()); // 
                            $(".radioCheck" + l).addClass(colors[selectedColor]).addClass("radioCheck" + l);

                        }

                        var selected = [];
                        <?php for ($a = 0; $a < $numColor; $a++){ ?>
                            selected.push(parseInt($("#color<?=$a; ?> option:selected").val()));
                        <?php } 
                        ?>
                        
                        <?php for ($b = 0; $b < 10; $b++){?>

                            if (selected.includes(<?=$b; ?>)){
                                $("select option[value=<?=$b; ?>]").prop("disabled", true);

                            }
                        <?php } 
                        ?>

                        <?php for ($c = 0; $c < $numColor; $c++ ){ ?>
                            $("#color<?=$c;?> option:selected").prop("disabled", false);
                        <?php } 
                        ?>
                    });
                <?php } 
                ?>
            });

            function gridClick(x,y ){

                var radioValue = ($('input[name = colorSelect]:checked').val());
                var selectedColor = ($("#color" + radioValue).val());

                $( "#" + x + "-" + y ).addClass(colors[selectedColor]).addClass("radioCheck" + radioValue);

                for (let i = 0; i < 10;i++){
                    var values = [];
                    $(".radioCheck" + i).each(function(){
                        values += $(this).attr("name")+", ";
                    }
                    );

                    $('#dataRow' + i).html(values);
                    $('#dataRowForm' + i).attr('value', values);

                }
            }
        </script>
    </main>
</body>