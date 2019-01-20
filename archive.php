<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<section class="section section-heading">
    <div class="container">
        <div class="content">
            <h5><i class="far fa-folder"></i><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></h5>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
	<?php while($this->next()): ?>
	<?php $this->need('article.php');?>
	<?php endwhile; ?>
	<?php $this->need('paginator.php');?>
    </div>
</section>

<?php $this->need('footer.php'); ?>
