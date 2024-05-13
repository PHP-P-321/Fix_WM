<?php

session_start(); // Начинаем сессию для работы с сессионными переменными

if(empty($_COOKIE['id_user'])) {
    $_SESSION['errLogin'] = "Авторизуйтесь!";
    header("Location: ./login.php");
}

require_once("../db/db.php"); // Подключаем файл с настройками базы данных

$id_client = $_COOKIE['id_user'];
$company_name = $_POST['company_name']; // Получаем Название компании из формы
$model_name = $_POST['model_name']; // Получаем Название модели из формы
$type_of_fault = $_POST['type_of_fault']; // Получаем Описание проблемы из формы

mysqli_query($connect, "INSERT INTO `requests`
                        (`id_client`, `company_name`, `model_name`, `type_of_fault`, `status`)
                        VALUES
                        ('$id_client', '$company_name', '$model_name', '$type_of_fault', 1)
");

header("Location: ../index.php");
