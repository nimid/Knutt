{include file="header.tpl"}
            
            <div id="wrap">
                <div id="main">
            	    <div id="content">
        	        {if ( ! empty($articles))}
                        {include file="article/content.tpl"}
        			{else}
                        <article id="page">
                            <header class="page-entry-header">
                                <h1 class="entry-title">{lang('nothing_found')}</h1>
                            </header>
                            <div class="single-entry-content">
                                <p>{lang('no_results_found')}</p>
                            </div>
                        </article>
                    {/if}
                    
                    {if ( ! empty($pagination))}
                        <p class="pagination">
                            <span>{lang('page')}:</span>
                            {$pagination}
                        </p>
                    {/if}
                    </div>

{include file="sidebar.tpl"}
{include file="footer.tpl"}