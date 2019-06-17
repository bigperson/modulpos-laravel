<?php

return [
    /*
     * Логин от связки, полученный посли ассоциации Модуль.Кассы
     */
    'login' => env('MODULPOS_LOGIN', ''),

    /*
     * Пароль от связки, полученный посли ассоциации Модуль.Кассы
     */
    'password' => env('MODULPOS_PASSWORD', ''),

    /*
     * Тестовый режим
     */
    'test_mode' => env('MODULPOS_TEST_MODE', true),
];
