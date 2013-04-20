{extends file="$app_path/layout.tpl"}
{block name=body}
            {if ! empty($validation_errors)}
            <div class="ui-widget" style="margin: 10px;">
                <div class="ui-state-error ui-corner-all">
                    <p>
                        <span style="float: left; margin-right: .3em;"
                                class="ui-icon ui-icon-alert">&nbsp;</span>
                        <strong>Error:</strong>
                    </p>
                    {$validation_errors}
                </div>
            </div>
            {/if}
            
            <div id="main" role="main">
                <div class="grid_16">
                    <h2 id="page-heading">{$page_heading}</h2>
                    <form action="{$app_url}/category/save" method="post">
                    <input type="hidden" name="id" value="{$category->get_id()}" />
                    <input type="hidden" id="enable" name="enabled" value="0" />
					<div class="box">
					    <fieldset>
                            <div class="sixteen_column section">
                                <div class="eight column">
                                    <label for="name" class="required">Name</label>
                                    <input type="text" id="name" name="name" class="required"
					                        value="{$category->get_name()}" autofocus="autofocus" />
                                </div>
                            </div>
                            <div class="sixteen_column section">
                                <div class="eight column">
                                    <label for="slug">Slug</label>
                                    <input type="text" id="slug" name="slug"
                                            value="{$category->get_slug()}" />
                                </div>
                            </div>
                        </fieldset>
                        <div class="six column">
                            <div class="column_content">
                                <input type="submit" class="ui-button" role="button" value="Save" />
                            </div>
                        </div>
                        <div class="six column">
                            <div class="column_content">
                                <input type="button" id="cancel" class="ui-button" role="button" value="Cancel" />
                            </div>
                        </div>
					</div>
					</form>
				</div>
			</div>

            <script type="text/javascript">
            <!--
            	$(document).ready(function() {
                    $("#cancel").click(function() {
                        window.location.href = "{$app_url}/category/";
                    });
                    
            		$("form").validate();
            		$("input:button, input:submit").button();
            		$("#status").buttonset();
            	});
            //-->
            </script>
{/block}