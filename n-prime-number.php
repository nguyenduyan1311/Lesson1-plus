<form method="post">
    <input type="number" name="numbers" placeholder="Số lượng số nguyên tố">
    <button>Search</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numbers = $_POST["numbers"];
    if ($numbers <= 0){
        echo "Không thể hiển thị";
    }
    $count = 0;
    $i = 2;
    while ($count < $numbers) {
        if (isPrimeNumber($i)) {
            $result .=  $i . " ";
            $count ++;
        }
        $i++;
    }
    echo $result;
}
function isPrimeNumber($n)
{
    if ($n < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}
