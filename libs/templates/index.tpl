<!--{include file="header.tpl"};-->
<main class="mainIndex">
                        <section>
                            <h1>{$tituloSeccion1|upper}</h1>
                            <article>
                                <h2 class="titulo">{$noticia1}</h2>
                                {html_image file="./images/cine.jpeg"}
                                <!--<img src="images/cine.jpeg" alt="cine_vacio" />-->
                                <p>{$texto_noticia1}</p>
                            </article>
                            <article>
                                <h2 class="titulo">{$noticia2}
                                </h2>
                                {html_image file="./images/contagio.jpg"}
                                <!--<img src="images/contagio.jpg" alt="escena_de_la_pelicula" />-->
                                <p>{$texto_noticia2_1}
                                    <a href={$url1}" class="enlace" target="_blank">{$main_link1}</a>.
                                    {$texto_noticia2_2}</p>
                            </article>
                            <article>
                                <h2 class="titulo">{$titulo_noticia3}</h2>
                                {html_image file="./images/mulan.jpg"}
                                <!--<img src="images/mulan.jpeg" alt="mulan_con_una_espada">-->
                                <p>{$texto_noticia3}</p>
                            </article>
                            <article>
                                <h2 class="titulo"> {$titulo_noticia4}</h2>
                                    {html_image file="./images/superheroes.jpg"}
                                <!--<img src="images/superheroes.jpg" alt="personajes_protagonistas">-->
                                <p>{$texto_noticia4_1}<a href={$url2}target="_blank">{$main_link2}</a>{$texto_noticia4_2}</p>
                            </article>
                        </section>
                    </main>
                    <aside class="asideIndex">
                        <h2>{$titulo_aside}</h2>
                        <ol>
                            <li><a href={$url3} target="_blank">{$aside_link1} </a></li>
                            <li><a href={$url4} target="_blank">{$aside_link2} </a></li>
                            <li><a href={$url5} target="_blank">{$aside_link3} </a></li>
                            <li><a href={$url6} target="_blank">{$aside_link4} </a></li>
                            <li><a href={$url7} target="_blank">{$aside_link5} </a></li>
                            <li><a href={$url8} target="_blank">{$aside_link6} </a></li>
                            <li><a href={$url9} target="_blank">{$aside_link7} </a></li>
                            <li><a href={$url10} target="_blank">{$aside_link8} </a></li>
                            <li><a href={$url11} target="_blank">{$aside_link9} </a></li>
                            <li><a href={$url12} target="_blank">{$aside_link10} </a></li>
                        </ol>
                    </aside>';
                    {include file="footer.tpl"}