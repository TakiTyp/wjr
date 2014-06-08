<table class="pigs">
  <?php foreach ($wjr_pigs as $i => $wjr_pig): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td class="picture">
	    <?php if($wjr_pig->getPicture()){ ?>
	      <a href="<?php echo url_for('pig/show?id='.$wjr_pig->getId()) ?>"><img class="mini_pic" src="/uploads/pigs/<?php echo $wjr_pig->getPicture() ?>" /></a>
	    <?php } else { ?>
	      <a href="<?php echo url_for('pig/show?id='.$wjr_pig->getId()) ?>"><img class="mini_pic" src="/images/_pig_default.png" /></a>
	    <?php } ?>
      </td>
      <td class="coordinates">
        <a href="<?php echo url_for('pig/show?id='.$wjr_pig->getId()) ?>"><?php echo "Lat.: ".$wjr_pig->getLatitude() ?>&nbsp;<?php echo "| Lon.: ".$wjr_pig->getLongitude() ?></a>
      </td>
      <td class="info">
      	<?php echo $wjr_pig->getNick() ?>
        <p class="small"><?php echo $wjr_pig->getDateTimeObject('created_at')->format('d/m/Y') ?></p>
      </td>
    </tr>
  <?php endforeach; ?>
</table>