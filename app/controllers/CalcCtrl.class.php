<?php
// KONTROLER strony kalkulatora
namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;



class CalcCtrl {


	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku

	public function __construct(){
		//stworzenie potrzebnych obiektów

		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
//pobranie parametrów
public function getParams(){

	$this->form->x = getFromRequest('kw');
	$this->form->y = getFromRequest('rt');
	$this->form->op = getFromRequest('op');

}


function validate(){

	//sprawdzenie, czy parametry zostały przekazane - jeśli nie to zakończ walidację
	if ( ! (isset($this->form->x) && isset($this->form->y) && isset($this->form->op) ))	return false;	
	

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $this->form->x == "") getMessages()->addError('Nie podano liczby 1 ');
	if ( $this->form->y == "") getMessages()->addError('Nie podano liczby 2 ');
	if ( $this->form->op == "") getMessages()->addError('Nie podano liczby 3 ');

	//nie ma sensu walidować dalej gdy brak parametrów
	if (! getMessages()->isError() ) {
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->x )) {
				getMessages()->addError('Pierwsza wartość nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->y )) {
				getMessages()->addError('Druga wartość nie jest liczbą całkowitą');
			}
			if (! is_numeric ( $this->form->op )) {
				getMessages()->addError('Trzeco=ia wartość nie jest liczbą całkowitą');
			}
	}
	
	return ! getMessages()->isError();
}
	
// wykonaj obliczenia
public function action_datas(){

	$this->getparams();
	
	if ($this->validate()) {
	
				//konwersja parametrów na int
			$this->form->x = intval($this->form->x);
			$this->form->y = intval($this->form->y);
			$this->form->op = intval($this->form->op);
			getMessages()->addInfo('Parametry poprawne.');


	$proc = $this->form->op;
	$kwota = $this->form->x; 
    $raty = $this->form->y;
	//wykonanie operacji
	$procend = $proc / 100;
	$this->result->prowizja = $kwota * $procend;
	$this->result->kwotaend = $kwota +  	$this->result->prowizja;
  $result = $this->result->kwotaend/ $raty;
$this->result->result= round($result,2);

getMessages()->addInfo('Wykonano obliczenia.');
}
$this->generateView();
}

public function action_calcShow(){
	getMessages()->addInfo('Witaj w kalkulatorze');
	$this->generateView();}


	public function generateView(){

	getSmarty()->assign('user',unserialize($_SESSION['user']));
	
	getSmarty()->assign('page_title','Uś bank');
	getSmarty()->assign('page_description','WEŹ kredyt już teraz na waruneczek i studiuj dalej ! :D ');
	getSmarty()->assign('page_header','Kalkulator kredytowy');
			

	getSmarty()->assign('form',$this->form);
	getSmarty()->assign('res',$this->result);
	
	getSmarty()->display('CalcView.tpl'); 

  	}
}