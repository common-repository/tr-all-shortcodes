<?php
add_action('admin_menu','trlistsc_admin_menu');
function trlistsc_admin_menu()
{
    add_options_page('All Shortcodes','All Shortcodes','manage_options','trlist_shortcodes','trlist_shortcodes_page');
}

function trlist_shortcodes_page()
{
    $pages = array(
        'all' => 'All Shortcodes',
        'find'=> 'Find Shortcode',
        'fix' => 'Fix Shortcode',
        'help' => 'Help'
    );
    $current = $_GET['act']? $_GET['act'] : 'all';
    ?>
    <div class="wrap">
        <div class="icon32" id="icon-themes"><br></div>
        <h2 class="nav-tab-wrapper">
            <?php foreach($pages as $act => $text): ?>
		      <a class="nav-tab <?php if($act==$current)echo 'nav-tab-active'?>" href="?page=trlist_shortcodes&act=<?php echo $act?>"><?php echo $text?></a>
          <?php endforeach;?>
        </h2>
        <div class="wrap_content_tab">
            <?php include(TRASC_PATH.'pages/admin_'.$current.'.php'); ?>
        </div>
    </div>
    <?php
}