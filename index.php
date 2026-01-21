<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea CV - Forum</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2,
        h3 {
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        select:focus,
        textarea:focus {
            border-color: #4CAF50;
            outline: none;

            box-shadow: 0 0 5px rgba(87, 178, 90, 0.3);
        }

        .checkbox-group,
        .radio-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 10px;
        }

        .checkbox-group label,
        .radio-group label {
            display: flex;
            align-items: center;
            margin-bottom: 0;
            font-weight: normal;
        }

        input[type="checkbox"],
        input[type="radio"] {
            margin-right: 8px;
            width: auto;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: #d32f2f;
            font-size: 14px;
            margin-top: 5px;
        }

        .success {
            background-color: #e8f5e9;
            border-left: 4px solid #4CAF50;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .cv-section {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eee;
        }

        .cv-section:last-child {
            border-bottom: none;
        }
    </style>
</head>

<body>
    <h2> compila il form per creare il tuo cv </h2>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2>Login</h2>
        <label for="nome">nome</label>
        <input type="text" name="nome">

        <label for="cognome">cognome</label>
        <input type="text" name="cognome">

        <label for="email">email</label>
        <input type="text" name="email">

        <label for="tel">telefono</label>
        <input type="text" name="telefono">

        <label for="professione">professione</label>
        <select name="professione">
            <option value="Studente">Studente</option>
            <option value="Impiegato">Impiegato</option>
            <option value="Freelancer">Freelancer</option>
            <option value="Manager">Manager</option>
        </select>

        <label for="hobby">Hobbies</label>
        <div>
            <input type="checkbox" id="hobby_sport" name="hobby[]" value="Sport">
            <label for="hobby_sport">Sport</label>
        </div>
        <div>
            <input type="checkbox" id="hobby_musica" name="hobby[]" value="Musica">
            <label for="hobby_musica">Musica</label>
        </div>
        <div>
            <input type="checkbox" id="hobby_viaggi" name="hobby[]" value="Viaggi">
            <label for="hobby_viaggi">Viaggi</label>
        </div>
        <div>
            <input type="checkbox" id="hobby_lettura" name="hobby[]" value="Lettura">
            <label for="hobby_lettura">Lettura</label>
        </div>

        <label for="coniugato">Coniugato</label>
        <div>
            <input type="radio" id="coniugato_si" name="coniugato" value="Si">
            <label for="coniugato_si">Si</label>
        </div>
        <div>
            <input type="radio" id="coniugato_no" name="coniugato" value="No">
            <label for="coniugato_no">No</label>
        </div>
        <label for="profilo">Profilo Professionale</label>
        <textarea name="profilo" id="profilo" cols="30" rows="10"></textarea>

        <button type="submit">Crea CV</button>
    </form>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];
        $pattern = '/^[a-zA-ZÀ-ÿ\s\'-]{2,50}$/';

        if (empty($_POST['nome'])) {
            $errors[] = "Il nome è obbligatorio";
        } elseif (!preg_match($pattern, $_POST['nome'])) {
            $errors[] = $_POST['nome'] . "Il nome deve contenere solo lettere e spazi";
        }

        if (empty($_POST['cognome'])) {
            $errors[] = "Il cognome è obbligatorio";
        } elseif (!preg_match($pattern, $_POST['cognome'])) {
            $errors[] = $_POST['cognome'] . "Il cognome deve contenere solo lettere e spazi";
        }
        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = $_POST['email'] . "Email non valida";
        }
        if (empty($_POST['telefono'])) {
            $errors[] = "Il telefono è obbligatorio";
        }

        if (!empty($errors)) {
            echo "<div style='background-color: #ffebee; border-left: 4px solid #d32f2f; padding: 15px; margin-bottom: 20px; border-radius: 4px; color: #d32f2f;'>";
            echo "<strong>❌ Errori nel form:</strong>";
            echo "<ul style='margin-top: 10px; margin-left: 20px;'>";
            foreach ($errors as $error) {
                echo "<li>" . htmlspecialchars($error) . "</li>";
            }
            echo "</ul>";
            echo "</div>";
        } else {
            header("Location: page.php");
            exit();
        }
    }

    ?>
</body>

</html>