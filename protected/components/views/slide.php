<script src="//unslider.com/unslider.min.js"></script>
<div class="wrapper_slide_show">
    <div class="wrapper_content" style="height: 100%">
        <div class="banner">
            <ul>
                <?php foreach ($galleries as $key=>$gallery): ?>
                    <li style="background-image: url('../../../css/img/<?php echo $gallery->img_url ?>')">
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>
<script>
    $(function() {
        var data = $('.banner').unslider({
            speed: 500,
            delay: 4000,
            keys: true,
            dots: true
        });
    });
</script>