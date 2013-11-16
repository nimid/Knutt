{extends file="$app_path/layout.tpl"}
{block name=body}
            <div id="main" role="main">
                <div class="grid_16">
                    <h2 id="page-heading">Article</h2>
                    <div class="box">
                        <a href="{$app_url}/article/form"
                                class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only floatLeft"
                                role="button">
                            <span class="ui-button-text">Create Article</span>
                        </a>
                        <div class="clear"></div>
                    </div>
                </div>
                
                <div class="grid_16">
                    <div class="box">
                        <div id="list" class="block">
                            <table id="article_list" class="display">
                                <thead>
                                    <tr>
                                        <th>Headline</th>
                                        <th>Body</th>
                                        <th>Category</th>
                                        <th>Page View</th>
                                        <th>Created Date</th>
                                        <th>Updated Date</th>
                                        <th>Enabled</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    {foreach item=article from=$articles}
                                    <tr>
                                        <td>{$article->get_headline()|truncate:40}</td>
                                        <td>{$article->get_body()|strip_tags|truncate:30}</td>
                                        <td>{$article->get_category_name()|article_category_name|truncate:30}</td>
                                        <td>{$article->get_views()}</td>
                                        <td>{$article->get_created()|date_format:"%d %b %Y %H:%M"}</td>
                                        <td>{$article->get_modified()|date_format:"%d %b %Y %H:%M"}</td>
                                        <td>{$article->get_enabled()|value_enabled}</td>
                                        <td>
                                            <a href="{$app_url}/article/form/{$article->get_id()}"
                                                    style="margin: 0 10px 0 0;">
                                                Edit
                                            </a>
                                            <a href="{$app_url}/article/delete/{$article->get_id()}"
                                                    class="delete">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    {/foreach}
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <script type="text/javascript">
            <!--
            $(document).ready(function() {
                $("#article_list").dataTable({
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers"
                });
                
                $(".delete").click(function(event) {
                    if (confirm("Click OK if you want to continue deleting this data") == false) {
                        event.preventDefault();
                    }
                });
            });
            //-->
            </script>
{/block}