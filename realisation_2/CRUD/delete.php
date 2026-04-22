<?php
// connection
$pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "");

// traitement
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // check file
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $file = $_FILES['image'];

        $fileName = $file['name'];
        $tmpName = $file['tmp_name'];
        $fileSize = $file['size'];

        // extension
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // allowed types (pro way)
        $allowed = ['jpg', 'jpeg', 'png'];

        if (in_array($ext, $allowed)) {

            // size limit (2MB)
            if ($fileSize <= 2 * 1024 * 1024) {

                // unique name
                $newName = uniqid() . "." . $ext;

                $uploadDir = "uploads/";
                $path = $uploadDir . $newName;

                // move file
                if (move_uploaded_file($tmpName, $path)) {

                    // insert to DB
                    $sql = "INSERT INTO products (image) VALUES (?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$path]);

                    echo "✅ Image uploaded & saved in DB<br>";
                    echo "<img src='$path' width='200'>";

                } else {
                    echo "❌ Error uploading file";
                }

            } else {
                echo "❌ File too large (max 2MB)";
            }

        } else {
            echo "❌ Only JPG, JPEG, PNG allowed";
        }

    } else {
        echo "❌ No file selected";
    }
}
?>

<!-- FORM -->
<form method="POST" enctype="multipart/form-data">

    <input type="file" name="image" required><br><br>

    <button type="submit">Upload</button>

</form>