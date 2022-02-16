<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Calculator</title>
</head>
<body>
<h1>Currency Calculator</h1>

<?php
// var_dump($_GET);
$inputForeignCurrency = $_GET["currencyForeignInput"];
?>

<form action="" method="get">
    <label for="currencyForeign">Local currency</label><br>
    <input type="text" id="currencyForeign" name="currencyForeignInput"><br>
    <label for="currencyEuro">Euro</label><br>
    <input type="text" id="currencyEuro" name="currencyEuroInput" disabled><br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>