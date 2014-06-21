<?php slot('title', sprintf('wartajuraroweru.pl')) ?>

<?php use_stylesheet('articles.css') ?>
<?php use_stylesheet('details.css') ?>

  <div>
    <h2><?php echo $wjr_info->getTitle() ?></h2>
    <hr/>
    <p><?php echo $wjr_info->getRaw('description') ?></p>
    <div class="clear"></div>
	<?php if ($wjr_info->getId() == 1): ?>
		<h2>Nocne Ujezdzanie V - dobry bobrze nie pomoze</h2>
		<hr>
		<a class="cboxElement" href="/uploads/plakat_nocne_ujezdzanie_meridy_V.jpg">
			<img style="width:100%;" alt="Nocne Ujezdzanie Meridy V" title="Nocne Ujezdzanie Meridy V" src="uploads/plakat_nocne_ujezdzanie_meridy_V.jpg">
		</a>
		<p>Poprzednie edycje</p>
		<div id="POSTER_GALLERY">
			<img class="poster" alt="Nocne Ujezdzanie Meridy I" title="Nocne Ujezdzanie Meridy I" src="uploads/plakat_nocne_ujezdzanie_meridy.jpg">
			<img class="poster" alt="Nocne Ujezdzanie Meridy II" title="Nocne Ujezdzanie Meridy II" src="uploads/plakat_nocne_ujezdzanie_meridy_II.jpg">
			<img class="poster" alt="Nocne Ujezdzanie Meridy III" title="Nocne Ujezdzanie Meridy III" src="uploads/plakat_nocne_ujezdzanie_meridy_III.jpg">
			<img class="poster" alt="Nocne Ujezdzanie Meridy IV" title="Nocne Ujezdzanie Meridy IV" src="uploads/plakat_nocne_ujezdzanie_meridy_IV.jpg">
		</div>
		<!--<a href="<?php echo url_for('@ujezdzanie') ?>">Wiecej juz wkrotce...</a>-->
	<?php endif; ?>
	<?php if ($wjr_info->getId() == 5): ?>
		<?php include_partial('gallery', array('gallery' => $gallery)) ?>
	<?php endif; ?>
  </div>
