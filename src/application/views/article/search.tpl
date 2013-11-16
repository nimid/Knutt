{include file="header.tpl"}

            <div id="wrap">
                <div id="main">
                    <div id="content">
                    {if ( ! empty($articles))}
                        <header class="page-header">
                            <h1 class="page-title">
                                {lang('search_results_found')} {$count_search_result} {lang('search_results_for')}
                                <span>{$search}</span>
                            </h1>
                        </header>
                        {include file="article/content.tpl"}
                    {else}
                        <article id="post-0" class="post no-results not-found">
                            <header class="page-header">
                                <h1 class="page-title">{lang('nothing_found')}</h1>
                            </header>
                            <div class="single-entry-content">
                                <p>{lang('nothing_matched_search_criteria')}</p>
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