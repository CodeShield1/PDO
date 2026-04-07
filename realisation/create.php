<!DOCTYPE html>
<html>
<head>
    <title>Add Recipe</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>

<h1>➕ Add Recipe</h1>

<div class="form-container">

<form action="store.php" method="POST">

    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Category:</label>
    <select name="category">
        <option value="Entree">Entree</option>
        <option value="Plat">Plat</option>
        <option value="Dessert">Dessert</option>
    </select>

    <label>Preparation Time:</label>
    <input type="number" name="prep_time" required>

    <label>Image:</label>
    <input type="text" name="image">

    <button type="submit">Add Recipe</button>
        <a href="index.php" class="btn">retuer</a>


</form>

</div>

</body>
</html>