<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Calculator</title>
</head>
<body>
<h1>Currency Calculator</h1>

<?php
$inputDollarCurrency = 1;

$inputDollarCurrency = isset($_POST["currencyForeignInput"]);
$inputEuroCurrency = ($inputDollarCurrency / 100) * 88;


$currencyName = "lira";
$currenciesForeignValue = 1;

if(isset($_POST["currenciesName"]))
  $currencyName = $_POST["currenciesName"];

if(isset($_POST["currenciesForeignInput"]))
  $currenciesForeignValue = $_POST["currenciesForeignInput"];

function currencyConvert($currencyType, $amount) : float {
  if($currencyType === "lira") {
    return $amount * 0.064;
  }
  if($currencyType === "yen") {
    return $amount * 0.0076;
  }
  if($currencyType === "pound") {
    return $amount * 1.19;
  }
  if($currencyType === "franc") {
    return $amount * 0.95;
  }
  return 0;
}

function showCurrencyName($currencyName) : string {
    if($currencyName === "lira") {
        return "Turkish Lira";
    }
    if($currencyName === "yen") {
        return "Japanese Yen";
    }
    if($currencyName === "pound") {
        return "British Pound";
    }
    if($currencyName === "franc") {
        return "Swiss Franc";
    }
    return "";
}

$correctCurrencyName = showCurrencyName($currencyName);
$calculate = currencyConvert($currencyName, $currenciesForeignValue);

?>

<form action="" method="post">
    <label for="currencyForeign">Dollar</label><br>
    <input type="text" id="currencyForeign" name="currencyForeignInput" value="<?php echo $inputDollarCurrency ?>">
    <input type="button" name="switch" value="Switch"><br>

    <label for="currencyEuro">Euro</label><br>
    <input type="text" id="currencyEuro" name="currencyEuroInput" value="<?php echo $inputEuroCurrency ?>" disabled><br><br>
    <input type="submit" value="Convert">
</form>

<br><br>

<form action="" method="post">
    <label for="currenciesForeign">Choose your currency:</label>
    <select id="currenciesForeign" name="currenciesName">
        <option value="lira">Turkish Lira</option>
        <option value="yen">Japanese Yen</option>
        <option value="pound">British Pound</option>
        <option value="franc">Swiss Franc</option>
    </select><br><br>

    <label for="currenciesForeignValue"><?php echo $correctCurrencyName ?> Amount:</label>
    <input type="text" id="currenciesForeignValue" name="currenciesForeignInput" value="<?php echo $currenciesForeignValue ?>"><br><br>
    <label for="currenciesLocalValue">Amount in Euro:</label>
    <input type="text" id="currenciesLocalValue" name="currenciesLocalInput" value="<?php echo $calculate ?>" disabled><br><br>

    <input type="submit" value="Convert">
</form>
</body>
</html>