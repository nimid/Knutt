<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
    	<title>Knutt - Login</title>
    	<meta name="description" content="">
    	<meta name="author" content="">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    	<link rel="shortcut icon" href="{$img_strat_url}/favicon.ico">
    	<link rel="stylesheet" type="text/css" href="{$css_strat_url}/style.css?v=2">
        
    	<link rel="stylesheet" type="text/css" href="{$css_strat_url}/text.css" media="screen" />
    	<link rel="stylesheet" type="text/css" href="{$css_strat_url}/layout.css" media="screen" />
    	<link rel="stylesheet" type="text/css" href="{$css_strat_url}/grid.css" media="screen" />
        
    	<link rel="stylesheet" type="text/css" href="{$css_strat_url}/fluid.gs.css" media="screen" />
    	<!--[if lt IE 8 ]>
    	<link rel="stylesheet" type="text/css" href="{$css_strat_url}/fluid.gs.lt_ie8.css" media="screen" />
    	<![endif]-->
        
        <link rel="stylesheet" type="text/css" href="{$css_strat_url}/custom-theme/jquery.ui.all.css" />
        
    	<script type="text/javascript" src="{$js_url}/jquery.js"></script>
    	<script type="text/javascript" src="{$js_url}/jquery.ui.js"></script>
    	<script type="text/javascript" src="{$js_url}/jquery.validate.js"></script>
    </head>
    <body>
    	<div class="container_16">
    		<div id="main" role="main">
    		    
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
                
                <form action="{$base_url}admin/login" method="post">
                <div class="block">
                    <fieldset>
                        <div class="sixteen_column section">
                            <div class="sixteen column">
                                <label for="username" class="required">Username</label>
                                <input type="text" id="username" name="username"
                                        class="required"
                                        maxlength="8"
                                        value="{$admin->get_username()}" />
                            </div>
                        </div>
                        <div class="sixteen_column section">
                            <div class="sixteen column">
                                <label for="password" class="required">Password</label>
                                <input type="password" id="password" name="password"
                                        class="required"
                                        maxlength="8" />
                            </div>
                        </div>
                        <div class="column">
                            <input type="submit" class="ui-button"
                                role="button"
                                value="Login" />
                        </div>
                    </fieldset>
                </div>
                </form>
                <div class="clear"></div>
            </div>
            
    	</div>
    
        <script type="text/javascript">
        <!--
        $(document).ready(function() {
            $("form").validate();
            $("input:submit").button();
            $("#username").focus();
        });
        //-->
        </script>
    </body>
</html>