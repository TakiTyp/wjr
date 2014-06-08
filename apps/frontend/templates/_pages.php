<?php use_stylesheet('pages.css') ?>

<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for($module) ?>?page=1">
      <img src="/images/first.png" alt="Pierwsza strona" title="Pierwsza strona" />
    </a>
 
    <a href="<?php echo url_for($module) ?>?page=<?php echo $pager->getPreviousPage() ?>">
      <img src="/images/previous.png" alt="Poprzednia strona" title="Poprzednia strona" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for($module) ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for($module) ?>?page=<?php echo $pager->getNextPage() ?>">
      <img src="/images/next.png" alt="Następna strona" title="Następna strona" />
    </a>
 
    <a href="<?php echo url_for($module) ?>?page=<?php echo $pager->getLastPage() ?>">
      <img src="/images/last.png" alt="Ostatnia strona" title="Ostatnia strona" />
    </a>
  </div>
<?php endif; ?>
 
<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong>&nbsp;<?php echo $desc ?>
  
  <?php if ($pager->haveToPaginate()): ?>
    - strona <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>