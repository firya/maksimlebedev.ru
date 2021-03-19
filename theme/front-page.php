<? include('header.php'); ?>
<div class="projects">
    <h1 class='projects__header'><?=$post->post_title;?></h1>

    <?php
      $posts = get_posts( array(
        'numberposts' => 20,
        'category'    => 0,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => 'post',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
      ) );
      if (count($posts)) {
    ?>
        <div class="projects__row">
    <?
          foreach ($posts as $post) {
            $actions = get_field("links", $post->ID);
    ?>
            <div class="projects__col">
                <div class="project">
                    <div class="project__picture">
                        <div class="project__image" style="background-image: url('<?=get_the_post_thumbnail_url($post->ID, 'full');?>');"></div>
                    </div>
                    <div class="project__content">
                        <div class="project__header"><?=$post->post_title;?></div>
                        <div class="project__desc"><?=$post->post_content;?></div>
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
<? include('footer.php'); ?>