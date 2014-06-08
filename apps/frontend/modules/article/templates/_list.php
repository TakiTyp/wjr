<?php foreach ($wjr_articles as $wjr_article): ?>
  <div>
    <h3><a href="<?php echo url_for('article_show_user', $wjr_article) ?>"><?php echo $wjr_article->getTitle() ?></a></h3>
    <p class="small"><?php echo $wjr_article->getDateTimeObject('created_at')->format('d/m/Y') ?>&nbsp;Kategoria:&nbsp;<?php echo $wjr_article['c_name'] ?></p>
    <?php if($wjr_article->getLogo()): ?>
      <a href="<?php echo url_for('article/show?id='.$wjr_article->getId()) ?>"><img class="mini_pic" src="/uploads/articles/<?php echo $wjr_article->getLogo() ?>" /></a>
    <?php endif; ?>
    <?php echo $wjr_article->getShortDesc() ?>
    <div class="clear"></div>
    <br />
    <br />
  </div>
<?php endforeach; ?>