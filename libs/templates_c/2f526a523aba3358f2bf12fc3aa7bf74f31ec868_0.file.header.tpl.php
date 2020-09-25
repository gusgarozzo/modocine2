<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-25 23:28:31
  from 'C:\xampp\htdocs\web2\tpeweb2\libs\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6e60ff44d1b6_19427029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f526a523aba3358f2bf12fc3aa7bf74f31ec868' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\tpeweb2\\libs\\templates\\header.tpl',
      1 => 1601066604,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6e60ff44d1b6_19427029 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
            <html lang="es">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>ModoCine</title>
                <link rel="stylesheet" href="css/styles.css?1.0">
                <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
                    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">   
                <?php echo '<script'; ?>
 src="js/menu.js"><?php echo '</script'; ?>
>
                <base href="' . BASE_URL . '">
            </head>
            
            <body>
                <div class="contenedor">
                    <header>
                        <p><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['titulo']->value, 'UTF-8');?>
</p>
                        <nav>
                            <i class="fas fa-bars" id="btn-abrir"></i>
                                <ul class="menu" id="menu">
                                    <li><a href="home"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['inicio']->value, 'UTF-8');?>
</a></li>
                                    <li><a href="estrenos"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['estrenos']->value, 'UTF-8');?>
</a></li>
                                    <li><a href="contacto"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['contacto']->value, 'UTF-8');?>
</a></li>
                                </ul>
                        </nav>
                    </header><?php }
}
