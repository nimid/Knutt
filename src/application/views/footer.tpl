            </div>
            <footer id="colophon" class="clearfix">
                <p>
                    &copy; 2013 {$ci->lang->line('site_admin')}<br />
                    {$ci->lang->line('contact_me_at')} {mailto address="{$ci->config->item('site_email')}" text="{$ci->config->item('site_email_text')}" subject="Contact" encode="javascript"}
                </p>
                <p>
                    {$ci->lang->line('theme')}: <a href="http://yoko.elmastudio.de/" title="Yoko | A WordPress theme">Yoko</a>
                    {$ci->lang->line('by')} <a href="http://www.elmastudio.de/wordpress-themes/" title="WordPress Themes | Elmastudio">Elmastudio</a>
                </p>
            	<a href="#page" class="top">{$ci->lang->line('back_to_top')}</a>
            </footer>
        </div>
        
        <script type="text/javascript" src="{$js_url}/jquery.js"></script>
        <script type="text/javascript" src="{$js_url}/smoothscroll.js?ver=1.0"></script>
        
    </body>
</html>