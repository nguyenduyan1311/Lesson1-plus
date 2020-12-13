<form method='post'>
    <h2>Menu</h2>
    <input type="radio" name="shape" value="rectangle">Print the rectangle<br>
    <input type="radio" name="shape" value="square-triangle">Print the square triangle
    <select name='rectangular'>
        <option value="top-left">Top-left</option>
        <option value="top-right">Top-right</option>
        <option value="bottom-right">Bottom-right</option>
        <option value="bottom-left">Bottom-left</option>
    </select><br>
    <input type="radio" name="shape" value="isosceles-triangle">Print the isosceles triangle<br>
    <input type="radio" name="shape" value="exit">Exit<br>
    <button>Search</button>
</form>
<?php
function drawRectangle(){
    $text = "";
    for ($row = 0; $row < 3; $row++) {
        $text .= "<tr>";
        for ($col = 0; $col < 7; $col++) {
            $text .= "<td>*</td>";
        };
        $text .= "</tr>";
    }
    return $text;
}
function drawSquareTriangle($rectangular){
    $text = "";
    switch ($rectangular) {
        case 'bottom-left';
            for ($i= 1; $i <= 5; $i++) {
                $text .= "<tr>";
                for ($j = 1; $j <= $i; $j++) {
                    $text .= "<td>*</td>";
                };
                $text .= "</tr>";
            };
            break;
        case 'top-left':
            for ($i= 5; $i >= 1; $i--) {
                $text .= "<tr>";
                for ($j = 1; $j <= $i; $j++) {
                    $text .= "<td>*</td>";
                };
                $text .= "</tr>";
            }
            break;
        case 'top-right':
            for ($i = 1; $i <= 5; $i++){
                for ($j = 1; $j <= 5; $j++){
                    if ($i <= $j){
                        $text .= "*";
                    } else {
                        $text .= "&nbsp;&nbsp;";
                    }
                }
                $text .= "</br>";
            }
            $text .= "</br>";
            break;
        case 'bottom-right':
            for ($i = 5; $i > 0; $i--) {
                for ($j = 1; $j < 6; $j++) {
                    if ($j >= $i) {
                        $text .= "*";
                    } else {
                        $text .= "&nbsp;&nbsp;";
                    }
                }
                $text .= "</br>";
            }
            $text .= "</br>";
            break;
    }
    return $text;
}
function drawIsoscelesTriangle(){
    $text = "";
    for ($i=0; $i<=5; $i++) {
        for ($j=5; $j>$i; $j--) {
            $text .= "&nbsp;&nbsp;";
        }
        for ($k=0; $k<$i; $k++) {
            $text .= "*&nbsp&nbsp;";
        }
        $text .= "<br>";
    }
    return $text;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rectangular = $_POST['rectangular'];
    $shape = $_POST['shape'];
        $text = "<table>";
        switch ($shape) {
            case 'rectangle':
                $text .= drawRectangle();
                break;
            case 'square-triangle':
                $text .= drawSquareTriangle($rectangular);
                break;
            case 'isosceles-triangle':
                $text .= drawIsoscelesTriangle();
                break;
            case 'exit':
                $text .= "Do you want to exit?";
                break;
        }
        $text .= '</table>';
        echo $text;
}
