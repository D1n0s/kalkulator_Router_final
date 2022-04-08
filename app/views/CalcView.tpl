{extends file="main.tpl"}

{block name = header}<p>KALKUALTOR </p> 

{/block}

{block name=footer}Kalkulator obliczania rat
{/block}

{block name=content}

<a href="{$conf->action_url}logout" style="background-color:gray;width:5%;color:black;"  class="pure-menu-heading pure-menu-link">wyloguj</a>
<h3>Kalkulator obliczania rat kredytu ! Witaj, {$user->login} !  </h3>

	
<form class="pure-form pure-form-stacked" action="{$conf->action_url}datas" method="post">
	<fieldset>
		<label for="kw">Kwota kredytu</label>
		<input id="kw" type="number" min="1000" max="100000" placeholder="1-100000" name="kw" value="{$form->x}">
	<br>
		<label style="color: white;" for="rt">podaj ilość rat</label>
		<input type="range" min="3" max="36" step="3" name="rt" value="{$form->y}" oninput="this.nextElementSibling.value = this.value" >
		<output  style="color: white;">{$form->y}</output>
	<br><br>
		<label for="op">oprocentowanie</label>
		<input placeholder="1-15%" id="op" type="number" min="1.0" max="15.0" name="op" value="{$form->op}">
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>


	{include file='messages.tpl'}

	{if isset($res->result)}
<div class="messages inf">
		Miesięczna rata wynosi: {$res->result}<br>
		Prowizja to: {$res->prowizja}<br>
		Kwota do spłaty: {$res->kwotaend}<br> 
</div>
{/if}



{/block}