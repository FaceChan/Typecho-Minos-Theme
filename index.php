<?php
/**
 * 移植于Hexo博客
 * 原作者:PPoffice https://github.com/ppoffice/hexo-theme-minos
 * @package Typecho Minos Theme 
 * @author CcChen
 * @version 0.1
 * @link https://ezo.biz
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<section class="section">
    <div class="container">
	<?php while($this->next()): ?>
	<?php $this->need('article.php');?>
	<?php endwhile; ?>
	<?php $this->need('paginator.php');?>
    </div>
</section>
<?php $this->need('footer.php'); ?>