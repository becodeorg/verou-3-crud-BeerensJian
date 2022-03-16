<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MouseHero - Edit Entry</title>
</head>
<body>
<h1>Edit the entry</h1>
<form action="index.php" method="get">
    <label for="editID">ID:</label>
    <input disabled type="text" name="editID" id="editID" value="<?= $miceToEdit[0]['id'] ?>">
    <label for="editName">Name:</label>
    <input type="text" name="editName" id="editName" value="<?= $miceToEdit[0]['name'] ?>">
    <label for="editPrice">Price:</label>
    <input type="text" name="editPrice" id="editPrice" value="<?= $miceToEdit[0]['price'] ?>">
    <label for="editWeight">Weight:</label>
    <input type="text" name="editWeight" id="editWeight" value="<?= $miceToEdit[0]['weight'] ?>">
    <label for="editBrand">Brand:</label>
    <input type="text" name="editBrand" id="editBrand" value="<?= $miceToEdit[0]['brand'] ?>">
    <input type="submit" name="action" value="update">
</form>
</body>
</html>