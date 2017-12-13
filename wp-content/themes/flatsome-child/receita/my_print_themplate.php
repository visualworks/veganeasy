<?php
    define('WP_USE_THEMES', false);
    echo "<h1>printer friendly version:</h1>\n";
    query_posts('p='.$_GET['pid']);
    if (have_posts()){
        while ( have_posts() ) { the_post();
            the_content();
        }
    }else{
    echo 'nothing found';
    }
?>

<?php
    define('WP_USE_THEMES', false);
    //echo "<h1>printer friendly version:</h1>\n";
    setup_postdata($_GET['pid']); 
    while ( have_posts() ) : the_post();
            the_content();

    endwhile;
?>