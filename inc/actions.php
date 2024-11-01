<?php
$action = isset($_REQUEST['tr_action'])? $_REQUEST['tr_action'] : '';
$function_action = 'trsc_action_'.$action;
if(function_exists($function_action))
{
    call_user_func($function_action);
}


function trsc_action_list_shortcodes()
{
    global $shortcode_tags;

    echo '<ul>';
    foreach($shortcode_tags as $sc => $fn)
    {
        echo '<li>['.$sc.'] &nbsp;&nbsp; call function: '.$fn.'</li>';
    }
    echo '</ul>';
    exit;
}

function trsc_action_find_shortcode()
{
    $shortcode = $_POST['shortcode'];
    $shortcode = str_replace(array('[',']'),'',$shortcode);
    $shortcode = trim($shortcode);
    $shortcode = '['.$shortcode;
    
    global $wpdb;
    
    $posts = $wpdb->get_results("select * from {$wpdb->posts} 
                            where post_status='publish' and post_content like '%{$shortcode}%'
                            order by post_type
                            ");
    if(count($posts)==0)
    {
        echo '<div class="welcome-panel">No Result</div>';
        exit;
    }
    
    ?>
    <table class="wp-list-table widefat fixed pages">
        <thead>
            <tr>
                <th id="cb" class="manage-column column-cb check-column">#</th>
                <th>Name</th>
                <th>Post Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    <?php
    foreach($posts as $i => $post)
    {
        ?>
        <tr>
            <td>
                <?php echo $i + 1?>. 
            </td>
            <td>
                <a href="post.php?post=<?php echo $post->ID ?>&action=edit"><?php echo $post->post_title ?></a>
            </td>
            <td><?php echo $post->post_type ?></td>
            <td>
                <a href="post.php?post=<?php echo $post->ID ?>&action=edit">Edit</a> - 
                <a target="_blank" href="<?php  echo get_permalink($post)?>">View</a>
            </td>
        </tr>
        <?php
    }
    echo '</tbody></table>';
    exit;
}