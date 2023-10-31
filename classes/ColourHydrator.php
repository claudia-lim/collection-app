<?php

class ColourHydrator {
    public static function fetchAllColours ($pdo) {
        $queryFetchColours = $pdo->prepare(
            'SELECT `name` AS "colour_name", `id` AS "colour_id"
FROM `colours`
ORDER BY `name`;'
        );
        $queryFetchColours->execute();
        return $queryFetchColours->fetchAll(PDO::FETCH_CLASS, Colour::class);
    }
}
