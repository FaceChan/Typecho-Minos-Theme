<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer class="footer">
    <div class="container">
        <div class="columns content">
            <div class="column is-narrow has-text-centered">
                &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.&nbsp;
                Powered by <a href="http://www.typecho.org" target="_blank">Typecho</a> & <a
                        href="https://github.com/FaceChan/Typecho-Minos-Theme" target="_blank">Minos</a>
            </div>
            <div class="column is-hidden-mobile"></div>

            <div class="column is-narrow">
                <div class="columns is-mobile is-multiline is-centered">
                <a class="column is-narrow has-text-black" title="<?php $this->options->title() ?>" href="<?php $this->options->siteUrl(); ?>">
                <?php if($this->options->footerLogoUrl): ?>
                <img src="<?php $this->options->footerLogoUrl(); ?>" alt="<?php $this->options->title() ?>" height="30" />
                <?php endif;?>
                </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>    
<!-- test if the browser is outdated -->
<div id="outdated">
    <h6>Your browser is out-of-date!</h6>
    <p>Update your browser to view this website correctly. <a id="btnUpdateBrowser" href="http://outdatedbrowser.com/">Update my browser now </a></p>
    <p class="last"><a href="#" id="btnCloseUpdateBrowser" title="Close">&times;</a></p>
</div>
<!--<nocompress>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/outdated-browser/1.1.5/outdatedbrowser.min.js"></script>
<script>
    $(document).ready(function () {
        // plugin function, place inside DOM ready function
        outdatedBrowser({
            bgColor: '#f25648',
            color: '#ffffff',
            lowerThan: 'flex'
        })
    });
</script>

<script>
    window.FontAwesomeConfig = {
        searchPseudoElements: true
    }
    moment.locale("zh-CN");
</script>
<script src="<?php $this->options->themeUrl('source/js/script.js'); ?>"></script>

<?php $this->footer(); ?>

<?php if($this->options->GoogleAnalytics): ?>
<?php $this->options->GoogleAnalytics(); ?>
<?php endif; ?>
<!--</nocompress>-->
</body>
</html>
<?php if ($this->options->htmlCompress == 'able'): $html_source = ob_get_contents(); ob_clean(); print compressHtml($html_source); ob_end_flush(); endif; ?>