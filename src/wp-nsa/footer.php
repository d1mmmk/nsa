
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
	
	(function(){
		
		var glitchHead = document.querySelector('.glitch-head'),
			glitch = glitchHead.querySelector('.glitch__img'),
			glitchEyes = glitchHead.querySelector('.glitch__eyes');
			
		var animations = [{
				target: glitch,
				timing: { min: 2, max: 6 }
			},{
				target: glitchEyes,
				timing: { min: 1, max: 3 }
			}];

		function glitchAmin(animation){
			animation.target.classList.remove('animation');
			clearTimeout(animation.to);
			var timeout = Math.floor(Math.random() * animation.timing.max) + animation.timing.min;
			animation.to = setTimeout(function() {
				animation.target.classList.add(('animation'));
			}, timeout * 1000);
		};
		animations.forEach(function(animation){
			glitchAmin(animation);
		});
		window.onanimationend = function(event){
			animations.forEach(function(animation){
				if (event.target === animation.target) {
					glitchAmin(animation);
				}
			});
		}
	})()
</script>

<?php wp_footer(); ?>
</body>
</html>