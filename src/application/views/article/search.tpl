{include file="header.tpl"}

            <div id="wrap">
                <div id="main">
                    <div id="content">
                        
                        {if ( ! empty($articles))}
                        <header class="page-header">
                            <h1 class="page-title">{$count_search_result} Search Results for: <span>{$search}</span></h1>
                        </header>
                        {include file="article/content.tpl"}
                        {else}
                        <article id="post-0" class="post no-results not-found">
                            <header class="page-header">
                                <h1 class="page-title">Nothing Found</h1>
                            </header>
                            <div class="single-entry-content">
                                <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
                            </div>
                        </article>
                        {/if}
                        
                        {$pagination}
                        
                    </div>
                    
{include file="sidebar.tpl"}
{include file="footer.tpl"}