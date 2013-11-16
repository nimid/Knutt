            </div>
            <footer id="colophon" class="clearfix">
                <p>
                    &copy; 2013 {lang('site_admin')}<br />
                    {lang('contact_me_at')}
                    {mailto address="{$ci->config->item('site_email')}"
                        text="{$ci->config->item('site_email_text')}"
                        encode="javascript"}
                </p>
                <p>
                    {lang('theme')}: <a href="http://yoko.elmastudio.de/" title="Yoko | A WordPress theme">Yoko</a>
                    {lang('by')} <a href="http://www.elmastudio.de/wordpress-themes/" title="WordPress Themes | Elmastudio">Elmastudio</a>
                </p>
            	<a href="#page" class="top">{lang('back_to_top')}</a>
            </footer>
        </div>
        
        <script type="text/javascript" src="{$js_url}/jquery.js"></script>
        <script type="text/javascript" src="{$js_url}/smoothscroll.js?ver=1.0"></script>
        <script type="text/javascript">
            <!--
            $(document).ready(function() {
                $("#searchform").submit(function() {
                    if ($.trim($("#search-input").val()) == "") {
                        return false;
                    }
                });
            });
            //-->
        </script>
    </body>
</html>