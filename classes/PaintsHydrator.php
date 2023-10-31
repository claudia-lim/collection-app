<?php
class PaintsHydrator {
    public static function fetchActiveCollection (PDO $pdo):array {
        $queryFetchActiveCollection = $pdo->prepare(
            'SELECT `paints`.`id`, `brands`.`name` AS "brand_name",
            `colours`.`name` AS "colour_name",
            `paints`.`needs_replacing` AS "need_replacing",
            `paints`.`image`
            FROM `paints`
            INNER JOIN `colours`
            ON `paints`.`colour_id` = `colours`.`id`
            INNER JOIN `brands`
            ON `paints`.`brand_id` = `brands`.`id`
            WHERE `deleted` = 0
            ORDER BY `paints`.`id`;'
            );
        $queryFetchActiveCollection->execute();
        return $queryFetchActiveCollection->fetchAll(PDO::FETCH_CLASS, Paints::class);
    }

public static function fetchArchivedPaints ($pdo):array {
    $queryFetchArchivedPaints = $pdo->prepare('SELECT `paints`.`id`, `brands`.`name` AS "brand_name",
        `colours`.`name` AS "colour_name",
        `paints`.`needs_replacing` AS "need_replacing",
        `paints`.`image`
        FROM `paints`
        INNER JOIN `colours`
        ON `paints`.`colour_id` = `colours`.`id`
        INNER JOIN `brands`
        ON `paints`.`brand_id` = `brands`.`id`
        WHERE `deleted` = 1
        ORDER BY `paints`.`id`;'
        );
    $queryFetchArchivedPaints->execute();
    return $queryFetchArchivedPaints->fetchAll(PDO::FETCH_CLASS, Paints::class);
}
}