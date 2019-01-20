<?php
/**
* Template Page of Links
*
* @package custom
*/
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<section class="section">
    <div class="container">
<section class="section">
    <div class="container">
        <div class="archive content">
            <h4 class="title is-4">友情链接</h4>
            <div class="articles">
                <?php Links_Plugin::output('<div class="article content>"><span class="is-text-small">{sort}</span><h6 class="title is-6"><a href="{url}" target="_blank">{name}</a></h6></div>', 30);?>
            </div>
        </div>
    </div>
</section>

<?php $this->need('footer.php'); ?>