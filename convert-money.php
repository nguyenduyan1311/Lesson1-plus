<form method="post">
    <input type="number" name="convert" placeholder="Số tiền USD">
    <button>Convert</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $convert = $_POST["convert"];
    if ($convert > 0) {
        $result = $convert * 23000;
        echo "Số tiền VND: " . $result;
    } else {
        echo "Không chuyển được";
    }
}
