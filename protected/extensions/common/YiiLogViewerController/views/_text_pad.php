<?php ?>

<div class="text-pad">
	<div class="origin-data"><?= $text; ?></div>
	<div class="raw-data"><?= $text; ?></div>
	<pre class="text-view"><?= $text; ?></pre>
	<div class="commands">
		<ul class="unstyled">
			<li><a href="#" rel="raw" class="btn">Raw</a></li>
			<li><a href="#" rel="json" class="btn">JSON</a></li>
			<li><a href="#" rel="base64" class="btn">Base64</a></li>
			<li><a href="#" rel="query-string" class="btn">Query String</a></li>
		</ul>
	</div>
	<div class="default" style="display: none"><?=isset($default) ? $default : 'undefined';?></div>
</div>

<?php ob_start(); ?>

jQuery(function($) {
	
	function doUpdateValue(pad, newValue)
	{
		pad.find('.text-view').text(newValue);
		pad.find('.raw-data').html(newValue);
	}

	$('.text-pad a[rel=raw]').each(function () {
		$(this).click(function(e) {
			var btn = $(this);
			var pad = btn.parents('.text-pad');
			var view = pad.find('.text-view');
			var raw = pad.find('.origin-data');

			doUpdateValue(pad, raw.text());
			pad.find('a.btn').attr('disabled', false);
			btn.attr('disabled', true);
			e.preventDefault();
			return false;
		});
	});

	$('.text-pad a[rel=json]').each(function () {
		$(this).click(function(e) {
			var btn = $(this);
			var pad = btn.parents('.text-pad');
			var view = pad.find('.text-view');
			var txt = view.text();

			try
			{
				data = JSON.parse(txt);
				txt = JSON.stringify(data, null, "	");
			}
			catch(err)
			{
				alert(err);
				console.log(err);
			}

			doUpdateValue(pad, txt);
			pad.find('a.btn').attr('disabled', false);
			btn.attr('disabled', true);
			e.preventDefault();
			return false;
		});
	});

	$('.text-pad a[rel=base64]').each(function () {
		$(this).click(function(e) {
			var btn = $(this);
			var pad = btn.parents('.text-pad');
			var view = pad.find('.text-view');
			var txt = view.text();

			try
			{
				txt = $.base64.decode(txt);
			}
			catch(err)
			{
				alert(err);
				console.log(err);
			}

			doUpdateValue(pad, txt);
			pad.find('a.btn').attr('disabled', false);
			btn.attr('disabled', true);
			e.preventDefault();
			return false;
		});
	});


	$('.text-pad a[rel=query-string]').each(function () {
		$(this).click(function(e) {
			var btn = $(this);
			var pad = btn.parents('.text-pad');
			var view = pad.find('.text-view');
			var txt = pad.find('.raw-data').text();
			console.log(txt);

			try
			{
				var urls = txt.split('?');
				var rs = {};

				if (urls.length > 1) {
					data = urls[1].split('&');
					rs['___uri'] = urls[0];
				} else data = urls[0].split('&');

				var k,v;
				for (var i=0,l=data.length; i<l; i++) {
					if (data[i].length < 1) continue;

					tmp = data[i].split('=');

					k = decodeURIComponent((tmp[0] + '').replace(/\+/g, '%20'))
					v = decodeURIComponent((tmp[1] + '').replace(/\+/g, '%20'))
					rs[k] = v;
				}

				txt = JSON.stringify(rs, null, "	");
			}
			catch(err)
			{
				alert(err);
				console.log(err);
			}

			doUpdateValue(pad, txt);
			pad.find('a.btn').attr('disabled', false);
			btn.attr('disabled', true);
			e.preventDefault();
			return false;
		});
	});
	
	var defaultTextPad = $('.text-pad .default').text();
	
	if(defaultTextPad != 'undefined'){
		$('.text-pad .default').each(function () {
			var btn = $(this);
			var pad = btn.parents('.text-pad');
			var click = pad.find('a[rel='+btn.text()+']');
			click.click();
			click.attr('disabled', true);
		});
	}
});

<?php $script = ob_get_clean(); ?>

<?php Yii::app()->getClientScript()->registerScript('text_pad', $script, CClientScript::POS_END); ?>
<?php Yii::app()->getClientScript()->registerScriptFile('https://raw.github.com/carlo/jquery-base64/master/jquery.base64.min.js'); ?>

<?php Yii::app()->getClientScript()->registerCss('text_pad', <<<CSS
.text-pad .raw-data, .text-pad .origin-data {display:none;}
.text-pad .commands ul li {display: inline;}
CSS
); ?>
