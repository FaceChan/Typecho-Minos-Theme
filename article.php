<article class="article content gallery" itemscope itemprop="blogPost">
    <h1 class="article-title is-size-3 is-size-4-mobile" itemprop="name">
        <?php if ($this->is('post')): ?>
            <?php $this->title() ?>
        <?php else: ?>
            <a href="<?php $this->permalink() ?>" itemprop="url"><?php $this->title() ?></a>
        <?php endif; ?>
    </h1>
    <div class="article-meta columns is-variable is-1 is-multiline is-mobile is-size-7-mobile">
        <span class="column is-narrow">
            <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
        </span>
        <span class="column is-narrow article-category">
            <i class="far fa-folder"></i>
            <?php $this->category('<span> &raquo; </span>'); ?>
        </span>
        <span class="column is-narrow">
            <?php readTime($this);?>
        </span>
    </div>
    <div class="article-entry is-size-6-mobile" itemprop="articleBody">
    <?php if ($this->is('index') || $this->is('category')): ?>
        <?php fixContent($this, 'Read More');?>
    <?php else: ?>
        <?php $this->content(); ?>
    <?php endif; ?>
    </div>
    <?php if ($this->is('post')): ?>
    <div class="columns is-variable is-1 is-multiline is-mobile">
        <?php getTags($this->tags);?>
    </div>
    <div class="columns is-mobile is-multiline article-nav">
        <span class="column is-12-mobile is-half-desktop <%= !post.prev ? 'is-hidden-mobile' : '' %> article-nav-prev">
            <?php $this->thePrev('%s','没有了'); ?>
        </span>
        <span class="column is-12-mobile is-half-desktop <%= !post.next ? 'is-hidden-mobile' : '' %> article-nav-next">
            <?php $this->theNext('%s','没有了'); ?>
        </span>
    </div>
    <?php endif; ?>
</article>

<?php if ($this->is('post') || $this->is('page')): ?>
<div class="sharebox">
    <?php $this->need('share.php');?>
</div>

<?php $this->need('comments.php');?>
<?php endif; ?>