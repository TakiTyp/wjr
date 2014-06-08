<?php slot('title', sprintf('wartajuraroweru.pl')) ?>

<?php use_stylesheet('articles.css') ?>
<?php use_stylesheet('details.css') ?>

  <div>
    <h2><?php echo $wjr_info->getTitle() ?></h2>
    <hr/>
    <p><?php echo $wjr_info->getRaw('description') ?></p>
    <div class="clear"></div>
  </div>
