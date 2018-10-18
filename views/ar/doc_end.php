

		<script src="<?php echo BASEURL; ?>/js/vendor/modernizr.js"></script>
		<script src="<?php echo BASEURL; ?>/js/vendor/jquery.js"></script>
		<script src="<?php echo BASEURL; ?>/js/plugins.js"></script>
		<script src="<?php echo BASEURL; ?>/js/main.js"></script>
			
		<?php
		// Additional scripts...
		if(isset($scripts) && !empty($scripts)) {
			foreach($scripts as $script) {
				echo $script . "\n";
			}
		}

		// script tag...
		if(isset($snippets) && !empty($snippets)) {
			foreach($snippets as $snippet) {
				echo "<script type=\"text/javascript\">\n";
				echo $snippet . "\n";
				echo "\n</script>\n\n";
			}
		}
		?>

		<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
		<script>
		window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
		ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
		</script>
		<script src="https://www.google-analytics.com/analytics.js" async defer></script>
	</body>
</html>