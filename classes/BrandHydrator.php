<?php
class BrandHydrator {
    public static function fetchAllBrands($pdo) {

        $queryFetchBrands = $pdo->prepare ('SELECT `name` AS "brand_name", `id` AS "brand_id"
FROM `brands`
ORDER BY `name`;'
        );
        $queryFetchBrands->execute();
        return $queryFetchBrands->fetchAll(PDO::FETCH_CLASS, Brand::class);
    }
}