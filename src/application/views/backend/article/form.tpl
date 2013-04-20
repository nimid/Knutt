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
                    <form action="{$app_url}/article/save" method="post">
                    <input type="hidden" name="id" value="{$article->get_id()}" />
					<div class="box">
					    <fieldset>
                            <div class="sixteen_column section">
                                <div class="eight column">
                                    <label for="headline" class="required">Headline</label>
                                    <input type="text" id="headline" name="headline" class="required"
					                        value="{$article->get_headline()}" autofocus="autofocus" />
                                </div>
                            </div>
                            
                            <div class="sixteen_column section">
                                <div class="eight column">
                                    <label for="body" class="required">Body</label>
                        			<textarea id="body" name="body" class="required"
					                        rows="10" cols="100">{$article->get_body()}</textarea>
                                </div>
                            </div>
                            
                            <div class="sixteen_column section">
                                <div class="eight column">
                    				<label for="category">Category</label>
                                	<select id="category" name="category">
                        				{html_category_options selected=$article->get_category()}
                                	</select>
                                </div>
                            </div>
                            
                            <div class="sixteen_column section">
                                <div class="eight column">
                                    <label for="tag">
                                        Tags&nbsp;<span style="font-style: italic;">Separate tags with commas</span>
                                    </label>
                                    <input type="text" id="tag" name="tag" maxlength="255"
					                        value="{$article->get_tag()}" />
                                </div>
                            </div>
                            
                            <div class="sixteen_column section">
                                <div class="eight column">
                                    <label for="slug">Slug</label>
                                    <input type="text" id="slug" name="slug"
                                            value="{$article->get_slug()}" />
                                </div>
                            </div>
                            
                            <div class="sixteen_column section">
                                <div class="eight column">
                                    <span>Status</span>
                                    <div id="status">
                                        <input type="radio" id="enable" name="enabled"
            		            				value="1" {$article->is_enabled()}>
    				                    <label for="enable">Enable</label>
    				                    
                        				<input type="radio" id="disable" name="enabled"
                        						value="0" {$article->is_disabled()}>
                        				<label for="disable">Disable</label>
				                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="six column">
                            <div class="column_content">
                                <input type="submit" class="ui-button" role="button"
                                        value="Save" />
                            </div>
                        </div>
                        <div class="six column">
                            <div class="column_content">
                                <input type="button" id="cancel" class="ui-button" role="button"
                                        value="Cancel" />
                            </div>
                        </div>
					</div>
					</form>
				</div>
			</div>

            <script src="{$js_url}/ckeditor/ckeditor.js"></script>
            
            <script type="text/javascript">
            <!--
                $(document).ready(function() {
                    CKEDITOR.replace("body");
                    
                    $("#cancel").click(function() {
                        window.location.href = "{$app_url}/article/";
                    });
                    
                    $("form").validate();
                    $("input:button, input:submit").button();
                    $("#status").buttonset();
                });
            //-->
            </script>
{/block}