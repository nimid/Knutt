<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <title>{$page_title} - Knutt</title>
        <meta name="description" content="">
        <meta name="author" content="">
        
        <link rel="shortcut icon" href="{$img_strat_url}/favicon.ico">
        <link rel="stylesheet" type="text/css" href="{$css_strat_url}/style.css?v=2">
        
        <!-- fluid 960 -->
        <link rel="stylesheet" type="text/css" href="{$css_strat_url}/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="{$css_strat_url}/layout.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="{$css_strat_url}/grid.css" media="screen" />
        <!-- superfish menu -->
        <link rel="stylesheet" type="text/css" href="{$css_strat_url}/superfish.css" media="screen" />
        <!-- dataTable css -->
        <link rel="stylesheet" type="text/css" href="{$css_strat_url}/demo_table_jui.css">
    
        <!-- fluid GS -->
        <link rel="stylesheet" type="text/css" href="{$css_strat_url}/fluid.gs.css" media="screen" />
        <!--[if lt IE 8 ]>
        <link rel="stylesheet" type="text/css" href="{$css_strat_url}/fluid.gs.lt_ie8.css" media="screen" />
        <![endif]-->
    
        <!-- //jqueryUI css -->
        <link rel="stylesheet" type="text/css" href="{$css_strat_url}/custom-theme/jquery.ui.all.css" />
        
        <!-- //jquery -->
        <script type="text/javascript" src="{$js_url}/jquery.js"></script>
        <script type="text/javascript" src="{$js_url}/jquery.validate.js"></script>
        
        <!-- //jqueryUI -->
        <script type="text/javascript" src="{$js_url}/jquery.ui.js"></script>
        <script type="text/javascript" src="{$js_strat_url}/jquery-fluid16.js"></script>
        <script type="text/javascript" src="{$js_strat_url}/plugins.js"></script>
        <script type="text/javascript" src="{$js_strat_url}/script.js"></script>
        
        <!-- superfish menu and needed js for menu -->
        <script type="text/javascript" src="{$js_strat_url}/superfish.js"></script>
        <script type="text/javascript" src="{$js_strat_url}/supersubs.js"></script>
        <script type="text/javascript" src="{$js_strat_url}/hoverIntent.js"></script>
    
        <!-- dataTable -->
        <script type="text/javascript" src="{$js_strat_url}/jquery.dataTables.min.js"></script>
    </head>
    <body>
        <div class="container_16">
            <header>
                <div class="grid_16">
                    <ul id="navigationTop" class="sf-menu sf-js-enabled sf-shadow">
                        <li>
                            <a href="{$app_url}/article/">Article</a>
                        </li>
                        <li>
                            <a href="{$app_url}/category/">Category</a>
                        </li>
                        <li>
                            <a href="{$app_url}/admin/form/">Change Password</a>
                        </li>
                        <li>
                            <a href="{$base_url}" target="_blank">View Site</a>
                        </li>
                        <li style="float: right; margin: 0 1px 0 0;">
                            <a href="{$base_url}admin/logout">Logoff</a>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </header>
{block name=body}{/block}
        </div>
    </body>
</html>