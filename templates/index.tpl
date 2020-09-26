{include file="header.tpl"};
        <main class="mainIndex">
            <section>
                <h1>{$titulo_seccion|upper}</h1>
                <article>
                    <h2 class="titulo">{$titulo_noticia1}</h2>
                    {$imagen_noticia1}
                    <p>{$texto_noticia1}</p>
                </article>
                <article>
                    <h2 class="titulo">{$titulo_noticia2}</h2>
                    {$imagen_noticia2}
                    <p>{$texto_noticia2}
                </article>
                <article>
                    <h2 class="titulo">{$titulo_noticia3}</h2>
                    {$imagen_noticia3}
                    
                    <p>{$texto_noticia3}</p>
                </article>
                <article>
                    <h2 class="titulo">{$titulo_noticia4}</h2>
                        {$imagen_noticia4}
                    <p>{$texto_noticia4} </p>
                </article>
            </section>
        </main>
        <aside class="asideIndex">
            <h2>{$titulo_aside}</h2>
            <ol>
                <li>{$item1}</li>
                <li>{$item2}
                </li>
                <li>{$item3}</li>
                <li>{$item4}
                </li>
                <li>{$item5}</li>
                <li>{$item6}</li>
                <li>{$item7}</li>
                <li>{$item8}</li>
                <li>{$item9}</li>
                <li>{$item10}</li>
            </ol>
        </aside>
{include file="footer.tpl"};