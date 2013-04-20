{include file="header.tpl"}
            
            <div id="wrap">
                <div id="main">
                    <div id="content">
                        <header class="page-header">
                            <h1 class="page-title">Category Archives: <span>{$category->get_name()}</span></h1>
                        </header>
                        {if ( ! empty($articles))}
                        {include file="article/content.tpl"}
                        {/if}
                    </div>

{include file="sidebar.tpl"}
{include file="footer.tpl"}