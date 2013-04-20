            	        
            	        <article class="post type-post status-publish format-standard hentry category-uncategorized">
                            <header class="single-entry-header">
                                <h1 class="entry-title">
                                    {$article->get_headline()}
                                </h1>
                                <p>
                                    <span class="entry-date">{$article->get_created()|article_created_date}</span>
            	                </p>
                            </header>
            	            
                	        <div class="single-entry-content">
                                {$article->get_body()}
                                <div class="clear"></div>
                        		<footer class="single-entry-meta">
                    		    	<p>
                                        {if $article->get_category_name() neq ""}
                    		    	    {$ci->lang->line('categories')}:
                                        <a href="{$base_url}category/{$article->get_category_slug()}"
                                                title="View all posts in {$article->get_category_name()|article_category_name}">
                                            {$article->get_category_name()|article_category_name}</a>
                                        |
                                        {/if}
            		    	            
            		    	            {if $article->get_tag() neq ""}
                		    	        {$ci->lang->line('tags')}:
                    		    	        {$article->get_tag()}
            		    	            |
            		    	            {/if}
            		    	            
                                        <a href="{$base_url}article/{$article->get_slug()}"
                                               title="Permalink to {$article->get_headline()}" rel="bookmark">
                                           {$ci->lang->line('permalink')}
                                        </a>
                    			    </p>
                	            </footer>
                	        </div>
                        </article>
                        <div class="clear"></div>