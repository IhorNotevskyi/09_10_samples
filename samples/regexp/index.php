<?php

$text = 'Php AcademyВас пригласил(а)  для мероприятия:
РНР Advanced - Группа 26.09_FSTK_Вт-Ср-Пт(19:00-21:00)_
Где
http://phpacademy.clickmeeting.com/3808/c859bb9f8786503
69e93db005a959439/G9A3F7
Когда
РНР Advanced
Вторник, 27 Февраль 2018, 19:00 Europe/Kiev [GMT 2]
показать время в моем часовом поясе ▸
Токен
G9A3F7
Ответить';

//preg_match_all('/рнр/ui', $text, $matches);
//$text = preg_replace('/(рнр)/ui', '[$1]=[PHP]', $text);
preg_match_all('/^(рнр|php)\s([a-zA-Z]*)/uim', $text, $matches);
var_dump($matches);
