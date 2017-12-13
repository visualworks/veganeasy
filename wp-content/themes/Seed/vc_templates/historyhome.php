<?php
$option = $title = $titlepost = $description = $img_link_large = $text_bt = $images  = $bg_history = $url = '';
extract(shortcode_atts(array(
    'title' => 'history//',
    'titlepost' => '',
    'description' => '',
    'url' => '',
    'text_bt' =>'read more',
    'images' => '',
    'option'=>''

), $atts));
$img = shortcode_atts(array(
            'images' => 'images',
            'bg_history' => 'bg_history',
        ), $atts);
  $img1 = wp_get_attachment_image_src($img["images"], "full");
  $bg_img = $img1[0];

  $img2 = wp_get_attachment_image_src($img["bg_history"], "full");
  $bg_img1 = $img2[0];


if($option=='style 2'){
$div ='<article id="organic-history" class="style2" >
      <div class="row">
          <div class="history-left">
            <div class="title-history">'.$title.'</div>
            <div class="title-article">'.$atts['titlepost'].'</div>
            <div class="description-article">'.$description.'</div>
            <div class="content-article">'.$content.'</div>
            <a href="'.$url.'"><button class="read-more-article">'.$text_bt.'</button> </a>
          </div>  
      </div>
    </article>';
    print $div;
  }
if($option=='style 3'){
  $div ='<article id="organic-history" class="style3">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="history-left">
            <div class="title-history">'.$title.'</div>
            <div class="title-article">'.$atts['titlepost'].'</div>
            <div class="description-article">'.$description.'</div>
            <div class="content-article">'.$content.'</div>
            <a href="'.$url.'"><button class="read-more-article">'.$text_bt.'</button> </a>
          </div>  
        </div>
      </div>
    </article>';
    print $div;
}
if($option=='style 1'){
  $div ='<article id="organic-history" class="style1">
      <div class="container">
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
          <div class="history-left">
            <div class="title-history">'.$title.'</div>
            <div class="title-article">'.$atts['titlepost'].'</div>
            <div class="description-article">'.$description.'</div>
            <div class="content-article">'.$content.'
            </div>
            <a href="'.$url.'"><button class="read-more-article">'.$text_bt.'</button> </a>
          </div>  
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
          <div class="right">
            <div class="history-right">
              <div class="img-history">
                <img src="'.$bg_img.'"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </article>';
    print $div;
}
?>