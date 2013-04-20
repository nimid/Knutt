{extends file="$app_path/layout.tpl"}
{block name=body}
            <div id="main" role="main">
                <div class="grid_16">
                    <h2 id="page-heading">Category</h2>
                    <div class="box">
                        <a href="{$app_url}/category/form"
                                class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only floatLeft"
                                role="button">
                            <span class="ui-button-text">Create Category</span>
                        </a>
	    				<div class="clear"></div>
            		</div>
            	</div>
            	<div class="grid_16">
					<div class="box">
						<div id="list" class="block">
						    <table id="category_list" class="display">
						        <thead>
						            <tr>
						                <th>Name</th>
						                <th>Slug</th>
						                <th>Created Date</th>
						                <th>&nbsp;</th>
						            </tr>
						        </thead>
						        <tbody>
						            {foreach item=category from=$categories}
						            <tr>
						                <td>{$category->get_name()}</td>
						                <td>{$category->get_slug()}</td>
						                <td>{$category->get_created()}</td>
						                <td style="text-align: center;">
						                	<a href="{$app_url}/category/form/{$category->get_id()}"
						                			style="margin: 0 10px 0 0;">
                                                Edit
					                		</a>
                                            <a href="{$app_url}/category/delete/{$category->get_id()}"
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
                $("#category_list").dataTable({
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