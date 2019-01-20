<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<nav class="navbar is-transparent is-fixed-top navbar-main" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item navbar-logo" href="<?php $this->options->siteUrl(); ?>">
                <?php if($this->options->logoUrl): ?>
                <img src="<?php $this->options->logoUrl(); ?>" alt="<?php $this->options->title() ?>,<?php $this->options->description() ?>" height="28">
                <?php else: ?>
                <img src="<?php $this->options->themeUrl('source/images/logo.png'); ?>" alt="<?php $this->options->title() ?>,<?php $this->options->description() ?>" height="28">
                <?php endif;?>
            </a>
            <div class="navbar-burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="navbar-menu navbar-start">
            <a class="navbar-item<?php if($this->is('index')): ?> is-active<?php endif; ?>" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
            <a class="navbar-item<?php if($this->is('page', $pages->slug)): ?> is-active<?php endif; ?>" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
            <?php endwhile; ?>
        </div>
        <div class="navbar-menu navbar-end">
            <a class="navbar-item search" title="搜索" href="<?php $this->options->siteUrl(); ?>search.html">
                <i class="fas fa-search"></i>
            </a>
            <a class="navbar-item" title="github" href="//github.com/FaceChan">
                <i class="fab fa-github"></i>
            </a>
        </div>
    </div>
</nav>