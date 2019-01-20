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
                <div class="article content>">
                    <?php Links_Plugin::output('<h6 class="title is-6"><a href="{url}" target="_blank">{name}</a></h6>', 30);?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->need('footer.php'); ?>