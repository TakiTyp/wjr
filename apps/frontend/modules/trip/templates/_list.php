<?php foreach ($wjr_trips as $wjr_trip): ?>
  <div>
    <h3><a href="<?php echo url_for('trip_show_user', $wjr_trip) ?>"><?php echo $wjr_trip->getTitle() ?></a></h3>
    <p class="small"><?php echo $wjr_trip->getDateTimeObject('created_at')->format('d/m/Y') ?></p>
    <?php if($wjr_trip->getLogo()): ?>
      <a href="<?php echo url_for('trip/show?id='.$wjr_trip->getId()) ?>"><img class="mini_pic" src="/uploads/trips/<?php echo $wjr_trip->getLogo() ?>" /></a>
    <?php endif; ?>
    <?php echo $wjr_trip->getShortDesc() ?>
    <div class="clear"></div>
    <br />
    <br />
  </div>
<?php endforeach; ?>