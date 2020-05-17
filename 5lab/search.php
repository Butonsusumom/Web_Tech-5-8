<?php

include "const.php";

function LoadData($id) {
    $mysql = @new mysqli(HOST, USER, PASS, DB);
    if ($mysql->connect_errno) exit('Ошибка соединения с БД'); //проверка
    $mysql->set_charset('utf8'); //установка кодироввки


    $SQL = "SELECT `var` FROM structure WHERE id = $id";
    $request= $mysql->query($SQL);
    $data = mysqli_fetch_assoc($request);

    return $data['var'];



}

$template = file_get_contents("search.tpt");

$template = preg_replace("/({DB=\")([a-zA-z.0-9_]*)(\"})/u",
    "<?=LoadData($2)?>", $template);

file_put_contents("temp", $template);
include "temp";
unlink("temp");