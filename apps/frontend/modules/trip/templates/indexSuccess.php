<?php use_stylesheet('articles.css') ?>

<?php slot('title', sprintf('wartajuraroweru.pl - Wypady')) ?>

<h2>Wypady</h2>
<hr/>
<?php include_partial('trip/list', array('wjr_trips' => $pager->getResults())) ?>
<hr/>
<?php include_partial('global/pages', array('pager' => $pager, 'module' => 'trip', 'desc' => 'trip/y')) ?>
<hr/>
