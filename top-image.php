
<?php
//comment for test of github
$page_id = get_queried_object_id();

global $NHP_Options;
$options = $NHP_Options->options;

$topImage = get_post_meta($page_id, 'top_image', true);
$showTopImage = get_post_meta($page_id, 'show_top_image', true);

if ( empty($topImage) ) {

    $topImage = $options['top-image'];

}
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

?>

<?php if ($showTopImage !== "0") : ?>

<div style="height:240px;" id="top-image" class="top-image3">
    <div class="container">
        <div style="margin: 150px 0 0 0; font-weight:lighter" id="top-image-caption">
            <h2 style="font-weight: lighter">

                <?php
                
                if ( is_category() ) {
                    echo single_cat_title('', FALSE);
                }
                elseif ( is_tag() ) {
                    echo thematic_tag_query();
                }
                elseif ( is_author() ) {
                    echo 'Projects by '.$curauth->nickname;
                }
                elseif ( is_404() ) {
                    echo __('Error 404', THEME_TEXT_DOMAIN);
                }
                elseif ( is_search() ) {
                    echo __('Search for', THEME_TEXT_DOMAIN) . ' "' . get_search_query() . '"';
                }
                elseif ( is_year() ) {
                    echo get_the_time('Y');
                }
                elseif ( is_month() ) {
                    echo get_the_time('F') . ' ' . get_the_time('Y');
                }
                elseif ( is_day() ) {
                    echo get_the_time('F') . ' ' . get_the_time('Y') . ' ' . get_the_time('d');
                }
                elseif ( is_archive() ) {
                    $post_type_object = get_post_type_object('project');
                    echo $post_type_object->labels->name;
                }
                else {
                    echo get_the_title($page_id);
                }


                ?>

            </h2>
        </div>
    </div>
</div>

<?php endif; ?>