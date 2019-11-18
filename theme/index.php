<html>
<head>
    <?php wp_head(); ?>
</head>
<body>
    <div class="page">
        <div class="profile">
            <div class="profile__avatar">
                <img src="<?=get_template_directory_uri();?>/images/avatar.jpg" alt="Maksim Lebedev">
            </div>
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
        <div class="projects">
            <div class='projects__header'>Проекты</div>

            <?php
                if ( have_posts() ) {
            ?>
                    <div class="projects__row">
            <?
                    while ( have_posts() ) {
                        the_post();
                        $actions = get_field("links");
            ?>
                        <div class="projects__col">
                            <div class="project">
                                <div class="project__picture">
                                    <div class="project__image" style="background-image: url('<?=get_the_post_thumbnail_url($post->ID, 'full');?>');"></div>
                                </div>
                                <div class="project__content">
                                    <div class="project__header"><? the_title(); ?></div>
                                    <div class="project__desc"><? the_content(); ?></div>
                                    <?
                                        if (count($actions)) {
                                    ?>
                                            <div class="project__actions">
                                    <?php
                                                foreach ($actions as $action) {
                                    ?>
                                                    <a href="<?=$action['link']['url'];?>" class="button" target="_blank"><?=$action['link']['title'];?></a>
                                    <?
                                                }
                                    ?>
                                            </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
            <?
                    }
            ?>
                    </div>
            <?
                }
            ?>
            </div>
        </div>
    </div>

    <?php wp_footer(); ?>
    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(56275531, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/56275531" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
</body>
</html>