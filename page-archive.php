<?php
/**
* Template Page of Archive
*
* @package custom
*/
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<section class="section">
    <div class="container">
	<?php
    $stat = Typecho_Widget::widget('Widget_Stat');
    $this->widget('Widget_Contents_Post_Recent', 'pageSize='.$stat->publishedPostsNum)->to($archives);
    $year=0; $mon=0; $i=0; $j=0;
    $output = '';
    while($archives->next()){
        $year_tmp = date('Y',$archives->created);
        $mon_tmp = date('m',$archives->created);
        $y=$year; $m=$mon;
        if ($year > $year_tmp || $mon > $mon_tmp) {
            $output .= '</div></div>';
        }
        if ($year != $year_tmp || $mon != $mon_tmp) {
			 $year = $year_tmp;
			 $mon = $mon_tmp;
             $output .= '
        <div class="archive content">
            <h4 class="title is-4" id="<%= year %>">'.date('M Y',$archives->created).'</h4>
            <div class="articles">';
        }
        $output .= '
                <div class="article content>">
                    <time class="is-text-small" datetime="'.date(DATE_ATOM,$archives->created).'" itemprop="datePublished">
                        '.date('F j',$archives->created).'</time>
                    <h6 class="title is-6"><a href="'.$archives->permalink .'">'. $archives->title .'</a></h6>
                </div>
        ';
    }
    $output .= '</div></div>';
    echo $output;
    ?>
    </div>
</section>

<?php $this->need('footer.php'); ?>