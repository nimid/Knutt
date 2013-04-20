{include file="header.tpl"}
            
            <div id="wrap">
                <div id="main">
            	    <div id="content">
            	        
        	        {if ( ! empty($articles))}
                        {include file="article/content.tpl"}
        			{else}
                        <article id="page">
                            <header class="page-entry-header">
                                <h1 class="entry-title">Nothing Found</h1>
                            </header>
                            <div class="single-entry-content">
                                <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
                            </div>
                        </article>
                    {/if}
                    
                    {$pagination}
                                        
                    </div>

{include file="sidebar.tpl"}
{include file="footer.tpl"}