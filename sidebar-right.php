
<?php if ( is_active_sidebar( 'sidebar-right' ) ) { ?>
<div id="sidebar-right" class="col-xs-12 col-sm-12 <?php simple_boostrap_sidebar_right_classes(); ?>" role="complementary">
    <div class="vertical-nav block">
    <?php dynamic_sidebar( 'sidebar-right' ); ?>
    </div>
</div>
<?php } ?>