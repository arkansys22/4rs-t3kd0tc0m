<div class="ashade-content">
  <section class="ashade-section">
    <div class="ashade-row">
      <div class="ashade-col col-12">
        <p class="ashade-intro">Through the lens the world looks different and our would like to show you this difference. You can see it in our albums that are presented here.</p>
      </div>
    </div>
  </section>
  <section class="ashade-section">
    <div class="ashade-row">
      <div class="ashade-col col-12">
        <div class="ashade-albums-grid ashade-grid ashade-grid-2cols is-masonry">
          <?php  foreach ($posts as $post_new){
                       ?>

          <div class="ashade-album-item ashade-grid-item">
            <div class="ashade-album-item__image">
              <img <?php
                  if(empty($post_new->products_gambar)) {
                    echo "<img src='".base_url()."bahan/layout_foto_promo.png'>";
                  }else {
                    echo " <img src='".base_url()."bahan/foto_products/".$post_new->products_gambar."'> ";}
                  ?>
            </div>
            <h5>
              <span><?php echo $post_new->products_cat_judul?></span>
              <?php echo $post_new->products_judul?>
            </h5>
            <a href="<?php echo base_url("works/$post_new->products_judul_seo ") ?>" class="ashade-album-item__link"></a>
          </div><!-- .ashade-album-item -->
        <?php  } ?>

        </div><!-- .ashade-albums-grid -->
      </div>
    </div><!-- .ashade-row -->
  </section>
</div><!-- .ashade-content -->
