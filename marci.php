<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Marc001</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/npm/velocity-animate@2.0/velocity.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/velocity-animate@2.0/velocity.ui.min.js"></script></head>
	<style>
		#game {
			width: 100%;
			height: 100%;
			background-image: url('floor.png');
			background-position: bottom;
			background-repeat: no-repeat;
			overflow: hidden;
		}
		.character {
			border: 1px solid #CCC;
			position: absolute;
			top: 50%;
			left: 50%;
		}
	</style>
</head>
<body>
	<div id="game">
		<img src="lights.png" style="width: 100%;" />
		<div id="mees" class="character" style="left: 10px;"><img src="man.png" style="width: 100px;" border="0" />0</div>
		<div id="naine" class="character"><img src="woman.png" style="width: 100px;" border="0" />0</div>
		<div id="mees1" class="character" style="top: 20px; left:10px;"><img src="man.png" style="width: 100px;" border="0" />1</div>
		<div id="naine1" class="character" style="top:20px"><img src="woman.png" style="width: 100px;" border="0" />1</div>
	</div>
	<div id="header"></div>
	<script>
		<!--
		var game = $("#game");
		$("#header").velocity({"color": "red"}, 1000);

		var gcnt = 0;
		var preferX = ['x', 'x', 'x', 'x'];
		var preferY = ['x', 'x', 'x', 'x'];

		$('#game').on('mousemove',function(e) {
			var rand;
			$('.character').each(function() {
				if (Math.abs($(this).position().left - e.clientX) < 150 && Math.abs($(this).position().top - e.clientY) < 150) {
					//console.log(e);
					if ($(this).position().left - e.clientX > 0) {
						rand = Math.floor((Math.random() * 100) + 1);
						newleft = $(this).position().left + rand;
					}
					else {
						rand = Math.floor((Math.random() * 100) + 1) - 110;
						newleft = $(this).position().left + rand;
					}
					
					if ($(this).position().top - e.clientY > 0) {
						rand = Math.floor((Math.random() * 100) + 1);
						newtop = $(this).position().top + rand;
					}
					else {
						rand = Math.floor((Math.random() * 100) + 1) - 110;
						newtop = $(this).position().top + rand;
					}

					if (newleft < 0 || newleft > (game.width() - $(this).width())) {
						newleft = game.width() / 2;
					}
					if (newtop < 0 || newtop > (game.height() - $(this).height())) {
						newtop = game.height() / 2;
					}
					//console.log(newleft, newtop);
					$(this).velocity('stop');
					$(this).velocity({left: newleft, top: newtop}, 100);
				}

			});
		});
		
		function animate() {
			var i = 0;
			$('.character').each(function() {
				var oldleft = $(this).position().left;
				var oldtop = $(this).position().top;
				var newleft = 0;
				var newtop = 0;
				
				var rand;
				console.log(i, $(this).attr('id'), preferX[i], preferY[i]);
				rand = Math.floor((Math.random() * 600) + 1) - 300;
				if (gcnt % 2 == 0) {
					if (preferX[i] == 'right') {
						rand = Math.abs(rand);
					}
					if (preferX[i] == 'left') {
						if (rand > 0) rand = rand * -1;
					}
				}
				if (preferX[i] == 'right2')	{
					rand = Math.abs(rand);
				}
				if (preferX[i] == 'left2') {
					if (rand > 0) rand = rand * -1;
				}
				newleft = oldleft + rand;

				rand = Math.floor((Math.random() * 300) + 1) - 150;
				if (gcnt % 2 == 0) {
					if (preferY[i] == 'down') {
						rand = Math.abs(rand);
					}
					if (preferY[i] == 'up') {
						if (rand > 0) rand = rand * -1;
					}
				}
				if (preferY[i] == 'down2') {
					rand = Math.abs(rand);
				}
				if (preferY[i] == 'up2') {
					if (rand > 0) rand = rand * -1;
				}
				newtop = oldtop + rand;

				if (newtop < 0) {
					newtop = 0;
					preferY[i] = 'down';
				}
				if (newleft < 0) {
					newleft = 0;
					preferX[i] = 'right';
				}
				if (newtop > game.height() - $(this).height()) {
					newtop = game.height() - $(this).height();
					preferY[i] = 'up';
				}
				if (newleft > game.width() - $(this).width()) {
					newleft = game.width() - $(this).width();
					preferX[i] = 'left';
				}

				$(this).velocity('stop');
				$(this).velocity({left: newleft, top: newtop}, { duration: 1100, easing: "linear" });
				i++;
			});
			gcnt++;
			console.log('tick');
		}

		var animInterval = setInterval(animate, 1000);

		var animInterval2 = setInterval(function() {
			var i = 0;
			$('.character').each(function() {
				var curleft = $(this).position().left;
				var curtop = $(this).position().top;
				var curid = $(this).attr('id');
				$('.character').each(function() {
					if ($(this).attr('id') != curid) {
						if (Math.abs($(this).position().left - curleft) < 130 && Math.abs($(this).position().top - curtop) < 190) {
							if ($(this).position().left - curleft > 0) {
								preferX[i] = 'left';
								console.log(curid, "esimeses")
								
							} 
							if ($(this).position().left - curleft < 0) {
								preferX[i] = 'right';
								console.log(curid, "teises")
							}

							if ($(this).position().top - curtop > 0) {
								preferY[i] = 'up';
								console.log(curid, "kolmandas")
							} 
							if ($(this).position().top - curtop < 0) {
								preferY[i] = 'down';
								console.log(curid, "neljandas")
							}
							animate();
						}
					}
				});

				i++;
			});
		}, 100);
		//-->
	</script>
</body>
</html>