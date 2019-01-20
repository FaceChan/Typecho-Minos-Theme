<?php
/**
* Template Page of Search
*
* @package custom
*/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<section class="section">
    <div class="container">
        <div class="searchbox ins-search show">
            <form id="search" class="search-form" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                <div class="searchbox-input-wrapper">
                    <input type="text" id="input" class="searchbox-input ins-search-input   " name="s" required="true" placeholder="在此输入关键字" maxlength="30" autocomplete="off"> 
            </div>
            </form>
            <hr />
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&ignoreZeroCount=1&desc=1&limit=50')->to($tags); ?>
            <div class="columns is-variable is-1 is-multiline is-mobile">
            <?php parseContent($this); ?>
            <?php if($tags->have()): ?>
                <?php while ($tags->next()): ?>
                <span class="column is-narrow"><a class="tag is-light article-tag" href="<?php $tags->permalink(); ?>"># <?php $tags->name(); ?>(<?php $tags->count(); ?>)</a></span>
                <?php endwhile; ?>
            <?php else: ?>
                <p> Nothing here ! </p>
            <?php endif; ?>
            <div class="search-tags-hr <?php if ($this->options->colorBgPosts == 'defaultColor'): ?> bg-deepgrey<?php elseif ($this->options->colorBgPosts == 'customColor'): ?> bg-<?php echo randBgColor(); ?><?php endif; ?>"></div>
            </div>
        </div>
    </div>
</section>


<?php $this->need('footer.php'); ?>