<?php

try {
    $dbname = 'posts';
    $user   = 'postgres';
    $pass   = '12345';
    $host   = 'psql';
    $port   = '5432';
    $driver = 'pgsql';
    $dsn    = "{$driver}:host={$host};port={$port};dbname={$dbname}";

    $dbh = new \PDO($dsn, $user, $pass);


    $dbh->beginTransaction();
    $query = "INSERT INTO teste (nome) VALUES ('Teste');";

    $dbh->query($query);
    $dbh->commit();

    $query = "SELECT * FROM teste";

    echo "begin data <br>";

    foreach ($dbh->query($query) as $row) {
        echo "ID: ".$row['id'] . ' | ' . "NOME: ".$row['nome'];
        echo "<br>";
    }

    echo "<br>end data <br>";


} catch(\PDOException $exception) {
    echo $exception->getMessage();
    echo "<br>";
    echo $exception->getTraceAsString();
};

phpinfo();
