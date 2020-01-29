<?php

/**
 * $size: Lapméret
 * ??: PHP7-ben null coalescing operator
 */

$size = $_GET["size"] ?? 10;

/**
 * $page: Oldalszám, alapértelmezetten 1
 */
$page = $_GET["page"] ?? 1;

/**
 * Adatbázis kapcsolat
 */
$connection = mysqli_connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
if (mysqli_connect_errno($connection)) {
    die(mysqli_connect_error());
}

/** 
 * $offset: eltolás kiszámítása
 */
$offset = ($page - 1) *$size;

/**
 * $query - SQL lekérdezés
 */
$query = "SELECT * FROM photos LIMIT $size OFFSET $offset";
$result = mysqli_query($connection, $query);
$contect = mysqli_fetch_all($result, MYSQLI_ASSOC);

/**
 * $total: a képek számának meghatározása 
 */
$query = "SELECT count(*) AS count FROM photos";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
//var_dump($row);
$total = $row['count'];


/**
 * $lastPage - Az utolsó oldal sorszáma
 */
$lastPgae = $total % $page == 0 ? intdiv($total, $page) : intdiv($total, $page) + 1;






//Függvények

/**
 * Lapozást megvalósító függvény
 *
 * @param [int] $total Összes képszám
 * @param [int] $currentPage Aktuális oldal száma
 * @param [int] $size Lapméret
 * @return [string] A lapozósáv listaelemeinek a markup-ját adja vissza
 */
function paginate($total, $currentPage, $size) {
    $page = 0;
    $markup = ""; //Ebbe fogjuk a visszaadandó html markup-ot összefűzni

    //Előző oldal
    if($currentPage > 1) 
    {
        $prevPage = $currentPage - 1;
        $markup .= "<li class=\"page-item\">
                    <a class =\"page-link\" href=\"?size=$size&page=$prevPage\">Prev</a>
                </li>";
    } else {
        $markup .= "<li class=\"page-item disabled\">
                <a class=\"page-link\" href=\"#\">Prev </a>
                </li>";
    }


    //Számozott lapok
    for($i=0; $i < $total; $i += $size) {
        $page++;
        $activeClass = $currentPage == $page ? "active" : "";
        $markup .= "<li class=\"page-item $activeClass\">
                    <a class=\"page-link\" href=\"?size=$size&page=$page\">$page</a>
                </li>";
    }

    //Következő oldal
    if($currentPage < $page) 
    {
        $nextPage = $currentPage + 1;
        $markup .= "<li class=\"page-item\">
                    <a class =\"page-link\" href=\"?size=$size&page=$nextPage\">Next </a>
                </li>";
    } else {
        $markup .= "<li class=\"page-item disabled\">
                <a class=\"page-link\" href=\"#\">Next </a>
                </li>";
    }

    return $markup;
}