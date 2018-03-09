<?php
// Extraction des données à partir d'un fichier de config.
$config = [
    'host' => 'localhost',
    'port' => 3306,
    'database' => 'php_is_best',
    'username' => 'root',
    'passwd' => ''
];

$users = [
    [
        "name" => "Bibi",
        "email" => "Bibi@domain.tld"
    ],
    [
        "name" => "John",
        "email" => "John@domain.tld"
    ],    [
        "name" => "Jack",
        "email" => "Jack@domain.tld"
    ],    [
        "name" => "Boby",
        "email" => "Boby@domain.tld"
    ]
];
extract($config);
try {
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$database",
        $username,
        $passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//    var_dump($pdo);
    // Insert user
//    $pdo->exec("INSERT INTO users (username, email) VALUES ('john', 'john.doe@domain.tld')");
//    var_dump(sprintf("Last insert: %s", $pdo->lastInsertId()));
    $stmt = $pdo->query("SELECT * FROM users");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        var_dump($row['username']);
    }
    $stmt->closeCursor();
} catch (PDOException $e) {
    var_dump("Tu t'es planté dans la config !");
} finally {
    $pdo = null;
}


