<?php header('Content-type: application/xml; charset="ISO-8859-1"',true);  ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
     <loc><?php echo base_url();?></loc>
     <priority>1.0</priority>
  </url>
  <url>
     <loc><?php echo base_url()."contact/"?></loc>
     <priority>0.5</priority>
  </url>
  <url>
     <loc><?php echo base_url()."product/"?></loc>
     <priority>0.5</priority>
  </url>
  <?php foreach($products as $data) { ?>
  <url>
     <loc><?php echo base_url()."product/".$data->products_judul_seo;?></loc>
     <priority>0.5</priority>
  </url>
  <?php } ?>
  <url>
     <loc><?php echo base_url()."blogs/"?></loc>
     <priority>0.5</priority>
  </url>
  <?php foreach($blogs as $data) { ?>
  <url>
     <loc><?php echo base_url()."blogs/".$data->blogs_judul_seo;?></loc>
     <priority>0.5</priority>
  </url>
  <?php } ?>
</urlset>
