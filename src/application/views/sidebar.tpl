                </div>
                
                <div id="tertiary" class="widget-area" role="complementary">
                    <aside id="search" class="widget widget_search">
                        <form action="{$base_url}search/" method="post" class="searchform" role="search">
                            <div>
                                <label class="screen-reader-text" for="search"></label>
                                <input type="text" id="search" name="search" class="search-input"
                                        placeholder="{$ci->lang->line('search_at_placeholder_of_text')}"
                                        {if ( ! empty($search))}
                                        value="{$search|escape}"
                                        {/if}
                                        />
                                <input type="submit" class="searchsubmit" value="{$ci->lang->line('search_at_button')}" />
                            </div>
                        </form>
                	</aside>
                	
                    {if ( ! empty($categories))}
                	<aside id="categories" class="widget widget_categories">
                        <ul>
                            <li class="categories">
                                <h3 class="widget-title">{$ci->lang->line('categories')}</h3>
                                <ul>
                                    
                                	{foreach item=category from=$categories}
                                    <li class="cat-item cat-item-1">
                                        <a href="{$base_url}category/{$category->get_slug()}" title="{$ci->lang->line('view_all_posts_in')}&nbsp;{$category->get_name()}">
											{$category->get_name()}
										</a>
                                    </li>
                                    {/foreach}
                                    
                                </ul>
                            </li>
                        </ul>
                    </aside>
                    {/if}
                </div>