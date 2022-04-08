<?php
//Skrypt uruchamiający akcję wykonania obliczeń kalkulatora
// - należy zwrócić uwagę jak znacząco jego rola uległa zmianie
//   po wstawieniu funkcjonalności do klasy kontrolera

require_once 'init.php';

getRouter()->setDefaultRoute('calcShow'); // akcja/ścieżka domyślna
getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

getRouter()->addRoute('calcShow',    'CalcCtrl',  ['user','admin']);
getRouter()->addRoute('datas', 'CalcCtrl',  ['user','admin']);
getRouter()->addRoute('login',       'LoginCtrl');
getRouter()->addRoute('logout',      'LoginCtrl', ['user','admin']);

getRouter()->go(); //wybiera i uruchamia odpowiednią ścieżkę na podstawie parametru 'action';




