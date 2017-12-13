<div class="entry-content single-page">

<?php the_content(); ?>




<div class="row">
<div class="col medium-1/4 large-3"><div class="col-inner">
<h3>Rendimento:</h3>
<div class="is-divider divider clearfix"></div><!-- .divider -->
<p>
<?php echo types_render_field( "porcoes"); ?>
</p>
</div></div>


<div class="col medium-1/4 large-3"><div class="col-inner">
<h3>Preparação</h3>
<div class="is-divider divider clearfix"></div><!-- .divider -->
<p><?php echo types_render_field( "tempo-preparacao"); ?>
</p>
</div></div>


<div class="col medium-1/4 large-3"><div class="col-inner">
<h3>Cozimento</h3>
<div class="is-divider divider clearfix"></div><!-- .divider -->
<p>
<?php echo types_render_field( "tempo-cozimento"); ?>
<br>
</p></div></div>

<div class="col medium-1/4 large-3"><div class="col-inner">
<h3>Tempo Total</h3>
<div class="is-divider divider clearfix"></div><!-- .divider -->
<p>
<?php echo types_render_field( "tempo-total"); ?>
<br>
</p></div>

</div>

</div>

<div class="wpurp-rows-row">
<p></p>
</div>


<div>
<h3>Ingredientes</h3>
<div class="is-divider divider clearfix"></div><!-- .divider -->
<p><span class="wpurp-box"><span class="wpurp-recipe-ingredient-name">
<?php echo types_render_field( "ingredientes"); ?><br>
</span></span>
</p>
</div>





<?php
	wp_link_pages( array(
		'before' => '<div class="page-links">' . __( 'Pages:', 'flatsome' ),
		'after'  => '</div>',
	) );
?>

<?php if(flatsome_option('blog_share')) {
	// SHARE ICONS
	echo '<div class="blog-share text-center">';
	echo '<div class="is-divider medium"></div>';
	echo do_shortcode('[share]');
	echo '</div>';
} ?>
</div><!-- .entry-content2 -->

<footer class="text-<?php echo flatsome_option('blog_posts_title_align');?>">
<!-- <a href="/nossos-planos/" class="button secondary is-secondary is-medium">
    <span></span>
</a> -->


<?php echo do_shortcode('[title style="center" text="Escolha um de Nossos Planos e Faça essa Receita" ]');
?>


<?php echo do_shortcode('[ux_products style="bounce" type="row" columns="3" products="3" image_width="76" text_padding="0px 0px 0px 0px"]
');
?>



<?php
if ( ! is_admin() ) {
     echo "
<a href='#receita' target='_self' class='button primary' style='display:none;'>
    <span>Ver Passo a Passo desta Receita</span>
</a>

     ";
} else {
     echo " :(  ";
}
?>



<!-- RECEITA PRINT -->
<style type="text/css">
#receita .col-inner ol {
    margin-left: 0;
    padding-right: 0;
    list-style-type: none;
}

#receita .col-inner ol li {
    counter-increment: step-counter;
	margin-bottom: 1.5em;    
}

#receita .col-inner ol li::before {
    content: counter(step-counter);
    margin-right: 5px;
    font-size: 80%;
    background-color: <?php echo types_render_field("cor"); ?>;
    color: white;
    font-weight: bold;
    padding: 3px 8px;
    border-radius: 11px;;
}

@media print {
  body * {
    visibility: hidden;
  }
  #receita,
  #receita * {
    visibility: visible;
    width: 100%;
  }
  #receita {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: yellow;
  }

    .mfp-container {
        padding: 0;
    }

}

</style>
<div id="receita" class="lightbox-by-id lightbox-content mfp-hide lightbox-white printable" style="font-size: .9em; max-width:80%; border-top: 15px solid <?php echo types_render_field( "cor"); ?>">

<img src="http://veganeasy.com.br/wp-content/uploads/2017/07/logo-receita.png" style="position: absolute; margin: auto; width: 200px; top: -15px; left: 40%; right: 40%;">

<div style="background-image: url('<?php the_post_thumbnail_url(); ?>'); width: 100%; height: 400px; background-size: cover; background-position-y: -200px;">
</div>

<div class="row" style="padding: 20px 40px;">

	<h1 style=" color: #f49d56; border-top: 2px solid #f49d56; border-bottom: 2px solid #f49d56; text-align: center ; padding: 5px;"><?php single_post_title(); ?> </h1>
	<div  style="width: 20% !important; float: left;"><div class="col-inner"> 
		<div   style="background-color:<?php echo types_render_field('cor'); ?>; width: 110px; height: 110px; border-radius: 100px; text-align: center ; margin: auto; margin-top: 15px;" >
		<img src="http://veganeasy.com.br/wp-content/uploads/2017/07/logo-tag-receita.png" style="padding: 20px" />
		</div>
	</div></div>
	<div style="width: 80% !important; float: left;"><div class="col-inner"> <br/><?php the_content(); ?> </div></div>

</div>


<div class="row" style=" border: dashed 1px #ccc; margin: 20px 10px; padding: 20px 10px;">
<div class="medium-1/4 large-4"><div class="col-inner"> 
<img src="http://veganeasy.com.br/wp-content/uploads/2017/07/title-tempo-receita.png" width="60%" />
<br/>
<strong>Preparação: </strong> <?php echo types_render_field( "tempo-preparacao"); ?><br>
<strong>Cozimento: </strong> <?php echo types_render_field( "tempo-cozimento"); ?><br>
<strong> Total: </strong> <?php echo types_render_field( "tempo-total"); ?><br>
<br>
<img src="http://veganeasy.com.br/wp-content/uploads/2017/07/title-ingrediente-receita.png" width="60%" />
<?php echo types_render_field( "ingredientes"); ?>
<strong>Da Despensa:</strong><br/><?php echo types_render_field( "da-despensa"); ?><br><br>
<strong>Você vai precisar:</strong><br/><?php echo types_render_field( "voce-vai-precisar-de"); ?><br>
</div></div>


<div class="medium-3/4 large-8"><div class="col-inner"> <?php echo types_render_field( "passo-a-passo"); ?> </div></div>


</div>

<div style="background-color:<?php echo types_render_field('cor'); ?>; width: 100%; padding: 20px; color: white; text-align: center;">
	Compartilhe seu prato nas redes sociais usando o <strong>#MeuVeganEasy<br/>www.veganeasy.com.br</strong>
</div>

<center><button type="button" class="btn btn-primary" onclick="window.print();">Imprimir</button></center>

</div>


<!--<?php
//	/* translators: used between list items, there is a space after the comma */
//	$category_list = get_the_category_list( __( ', ', 'flatsome' ) );

//	/* translators: used between list items, there is a space after the comma */
//	$tag_list = get_the_tag_list( '', __( ', ', 'flatsome' ) );
//

//	// But this blog has loads of categories so we should probably display them here
//	if ( '' != $tag_list ) {
//		$meta_text = __( 'This entry was posted in %1$s and tagged %2$s.', 'flatsome' );
//	} else {
//		$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'flatsome' );
//	}
	//
//	printf(
//		$meta_text,
//		$category_list,
//		$tag_list,
//		get_permalink(),
//		the_title_attribute( 'echo=0' )
//	);
//
?>-->
<br/><br/>
<p>&nbsp;</p>
</footer>
<!-- .entry-meta -->


