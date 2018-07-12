
	<footer class="nsa_footer container">
		<div class="">
			<a href="#">Never Sleep Agency</a> © 2018
		</div>
	</footer>
</div> <!-- .nsa -->
<script type="text/javascript">
	(function() {
		new WOW().init();
		document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
		    anchor.addEventListener('click', function (e) {
		        e.preventDefault();
		        var top,
		        	element = document.querySelector(this.getAttribute('href'));
	        	if (element) {
		        	top = element.offsetTop;
			        window.scroll({
			            behavior: 'smooth',
			            top:      top - 10
			        });
	        	}
		    });
		});
	})();
</script>

<?php wp_footer(); ?>
</body>
</html>