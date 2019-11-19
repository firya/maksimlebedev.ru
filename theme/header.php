<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?
        if(wp_title('', false)) {
            echo wp_title('');
        } else {
            echo bloginfo('name');
        }
    ?></title>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <meta name="yandex-verification" content="53843a16c9343a59" />

    <link rel="apple-touch-icon" sizes="180x180" href="<?=get_template_directory_uri();?>/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=get_template_directory_uri();?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=get_template_directory_uri();?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?=get_template_directory_uri();?>/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?=get_template_directory_uri();?>/favicon/safari-pinned-tab.svg" color="#333333">
    <meta name="apple-mobile-web-app-title" content="Maksim Lebedev">
    <meta name="application-name" content="Maksim Lebedev">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    
    <?php wp_head(); ?>
</head>
<body>
    <div class="page">
      <div class="profile">
          <a href='/' class="profile__avatar">
              <img src="<?=get_template_directory_uri();?>/images/avatar.jpg" alt="Maksim Lebedev">
          </a>
          <div class="profile__name">Maksim Lebedev</div>
          <div class="profile__links">
              <div class="profile__block">
                  <img src="<?=get_template_directory_uri();?>/sprites/github.svg" class='profile__icon' alt="github">
                  <a href="https://github.com/firya" class="profile__link" target="_blank" rel="nofollow">firya</a>
              </div>
              <div class="profile__block">
                  <img src="<?=get_template_directory_uri();?>/sprites/twitter.svg" class='profile__icon' alt="twitter">
                  <a href="https://twitter.com/firechka" class="profile__link" target="_blank" rel="nofollow">@firechka</a>
              </div>
              <div class="profile__block">
                  <img src="<?=get_template_directory_uri();?>/sprites/telegram.svg" class='profile__icon' alt="telegram">
                  <a href="https://tele.click/firechka" class="profile__link" target="_blank" rel="nofollow">@firechka</a>
              </div>
          </div>
      </div>