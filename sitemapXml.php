

<!--Copy this code to your website-->
<!--Copy this code to your website-->
<!--Copy this code to your website-->


add_action( 'publish_post', 'sitemapXml' );
add_action( 'publish_page', 'sitemapXml' );
function sitemapXml() {

    $postsForSitemap = get_posts(array(

        'numberposts' => -1,
        'orderby' => 'modified',
        'post_type'  => array( 'post', 'page' ),
        'order'    => 'DESC'
        ));

$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

foreach( $postsForSitemap as $post ) {

    setup_postdata( $post );
    $postdate = explode( " ", $post->post_modified );
    $sitemap .= '<url>'.
    '<loc>' . get_permalink( $post->ID ) . '</loc>' .
    '<lastmod>' . $postdate[0] . '</lastmod>' .
    '<changefreq>daily</changefreq>' .
    '</url>';
}

$sitemap .= '</urlset>';
$fp = fopen( ABSPATH . 'sitemap.xml', 'w' );
fwrite( $fp, $sitemap );
fclose( $fp );
}

 <!--Copy this code to your website-->
 <!--Copy this code to your website-->
 <!--Copy this code to your website-->
