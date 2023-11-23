<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fight club</title>
</head>
<body>
<form action="./roles/arena.php" method="POST">
    <label for="hero">Make a choice for a Hero</label>
    <select name="hero" id="hero">
        <option value="mage">Mage</option>
        <option value="warrior">Warrior</option>
    </select>
    <label for="hero">And for his an opponent</label>
    <select name="opponent" id="opponent">
        <option value="warrior">Warrior</option>
        <option value="mage">Mage</option>
    </select>
    <button type="submit">Submit</button>
</form>
</body>
</html>