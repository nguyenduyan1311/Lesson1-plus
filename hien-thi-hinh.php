<form method='post'>
    <input type="radio" name="shape" value="rectangle" checked />Rectangle<br />
    <input type="radio" name="shape" value="triangle" />Triangle<br />
    <select name='rectangular'>
        <option value="top-left">top-left</option>
        <option value="top-right">top-right</option>
        <option value="bottom-right">bottom-right</option>
        <option value="bottom-left">bottom-left</option>
    </select><br />
    <input type='submit' value='Draw' />
</form>
<?php
function drawRectangle()
{
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
function drawTriangle($rectangular)
{
    $text = "";

    switch ($rectangular) {
        case 'bottom-left';
            for ($row = 1; $row <= 5; $row++) {
                $text .= "<tr>";
                for ($col = 1; $col <= $row; $col++) {
                    $text .= "<td>*</td>";
                };
                $text .= "</tr>";
            };
            break;
        case 'top-left':
            for ($row = 5; $row >= 1; $row--) {
                $text .= "<tr>";
                for ($col = 0; $col < $row; $col++) {
                    $text .= "<td>*</td>";
                };
                $text .= "</tr>";
            }
            break;
        case 'top-right':
            $i = 1;
            for ($row = 0; $row < 5; $row++) {
                $text .= "<tr>";
                for ($col = 0; $col < $i; $col++) {
                    if ($col >= $i) {
                        $text .= "<td>*</td>";
                    } else {
                        $text .= "<td></td>";
                    }
                };
                $text .= "</tr>";
                $i++;
            };
            break;
        case 'bottom-right':
            $i = 5;
            for ($row = 0; $row < 5; $row++) {
                $text .= "<tr>";
                for ($col = 0; $col < $i; $col++) {
                    if ($col >= $i) {
                        $text .= "<td>*</td>";
                    } else {
                        $text .= "<td></td>";
                    }
                }
                $text .= "</tr>";
                $i--;
            }
            break;
        default:
    };

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
            case 'triangle':
                $text .= drawTriangle($rectangular);
                break;
        };
        $text .= '</table>';

        echo $text;
}