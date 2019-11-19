<? include('header.php'); ?>
<div class="project">
    <div class="project__picture">
        <div class="project__image" style="background-image: url('<?=get_the_post_thumbnail_url($post->ID, 'full');?>');"></div>
    </div>
    <div class="project__content">
        <h1 class="project__header"><?=$post->post_title;?></h1>
        <div class="project__desc"><?=$post->post_content;?></div>
        <?
          $actions = get_field("links", $post->ID);
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
<? include('footer.php'); ?>