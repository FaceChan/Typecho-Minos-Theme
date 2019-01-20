<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
<div class="pagination-previous<?php if($this->_currentPage <= 1):?> is-invisible is-hidden-mobile<?php endif;?>">
        <a href="<?php echo getPaginLink($this,$this->_currentPage-1);?>">Prev</a>
    </div>
    <div class="pagination-next<?php if($this->_currentPage >= $this->getTotal()):?> is-invisible is-hidden-mobile<?php endif;?>">
        <a href="<?php echo getPaginLink($this,$this->_currentPage+1);?>">Next</a>
    </div>
    <ul class="pagination-list is-hidden-mobile">
        <?php paginator($this); ?>
    </ul>
</nav>