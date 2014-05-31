<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="google-signin-clientid" content="255393850038.apps.googleusercontent.com" />
		<meta name="google-signin-cookiepolicy" content="single_host_origin" />
		<meta name="google-signin-callback" content="signinCallback" />
		<meta name="google-signin-requestvisibleactions" content="https://schemas.google.com/AddActivity" />
		<meta name="google-signin-scope" content="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/games" />
		<title>unocero</title>
		<script src="/game/static/js/snap.svg-min.js"></script>
  		<script src="/game/static/js/modernizr.custom.js"></script>
  		<script src="/game/static/js/classie.js"></script>
		<style type="text/css">

			@import url('http://fonts.googleapis.com/css?family=Press+Start+2P');

			body {
				margin: 0;
				padding: 0;
				border: 0;
			}

			#unocero_game_container {
				position: fixed;
				width: 100%;
				height: 100%;
				top: 0;
				left: 0;
				background: transparent;
				visibility: hidden;
				-webkit-transition: visibility 0s 0.8s;
				transition: visibility 0s 0.8s;
			}

			#unocero_game_container.open {
				visibility: visible;
				-webkit-transition: none;
				transition: none;
			}

				#unocero_game_container svg {
					position: absolute;
					top: 0;
					left: 0;
				}

					#unocero_game_container svg path {
						fill: rgb(51, 51, 51);
						display: none;
					}

				#unocero_game {
					position: relative;
					top: 50%;
					display: block;
					width: 950px;
					height: auto;
					margin: auto;
					padding: 0;
					border: 0;
					overflow: hidden;
					vertical-align: middle;
					background-color: #3a3;
					font-family: 'Press Start 2P', cursive;
					color: #fff;
					-webkit-transform: translateY(-50%);
					transform: translateY(-50%);
				}

				#unocero_game_container #unocero_game {
					opacity: 0;
					-webkit-transition: opacity 0.5s 0.8s;
					transition: opacity 0.5s 0.8s;
				}

				#unocero_game_container.open #unocero_game {
					opacity: 1;
					-webkit-transition-delay: 0.8s;
					transition-delay: 0.8s;
				}

				#unocero_game_container.close #unocero_game {
					-webkit-transition-delay: 0s;
					transition-delay: 0s;
				}

					#unocero_game_footer {
						position: relative;
						display: block;
						width: 98%;
						height: auto;
						margin: 0;
						padding: 1%;
						border: 0;
						bottom: 0;
						left: 0;
						right: 0;
						background-color: #333;
						font-size: 0;
					}
						#unocero_game_score {
							display: inline-block;
							margin: 0;
							padding: 0;
							border: 0;
							width: 40%;
							vertical-align: middle;
							text-align: left;
							font-size: 16px;
						}
						#unocero_game_user {
							display: inline-block;
							margin: 0;
							padding: 0;
							border: 0;
							width: 60%;
							vertical-align: middle;
							text-align: right;
						}

					#unocero_game_canvas {
						width: 950px;
						height: 600px;
						background: #3a3;
					}

					#unocero_game_menu1,
					#unocero_game_menu2 {
						position: absolute;
						z-index: 1;
						top: 0;
						left: 0;
						width: 100%;
						height: 600px;
						background: transparent;
					}

						#unocero_game_menu1 h1,
						#unocero_game_menu2 h1 {
							margin-top: 5%;
							text-align: center;
							font-size: 72px;
						}

						#unocero_game_menu1 p,
						#unocero_game_menu2 p {
							font-size: 16px;
							margin: 10px 0;
						}

							a#unocero_game_start,
							a#unocero_game_restart,
							a#unocero_game_tweet,
							span#unocero_game_loading {
								display: block;
								width: auto;
								margin: 0 auto;
								padding: 10px;
								top: 30%;
								left: 0;
								border-width: 5px 0;
								border-style: solid;
								border-color: #fff;
								font-size: 24px;
								text-decoration: none;
								color: #fff;
							}
