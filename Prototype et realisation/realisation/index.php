<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nom"];
    $notes = $_POST["notes"];
    $total = 0;
    $erreur = "";

    foreach ($notes as $n) {
        if ($n[0] < 0 || $n[0] > 20 || $n[1] < 0 || $n[1] > 20) {
            $erreur = "النقط خاصها تكون بين 0 و 20";
            break;
        }
        $total += $n[0] + $n[1];
    }

    if ($erreur == "") {
        $moyenne = $total / 10;
        $decision = ($moyenne >= 10) ? "ناجح" : "راسب";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>النقط</title>
</head>
<body>

<h2>النقط</h2>

<form method="POST">
الاسم: <input type="text" name="nom" required><br><br>

<?php
$matieres = ["Math","Sport","francais","Anglais","arabe"];
foreach ($matieres as $m) {
    echo "$m<br>";
    echo "<input type='number' name='notes[$m][]' required> ";
    echo "<input type='number' name='notes[$m][]' required><br><br>";
}
?>

<input type="submit" value="حساب">
<input type="reset" value="مسح">
</form>

<?php if (isset($moyenne) && $erreur == ""): ?>
<hr>
الاسم: <?= $nom ?><br>
المعدل: <?= round($moyenne,2) ?><br>
النتيجة: <?= $decision ?>
<?php elseif (isset($erreur) && $erreur != ""): ?>
<hr>
<b style="color:red"><?= $erreur ?></b>
<?php endif; ?>

</body>
</html>
