<?php
/* Smarty version 3.1.30, created on 2022-04-08 15:31:18
  from "C:\xampp\htdocs\php_04_uproszczony\app\views\templates\messages.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_62503926b6a9f4_83503660',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3110899798a650b93ad88be4912554642aa8a55' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04_uproszczony\\app\\views\\templates\\messages.tpl',
      1 => 1649424523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62503926b6a9f4_83503660 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
<div class="messages err">
	<ol>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
	<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ol>
</div>
<?php }
}
}
