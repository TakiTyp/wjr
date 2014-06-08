<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Wjr Admin Interface</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <?php if ($sf_user->isAuthenticated()): ?>
      <div id="menu">
        <ul>
          <li><?php echo link_to('Info', 'wjr_info') ?></li>
          <li><?php echo link_to('Artykuły', 'wjr_article') ?></li>
          <li><?php echo link_to('Chlew', 'wjr_pig') ?></li>
          <li><?php echo link_to('Trip', 'wjr_trip') ?></li>
          <li><?php echo link_to('Trasy', 'wjr_track') ?></li>
          <li><?php echo link_to('Użytkownicy', 'sf_guard_user') ?></li>
          <li><?php echo link_to('Wyloguj', 'sf_guard_signout') ?></li>
        </ul>
      </div>
    <?php endif ?>
    <div id="content">
      <?php echo $sf_content ?>
    </div>
  </body>
 </html>
