{foreach item=article from=$articles}
                        <article class="post type-post status-publish format-standard hentry category-uncategorized">
                            <div class="entry-details">
            				    <p>
            				        {$article->get_created()|article_created_date}<br/>
            	                </p>
            	            </div>
                            
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="{$base_url}article/{$article->get_slug()}"
                                            title="Permalink to {$article->get_headline()}" rel="bookmark">
                                        {$article->get_headline()}
                                    </a>
                                </h2>
                            </header>
            	            
                	        <div class="entry-content">
                                {$article->get_body()|truncate:500}
                                <a class="more-link" href="{$base_url}article/{$article->get_slug()}">{$ci->lang->line('continue_reading')} &rarr;</a>
                        		<footer class="entry-meta">
                                    <p>
                                        {if $article->get_category_name() neq ""}
                                        {$ci->lang->line('categories')}:
                                        <a href="{$base_url}category/{$article->get_category_slug()}"
                                                title="{$ci->lang->line('view_all_posts_in')}&nbsp;{$article->get_category_name()|article_category_name}">
                                            {$article->get_category_name()|article_category_name}</a>
            		    	            |
            		    	            {/if}
            		    	            
            		    	            {if $article->get_tag() neq ""}
                		    	        {$ci->lang->line('tags')}:
                    		    	        {$article->get_tag()}
            		    	            |
            		    	            {/if}
            		    	            
                                        <a href="{$base_url}article/{$article->get_slug()}"
                                               title="Permalink to {$article->get_headline()}">
                                           {$ci->lang->line('permalink')}
                                        </a>
                    			    </p>
                	            </footer>
                	        </div>
                        </article>
{/foreach}