<?php slot('title', sprintf('wartajuraroweru.pl - %s', $wjr_article->getTitle())) ?>

<?php use_stylesheet('articles.css') ?>
<?php use_stylesheet('details.css') ?>

<?php use_stylesheet('lightbox/lightbox.css') ?>
<?php use_javascript('lightbox/jquery-1.7.2.min.js') ?>
<?php use_javascript('lightbox/lightbox.js') ?>

  <div>
    <h3><?php echo $wjr_article->getTitle() ?></h3>
    <?php if($wjr_article->getLogo()): ?>
      <a href="/uploads/articles/<?php echo $wjr_article->getLogo() ?>" rel="lightbox">
        <img class="details_mini_img" src="/uploads/articles/<?php echo $wjr_article->getLogo() ?>" />
      </a>
    <?php endif; ?>
    <div><?php echo $wjr_article->getRaw('description') ?></div>
    <div class="clear"></div>
    <p class="small">Opublikowano:&nbsp;<?php echo $wjr_article->getDateTimeObject('created_at')->format('d/m/Y') ?>&nbsp;Kategoria:&nbsp;<?php echo $wjr_article['c_name'] ?></p>
  </div>
<a href="<?php echo url_for('article/index') ?>"><div class="back">Powrót</div></a>