/*
					#unocero_game_restart {
						width: 430px;
						top: 20%;
					}

					#unocero_game_tweet {
						top: 25%;
						width: 342px;
					}

					#unocero_game_loading {
						border: none;
						font-size: 16px;
						top: 20%;
						width: 200px;
					}

					#unocero_game_start{
						top: 100%;
					}

					#unocero_game_info {
						padding: 0;
						text-align: center;
						font-size: 16px;
					}
*/
		</style>
	</head>
	<body>
		<div id="code">&#8593; &#8593; &#8595; &#8595; &#8592; &#8594; &#8592; &#8594; B A</div>
		<div id="unocero_game_container">
			<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="101%" viewBox="0 0 1440 806" preserveAspectRatio="none">
				<path d="m0.005959,200.364029l207.551124,0l0,204.342453l-207.551124,0l0,-204.342453z"/>
				<path d="m0.005959,400.45401l207.551124,0l0,204.342499l-207.551124,0l0,-204.342499z"/>
				<path d="m0.005959,600.544067l207.551124,0l0,204.342468l-207.551124,0l0,-204.342468z"/>
				<path d="m205.752151,-0.36l207.551163,0l0,204.342437l-207.551163,0l0,-204.342437z"/>
				<path d="m204.744629,200.364029l207.551147,0l0,204.342453l-207.551147,0l0,-204.342453z"/>
				<path d="m204.744629,400.45401l207.551147,0l0,204.342499l-207.551147,0l0,-204.342499z"/>
				<path d="m204.744629,600.544067l207.551147,0l0,204.342468l-207.551147,0l0,-204.342468z"/>
				<path d="m410.416046,-0.36l207.551117,0l0,204.342437l-207.551117,0l0,-204.342437z"/>
				<path d="m410.416046,200.364029l207.551117,0l0,204.342453l-207.551117,0l0,-204.342453z"/>
				<path d="m410.416046,400.45401l207.551117,0l0,204.342499l-207.551117,0l0,-204.342499z"/>
				<path d="m410.416046,600.544067l207.551117,0l0,204.342468l-207.551117,0l0,-204.342468z"/>
				<path d="m616.087402,-0.36l207.551086,0l0,204.342437l-207.551086,0l0,-204.342437z"/>
				<path d="m616.087402,200.364029l207.551086,0l0,204.342453l-207.551086,0l0,-204.342453z"/>
				<path d="m616.087402,400.45401l207.551086,0l0,204.342499l-207.551086,0l0,-204.342499z"/>
				<path d="m616.087402,600.544067l207.551086,0l0,204.342468l-207.551086,0l0,-204.342468z"/>
				<path d="m821.748718,-0.36l207.550964,0l0,204.342437l-207.550964,0l0,-204.342437z"/>
				<path d="m821.748718,200.364029l207.550964,0l0,204.342453l-207.550964,0l0,-204.342453z"/>
				<path d="m821.748718,400.45401l207.550964,0l0,204.342499l-207.550964,0l0,-204.342499z"/>
				<path d="m821.748718,600.544067l207.550964,0l0,204.342468l-207.550964,0l0,-204.342468z"/>
				<path d="m1027.203979,-0.36l207.550903,0l0,204.342437l-207.550903,0l0,-204.342437z"/>
				<path d="m1027.203979,200.364029l207.550903,0l0,204.342453l-207.550903,0l0,-204.342453z"/>
				<path d="m1027.203979,400.45401l207.550903,0l0,204.342499l-207.550903,0l0,-204.342499z"/>
				<path d="m1027.203979,600.544067l207.550903,0l0,204.342468l-207.550903,0l0,-204.342468z"/>
				<path d="m1232.659302,-0.36l207.551147,0l0,204.342437l-207.551147,0l0,-204.342437z"/>
				<path d="m1232.659302,200.364029l207.551147,0l0,204.342453l-207.551147,0l0,-204.342453z"/>
				<path d="m1232.659302,400.45401l207.551147,0l0,204.342499l-207.551147,0l0,-204.342499z"/>
				<path d="m1232.659302,600.544067l207.551147,0l0,204.342468l-207.551147,0l0,-204.342468z"/>
				<path d="m-0.791443,-0.360001l207.551163,0l0,204.342438l-207.551163,0l0,-204.342438z"/>
			</svg>
			<div id="unocero_game">
				<canvas id="unocero_game_canvas"></canvas>
				<div id="unocero_game_menu1">
					<h1>unocero</h1>
					<p><a id="unocero_game_start" href="javascript:;">¡Jugar!</a></p>
					<p><span id="unocero_game_loading">Cargando...</span></p>
				</div>
				<div id="unocero_game_menu2">
					<h1>unocero</h1>
					<p><span id="unocero_game_info">Game Over</span></p>
					<p><a id="unocero_game_restart" href="javascript:;">¡Jugar de nuevo!</a></p>
					<p><a id="unocero_game_tweet" href="javascript:;" target="_blank" rel="nofollow">Compartir mi puntaje</a></p>
				</div>
				<audio id="unocero_game_audio_main" loop>
					<source src="http://dl.dropbox.com/u/26141789/canvas/snake/main.mp3" type="audio/mp3" />
					<source src="http://dl.dropbox.com/u/26141789/canvas/snake/main.ogg" type="audio/ogg"/>
				</audio>
				<audio id="unocero_game_audio_gameover">
					<source src="http://dl.dropbox.com/u/26141789/canvas/snake/go.mp3" type="audio/mp3" />
					<source src="http://dl.dropbox.com/u/26141789/canvas/snake/go.ogg" type="audio/ogg"/>
				</audio>
				<audio id="unocero_game_audio_food">
					<source src="http://dl.dropbox.com/u/26141789/canvas/snake/food.mp3" type="audio/mp3" />
					<source src="http://dl.dropbox.com/u/26141789/canvas/snake/food.ogg" type="audio/ogg"/>
				</audio>
				<div id="unocero_game_footer">
					<p id="unocero_game_score">Puntaje: 0</p>
					<div id="unocero_game_user">
						<span class="g-signin"></span>
					</div>
				</div>
			</div>
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>
		;(function() {
			var keys = [];
			document.addEventListener('keydown', function(event) {
				if( event.keyCode == 38 && keys.length == 0 ) {
					keys[0] = event.keyCode;
				} else if( event.keyCode == 38 && keys.length == 1 ) {
					keys[1] = event.keyCode;
				} else if( event.keyCode == 40 && keys.length == 2 ) {
					keys[2] = event.keyCode;
				} else if( event.keyCode == 40 && keys.length == 3 ) {
					keys[3] = event.keyCode;
				} else if( event.keyCode == 37 && keys.length == 4 ) {
					keys[4] = event.keyCode;
				} else if( event.keyCode == 39 && keys.length == 5 ) {
					keys[5] = event.keyCode;
				} else if( event.keyCode == 37 && keys.length == 6 ) {
					keys[6] = event.keyCode;
				} else if( event.keyCode == 39 && keys.length == 7 ) {
					keys[7] = event.keyCode;
				} else if( event.keyCode == 66 && keys.length == 8 ) {
					keys[8] = event.keyCode;
				} else if( event.keyCode == 65 && keys.length == 9 ) {
					keys[9] = event.keyCode;
					keys = [];
					openGame();
				} else {
					keys = [];
				}
				if( event.keyCode == 27 ) {
					closeGame();
				}
			});


			function shuffle(array) {
				var currentIndex = array.length,
					temporaryValue,
					randomIndex;
				while (0 !== currentIndex) {
					randomIndex = Math.floor(Math.random() * currentIndex);
					currentIndex -= 1;
					temporaryValue = array[currentIndex];
					array[currentIndex] = array[randomIndex];
					array[randomIndex] = temporaryValue;
				}
				return array;
			}

			function openGame() {
				var cnt = 0,
					overlay = document.getElementById('unocero_game_container'),
					paths = [].slice.call( overlay.querySelectorAll( 'svg > path' ) ),
					pathsTotal = paths.length;
				shuffle( paths );
				if( classie.has( overlay, 'open' ) ) {
					classie.remove( overlay, 'open' );
					classie.add( overlay, 'close' );
					paths.forEach( function( p, i ) {
						setTimeout( function() {
							++cnt;
							p.style.display = 'none';
							if( cnt === pathsTotal ) {
								classie.remove( overlay, 'close' );
							}
						}, i * 30 );
					});
				} else if( !classie.has( overlay, 'close' ) ) {
					classie.add( overlay, 'open' );
					paths.forEach( function( p, i ) {
						setTimeout( function() {
							p.style.display = 'block';
						}, i * 30 );
					});
				}
				initGame();
			}
			function closeGame() {
				openGame();
			}
			function initGame() {
				//W = document.getElementById('unocero_game').offsetWidth, // Window's width
				//H = document.getElementById('unocero_game').offsetHeight - document.getElementById('login').offsetHeight,
				//Preloading audio stuff
				var mainMusic = document.getElementById('unocero_game_audio_main'),
					foodMusic = document.getElementById('unocero_game_audio_food'), 
					goMusic = document.getElementById('unocero_game_audio_gameover'),

					files = [mainMusic, foodMusic, goMusic],
					counter = 0,

					start = document.getElementById('unocero_game_start'),
					restart = document.getElementById('unocero_game_restart'),
					loading = document.getElementById('unocero_game_loading');

				for(var i = 0; i < files.length; i++) {
					var file = files[i];
					file.addEventListener('loadeddata', function() {
						counter++;
						var percent = Math.floor((counter/files.length)*100);
						loading.innerHTML = 'Cargando ' + percent + '%';
						if(percent == 100) showButton();
					});
				}

				start.addEventListener('click', function(event) {
					event.preventDefault();
					init();
				});

				restart.addEventListener('click', function(event) {
					event.preventDefault();
					reset();
				});

				function showButton() {
					start.style.top = '30%';
					loading.style.top = '100%';
				}

				//Initializing Canvas
				var canvas = document.getElementById('unocero_game_canvas'),
					ctx = canvas.getContext('2d'),
					w = canvas.offsetWidth,
					h = canvas.offsetHeight;
					
				canvas.height = h;
				canvas.width = w;

				var reset, scoreText,menu, reMenu, score = 0;

				function init() {
					mainMusic.play();
					menu.style.zIndex = '-1';
					
					var snake,
						size = 10,
						speed = 20,
						dir,
						game_loop,
						over = 0,
						hitType;
					
					var msgsSelf = [
						'Hay mucha comida. ¡No te comas a ti mismo!',
						'¿Tu cuerpo es más rico que la comida?',
						'¡¡AAAhhh!! ¡Me mordi!',
						'¿Tienes Autophagia?'
					],
						msgsWall = [
						'¡Te rompiste la cabeza!',
						'¡La pared es mas fuerte de lo que parece!',
						'No hay forma de escapar del juego...',
						'¡Mira mamá, sin cabeza...!',
						'¿No pudiste ver la pared? ¿Eh?'
					];
					
					function paintCanvas() {
						ctx.fillStyle = '#3a3';
						ctx.fillRect(0, 0, w, h);
					}
					
					var Food = function() {
						this.x = Math.round(Math.random() * (w - size) / size);
						this.y = Math.round(Math.random() * (h - size) / size);
						
						this.draw = function() {
							ctx.fillStyle = 'white';
							ctx.fillRect(this.x*size, this.y*size, size, size);
						}
					}
							
					var f = new Food();
					
					//Initialize the snake
					function initSnake() {
						var length = 10;
						snake = [];
						for(var i = length - 1; i >= 0; i--) {
							snake.push({x: i, y: 0});
						}
					}
					
					function paintSnake() {
						for(var i = 0; i < snake.length; i++) {
							var s = snake[i];
							
							ctx.fillStyle = 'white';
							ctx.fillRect(s.x*size, s.y*size, size, size);
						}
					}
					
					function updateSnake() {
						//Update the position of the snake
						var head_x = snake[0].x;
						var head_y = snake[0].y;
						
						//Get the directions
						document.onkeydown = function(e) {
							var key = e.keyCode;
							//console.log(key);
							
							if(key == 37 && dir != 'right') setTimeout(function() {dir = 'left'; }, 30);
							else if(key == 38 && dir != 'down') setTimeout(function() {dir = 'up'; }, 30);
							else if(key == 39 && dir != 'left') setTimeout(function() {dir = 'right'; }, 30);
							else if(key == 40 && dir != 'up') setTimeout(function() {dir = 'down'; }, 30);

							if(key) e.preventDefault();

						}
							
						//Directions
						if(dir == 'right') head_x++;
						else if(dir == 'left') head_x--;
						else if(dir == 'up') head_y--;
						else if(dir == 'down') head_y++;
						
						//Move snake
						var tail = snake.pop();
						tail.x = head_x;
						tail.y = head_y;
						snake.unshift(tail);
						 
						//Wall Collision
						if(head_x >= w/size || head_x <= -1 || head_y >= h/size || head_y <= -1) {					
							if(over == 0) {
								hitType = 'wall';
								gameover();
							}
							over++;
						}
						
						//Food collision
						if(head_x == f.x && head_y == f.y) {
							coll = 1;
							f = new Food();
							var tail = {x: head_x, y:head_y};
							snake.unshift(tail);
							score += 10;
							scoreText.innerHTML = 'Puntaje: '+score;
							foodMusic.pause();
							foodMusic.currentTime = 0;
							foodMusic.play();
							
							//Increase speed
							if(speed <= 45) speed ++;
							clearInterval(game_loop);
							game_loop = setInterval(draw, 1000/speed);
						} else {
							//Check collision between snake parts
							for(var j = 1; j < snake.length; j++) {
								var s = snake[j];
								if(head_x == s.x && head_y == s.y) {
									if(over == 0) {
										hitType = 'self';
										gameover(); 
									}
									over++;
								}
							} 
						}
					}
					
					function draw() {
						paintCanvas();
						paintSnake();
						updateSnake();
						
						//Draw food
						f.draw();
					}
					
					reset = function() {
						initSnake();
						f = new Food();
						reMenu.style.zIndex = '-1'
						dir = 'right';
						over = 0;
						speed = 20;
						if(typeof game_loop != 'undefined')  clearInterval(game_loop); 
						game_loop = setInterval(draw, 1000/speed);
						

						score = 0;
						scoreText.innerHTML = 'Puntaje: '+score;
						mainMusic.currentTime = 0;
						mainMusic.play();
						
						return;
					}
						
					function gameover() {
						clearInterval(game_loop);
						mainMusic.pause();
						goMusic.play();
						
						var tweet = document.getElementById('unocero_game_tweet');
						tweet.href = 'http://twitter.com/share?url=http://www.unocero.com&text=Hice ' + score + ' puntos en el juego de unocero&count=horiztonal&via=unocero';
						
						//Get the gameover text
						var goText = document.getElementById('unocero_game_info');
						
						//Show the messages
						if(hitType == 'wall') {
							goText.innerHTML = msgsWall[Math.floor(Math.random() * msgsWall.length)];
						} else if(hitType == 'self') {
							goText.innerHTML = msgsSelf[Math.floor(Math.random() * msgsSelf.length)];
						}
						
						reMenu.style.zIndex = '1';
					}
					
					reset();
				}

				//Menus
				function startMenu() {
					menu = document.getElementById('unocero_game_menu1');
					reMenu = document.getElementById('unocero_game_menu2');
					scoreText = document.getElementById('unocero_game_score');
					reMenu.style.zIndex = '-1'
				}

				startMenu();
			}
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/client.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/client:plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();
		/*
		function signinCallback(authResult) {
			if (authResult['access_token']) { 
				console.log(gapi.auth.getToken());
				gapi.client.load('oauth2', 'v1', function() {
					gapi.client.oauth2.userinfo.get().execute(function(resp) {
						console.log(resp);
						alert('¡Bienvenido ' + resp.given_name + '!');
					});
				});
			} else if (authResult['error']) {
				console.log('There was an error: ' + authResult['error']);
			}
	    }
	    */
		function signinCallback(authResult) {
			if (authResult['status']['signed_in']) {
				gapi.client.load('plus','v1', function() {
					gapi.client.plus.people.get({'userId': 'me'}).execute(function(profile) {
						console.log(profile);
						alert('¡Bienvenido ' + profile.name.givenName + '!');
					});
				});
			} else if (authResult['error']) {
				console.log('Sign in error: ' + authResult['error']);
			} else {
				console.log('Sign in error: Unknown.');
			}
	    }
		</script>
	</body>
</html>