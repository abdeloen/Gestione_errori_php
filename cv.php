<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php


    echo "<h1>Il tuo Curriculum</h1>";

    echo "<p><strong>Nome:</strong> " . $_POST['nome'] . "</p>";
    echo "<p><strong>Cognome:</strong> " . $_POST['cognome'] . "</p>";
    echo "<p><strong>Email:</strong> " . $_POST['email'] . "</p>";
    echo "<p><strong>Telefono:</strong> " . $_POST['telefono'] . "</p>";
    echo "<p><strong>Professione:</strong> " . $_POST['professione'] . "</p>";

    echo "<p><strong>Hobbies:</strong> ";
    if (!empty($_POST['hobby'])) {
        echo implode(", ", $_POST['hobby']);
    } else {
        echo "Nessuno";
    }
    echo "</p>";

    echo "<p><strong>Coniugato:</strong> " . ($_POST['coniugato'] ?? "") . "</p>";

    echo "<h3>Profilo Professionale:</h3>";
    echo "<p>" . $_POST['profilo'] . "</p>";


?>
</body>
</html>
