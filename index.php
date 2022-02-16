<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Calculator</title>
</head>
<body>
<h1>Currency Calculator</h1>

<?php
$inputDollarCurrency = $_POST["currencyForeignInput"];
$inputEuroCurrency = ($inputDollarCurrency / 100) * 88;
echo $inputDollarCurrency;
?>

<form action="" method="post">
    <label for="currencyForeign">Dollar</label><br>
    <input type="text" id="currencyForeign" name="currencyForeignInput"><br>
    <label for="currencyEuro">Euro</label><br>
    <input type="text" id="currencyEuro" name="currencyEuroInput" value="<?php echo $inputEuroCurrency ?>" disabled><br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>