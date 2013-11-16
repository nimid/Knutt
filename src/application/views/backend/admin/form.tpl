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
            
            {if ! empty($notification)}
            <div class="ui-widget" style="margin: 10px;">
                <div class="ui-state-highlight ui-corner-all">
                    <p>
                        <span style="float: left; margin-right: .3em;"
                                class="ui-icon ui-icon-info">&nbsp;</span>
                        <strong>{$notification}</strong>
                    </p>
                </div>
            </div>
            {/if}
            
            <div id="main" role="main">
                <div class="grid_16">
                    <h2 id="page-heading">{$page_heading}</h2>
                    {form_open("$app_url/admin/save")}
                    <div class="box">
                        <fieldset>
                            <div class="sixteen_column section">
                                <div class="eight column">
                                    <label for="old_password" class="required">Old Password</label>
                                    <input type="password" id="old_password" name="old_password" class="required"
                                            maxlength="8" autofocus="autofocus" />
                                </div>
                            </div>
                            
                            <div class="sixteen_column section">
                                <div class="eight column">
                                    <label for="new_password" class="required">New Password</label>
                                    <input type="password" id="new_password" name="new_password" class="required"
                                            maxlength="8" />
                                </div>
                            </div>
                            
                            <div class="sixteen_column section">
                                <div class="eight column">
                                    <label for="confirm_new_password" class="required">Confirm New Password</label>
                                    <input type="password" id="confirm_new_password" name="confirm_new_password" class="required"
                                            maxlength="8" />
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
                    {form_close()}
                </div>
            </div>

            <script type="text/javascript">
            <!--
                $(document).ready(function() {
                    $("#cancel").click(function() {
                        window.location.href = "{$app_url}/article/";
                    });
                    
                    $("form").validate({
                        rules: {
                            confirm_new_password: {
                                equalTo: "#new_password"
                            }
                        }
                    });
                    $("input:button, input:submit").button();
                });
            //-->
            </script>
{/block}