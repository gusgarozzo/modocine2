<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-26 00:48:13
  from 'C:\xampp\htdocs\web2\tpeweb2\libs\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6e73addd1f03_06090173',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'adc48e8628b0a17b50d18627c615f64e7d4f4d40' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\tpeweb2\\libs\\templates\\index.tpl',
      1 => 1601074030,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f6e73addd1f03_06090173 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\web2\\tpeweb2\\libs\\smarty\\plugins\\function.html_image.php','function'=>'smarty_function_html_image',),));
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;
<main class="mainIndex">
                        <section>
                            <h1><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['tituloSeccion1']->value, 'UTF-8');?>
</h1>
                            <article>
                                <h2 class="titulo"><?php echo $_smarty_tpl->tpl_vars['noticia1']->value;?>
</h2>
                                <?php echo smarty_function_html_image(array('file'=>"./images/cine.jpeg"),$_smarty_tpl);?>

                                <!--<img src="images/cine.jpeg" alt="cine_vacio" />-->
                                <p><?php echo $_smarty_tpl->tpl_vars['texto_noticia1']->value;?>
</p>
                            </article>
                            <article>
                                <h2 class="titulo"><?php echo $_smarty_tpl->tpl_vars['noticia2']->value;?>

                                </h2>
                                <?php echo smarty_function_html_image(array('file'=>"./images/contagio.jpg"),$_smarty_tpl);?>

                                <!--<img src="images/contagio.jpg" alt="escena_de_la_pelicula" />-->
                                <p><?php echo $_smarty_tpl->tpl_vars['texto_noticia2_1']->value;?>

                                    <a href=<?php echo $_smarty_tpl->tpl_vars['url1']->value;?>
" class="enlace" target="_blank"><?php echo $_smarty_tpl->tpl_vars['main_link1']->value;?>
</a>.
                                    <?php echo $_smarty_tpl->tpl_vars['texto_noticia2_2']->value;?>
</p>
                            </article>
                            <article>
                                <h2 class="titulo"><?php echo $_smarty_tpl->tpl_vars['titulo_noticia3']->value;?>
</h2>
                                <?php echo smarty_function_html_image(array('file'=>"./images/mulan.jpg"),$_smarty_tpl);?>

                                <!--<img src="images/mulan.jpeg" alt="mulan_con_una_espada">-->
                                <p><?php echo $_smarty_tpl->tpl_vars['texto_noticia3']->value;?>
</p>
                            </article>
                            <article>
                                <h2 class="titulo"> <?php echo $_smarty_tpl->tpl_vars['titulo_noticia4']->value;?>
</h2>
                                    <?php echo smarty_function_html_image(array('file'=>"./images/superheroes.jpg"),$_smarty_tpl);?>

                                <!--<img src="images/superheroes.jpg" alt="personajes_protagonistas">-->
                                <p><?php echo $_smarty_tpl->tpl_vars['texto_noticia4_1']->value;?>
<a href=<?php echo $_smarty_tpl->tpl_vars['url2']->value;?>
target="_blank"><?php echo $_smarty_tpl->tpl_vars['main_link2']->value;?>
</a><?php echo $_smarty_tpl->tpl_vars['texto_noticia4_2']->value;?>
</p>
                            </article>
                        </section>
                    </main>
                    <aside class="asideIndex">
                        <h2><?php echo $_smarty_tpl->tpl_vars['titulo_aside']->value;?>
</h2>
                        <ol>
                            <li><a href=<?php echo $_smarty_tpl->tpl_vars['url3']->value;?>
 target="_blank"><?php echo $_smarty_tpl->tpl_vars['aside_link1']->value;?>
 </a></li>
                            <li><a href=<?php echo $_smarty_tpl->tpl_vars['url4']->value;?>
 target="_blank"><?php echo $_smarty_tpl->tpl_vars['aside_link2']->value;?>
 </a></li>
                            <li><a href=<?php echo $_smarty_tpl->tpl_vars['url5']->value;?>
 target="_blank"><?php echo $_smarty_tpl->tpl_vars['aside_link3']->value;?>
 </a></li>
                            <li><a href=<?php echo $_smarty_tpl->tpl_vars['url6']->value;?>
 target="_blank"><?php echo $_smarty_tpl->tpl_vars['aside_link4']->value;?>
 </a></li>
                            <li><a href=<?php echo $_smarty_tpl->tpl_vars['url7']->value;?>
 target="_blank"><?php echo $_smarty_tpl->tpl_vars['aside_link5']->value;?>
 </a></li>
                            <li><a href=<?php echo $_smarty_tpl->tpl_vars['url8']->value;?>
 target="_blank"><?php echo $_smarty_tpl->tpl_vars['aside_link6']->value;?>
 </a></li>
                            <li><a href=<?php echo $_smarty_tpl->tpl_vars['url9']->value;?>
 target="_blank"><?php echo $_smarty_tpl->tpl_vars['aside_link7']->value;?>
 </a></li>
                            <li><a href=<?php echo $_smarty_tpl->tpl_vars['url10']->value;?>
 target="_blank"><?php echo $_smarty_tpl->tpl_vars['aside_link8']->value;?>
 </a></li>
                            <li><a href=<?php echo $_smarty_tpl->tpl_vars['url11']->value;?>
 target="_blank"><?php echo $_smarty_tpl->tpl_vars['aside_link9']->value;?>
 </a></li>
                            <li><a href=<?php echo $_smarty_tpl->tpl_vars['url12']->value;?>
 target="_blank"><?php echo $_smarty_tpl->tpl_vars['aside_link10']->value;?>
 </a></li>
                        </ol>
                    </aside>';
                    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
