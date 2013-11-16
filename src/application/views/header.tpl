<!DOCTYPE html>
<html {$ci->config->item('language_attributes')}>
    <head>
        <meta charset="{$ci->config->item('site_charset')}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>{$page_title}</title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" type="text/css" media="screen" href="{$css_url}/style.css" />
        <link rel="shortcut icon" type="image/ico" href="{$img_url}/favicon.ico" />
    </head>
    <body>
        <div id="page" class="clearfix">
    	    <header id="branding">
    		    <hgroup id="site-title">
    			    <h1><a href="{$base_url}" rel="home">{lang('site_name')}</a></h1>
                    <h2 id="site-description">{lang('site_description')}</h2>
    		    </hgroup>
                <div class="clear"></div>
                <nav id="subnav">&nbsp;</nav>
            </header>