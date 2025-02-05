<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background-color: #eff5fa;
        }

        .title {
            color: white;
            background-color: #1d3a6d;
            padding: 10px 0;
            text-align: center;
        }

        .subtitle {
            color: white;
            background-color: #4aa0c4;
            padding: 5px 0;
            text-align: center;
        }

        .todo {
            color: crimson;
            background-color: #F2DEDE;
            padding: 10px 0;
            text-align: center;
            font-size: 20px;
        }

        .solution {
            color: green;
            background-color: #E6FFE6;
            padding: 10px 0;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            margin: 0 auto;
            width: 40%;

        }

        label {
            display: block;
        }

        input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 90%;
            margin: 10px;
        }

        input[type="submit"] {
            background-color: #4aa0c4;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-top: 20px;
            display: block;
        }
    </style>
</head>

<body>
    <h2 class="title">La méthode POST</h2>
    <h2 class="subtitle">Formulaire 2</h2>
    <h3 class="todo">Exercice</h3>

    <form action="traitement-formulaire-3.php" method="post">

        <label for="pseudo">pseudo :</label>
        <input type="text" name="pseudo">

        <label for="email">Email :</label>
        <input type="email" name="email">

        <input type="submit" value="Envoyer">
    </form>


</body>

</html>