<?php use_stylesheet('articles.css') ?>

<?php slot('title', sprintf('wartajuraroweru.pl - Artykuły')) ?>

<h2>Info...</h2>
<hr/>
<?php include_partial('article/list', array('wjr_articles' => $pager->getResults())) ?>
<hr/>
<?php include_partial('global/pages', array('pager' => $pager, 'module' => 'article', 'desc' => 'artukuły/ów')) ?>
<hr/>
