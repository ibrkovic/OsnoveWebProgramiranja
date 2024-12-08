<?php include('templates/header.tpl.php'); ?>

<?php
require_once('lib/db.php');

$title = 'Moja Web Aplikacija';
$info = 'Dobrodošli u moju web aplikaciju!';
$messages = [];

if (isset($_POST['poslano'])) {
    $email = $_POST['email'];
    $poruka = $_POST['poruka'];

    if (!empty($email) && !empty($poruka)) {
        $sql = "INSERT INTO messages (email, message) VALUES (
            '".$db->real_escape_string($email)."',
            '".$db->real_escape_string($poruka)."'
        )";
        $db->query($sql);
        $info = 'Hvala na poslanoj poruci! Odgovor ćemo poslati na: ' . htmlspecialchars($email);
    }
}

$sql = "SELECT * FROM messages";
$result = $db->query($sql);
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $messages[] = $row;
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/grid.css">
</head>
<body>
    <header>
        <h1><?php echo $title; ?></h1>
        <nav>
            <ul>
                <li><a href="phpPrimjeri.php">Primjeri PHP-a</a></li>
                <li><a href="myApp.php">Moja Aplikacija</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <p><?php echo $info; ?></p>

        <form action="myApp.php" method="post">
            Email: <input type="email" name="email" required><br>
            Poruka: <textarea name="poruka" required></textarea><br>
            <input type="submit" name="poslano" value="Pošalji">
        </form>

        <?php if (empty($messages)) { ?>
            <strong>Baza podataka je prazna!</strong>
        <?php } else { ?>
            <table>
                <tr>
                    <th>ID poruke</th>
                    <th>E-mail</th>
                    <th>Poruka</th>
                </tr>
                <?php foreach ($messages as $message) { ?>
                    <tr>
                        <td><?= intval($message['messageID']) ?></td>
                        <td><?= htmlspecialchars($message['email']) ?></td>
                        <td><?= htmlspecialchars($message['message']) ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </main>

    <?php include('templates/footer.tpl.php'); ?>

</body>
</html>