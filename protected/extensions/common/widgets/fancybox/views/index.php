<a name="<?php echo $link; ?>" class="fancybox_<?php echo $id; ?> <?php echo (empty($htmlOption['class']) ? '' : $htmlOption['class']) ?>" title="" href="#" style="<?php echo $htmlOptionTitle; ?>"><?php echo $label; ?></a>
<script type="text/javascript">
	$(document).ready(function(){
		$('.fancybox_<?php echo $id; ?>').click(function(){
			var href = $(this).attr('name');
			jQuery.fancybox.open({
				wrapCSS:'fancybox-add',
				type:'iframe',
				href: href,
				'autoSize': '<?php echo $autoSize; ?>',
				width:'<?php echo $htmlOption['width']; ?>',
				height:'<?php echo $htmlOption['height'] ?>',
				closeEffect	: 'elastic',
				<?php if(isset($htmlOption['afterClose'])) echo  "afterClose:".$htmlOption['afterClose'] ?>
			});
		});
	});

</script>

