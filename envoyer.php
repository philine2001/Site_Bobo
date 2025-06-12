<?php
$host = 'localhost';
$port = '5432';
$db   = 'site_touristique';
$user = 'postgres';
$pass = '1234';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);

    $sql = "INSERT INTO reservation (nom, prenom, email, tel, arrivee, depart, chambre, commentaire)
            VALUES (:nom, :prenom, :email, :tel, :arrivee, :depart, :chambre, :commentaire)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nom'         => $_POST['nom'],
        ':prenom'      => $_POST['prenom'],
        ':email'       => $_POST['email'],
        ':tel'         => $_POST['tel'],
        ':arrivee'     => $_POST['arrivee'],
        ':depart'      => $_POST['depart'],
        ':chambre'     => $_POST['chambre'],
        ':commentaire' => $_POST['commentaire']
    ]);

    // ✅ Redirection vers une page merci.html
    header("Location: merci.html");
    exit();

} catch (PDOException $e) {
    echo "<h2 style='color: red;'>❌ Erreur : " . $e->getMessage() . "</h2>";
}
?>
