<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html class="has-navbar-fixed-top fontawesome-i2svg-active fontawesome-i2svg-complete">
<meta charset="<?php $this->options->charset(); ?>">
<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
<?php $this->header(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/outdated-browser/1.1.5/outdatedbrowser.min.css">
<?php if($this->options->favicon): ?>
<link rel="shortcut icon" href="<?php $this->options->favicon(); ?>"><?php endif;?>
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Ovo|Source+Code+Pro">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.8/css/lightgallery.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/justifiedGallery/3.6.5/css/justifiedGallery.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-light.min.css">
<link rel="stylesheet" href="<?php $this->options->themeUrl('source/css/style.css'); ?>">
<script defer src="//use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php if ($this->options->useHighline == 'able'): ?>
<!-- highligt start -->
<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
<!--<nocompress>-->
<script type="text/javascript">
$(document).ready(function() {
  $('pre code').each(function(i, block) {
    hljs.highlightBlock(block);
  });
});
</script>
<!-- highligt end -->
<?php endif;?>
<?php if($this->options->GoogleAds): ?>
<?php $this->options->GoogleAds(); ?>
<?php endif; ?>
<!--</nocompress>-->
<?php if ($this->is('post') || $this->is('page')): ?>
<link rel="stylesheet" href="<?php $this->options->themeUrl('source/css/comment.css'); ?>">
<?php endif; ?>
</head>
<body>
<?php $this->need('navbar.php'); ?>
