<?php
$method = "AES-256-CBC";
$key = "studentaesassignmentkey2025!!!";
$iv  = "aesinitvector160";

$inputText = "";
$encryptedText = "";
$decryptedText = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["text"];

    if (isset($_POST["encrypt"])) {
        $encryptedText = openssl_encrypt($inputText, $method, $key, 0, $iv);
    }

    if (isset($_POST["decrypt"])) {
        $decryptedText = openssl_decrypt($inputText, $method, $key, 0, $iv);
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>AES Encryption and Decryption</title>
</head>
<body>

<h2>PHP AES Encryption & Decryption</h2>

<form method="post">
    <textarea name="text" rows="5" cols="50" placeholder="أدخل النص هنا"><?php echo htmlspecialchars($inputText); ?></textarea>
    <br><br>
    <input type="submit" name="encrypt" value="تشفير">
    <input type="submit" name="decrypt" value="فك التشفير">
</form>

<?php if ($encryptedText): ?>
    <h3>النص المشفر:</h3>
    <p><?php echo $encryptedText; ?></p>
<?php endif; ?>

<?php if ($decryptedText): ?>
    <h3>النص بعد فك التشفير:</h3>
    <p><?php echo htmlspecialchars($decryptedText); ?></p>
<?php endif; ?>

</body>
</html>
