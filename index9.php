<html>
    <head>
        <script src="lib/three.min.js"></script>
        <script src="lib/CanvasRenderer.js"></script>
        <script src="lib/Projector.js"></script>
        <script src="lib/jquery-3.1.1.min.js"></script>
        <script src="lib/OBJLoader.js"></script>
        <script src="lib/PointerLockControls.js"></script>
    </head>
    <body>
        <div id="blocker">

			<div id="instructions">
				<span style="font-size:40px">Click to play</span>
				<br />
				(W, A, S, D = Move, SPACE = Jump, MOUSE = Look around)
			</div>

		</div>
        <script>
        var gema = new Array();
        manager = new Array();
        var loader = new Array();
        var object = new Array();
        var controls;
        /*////////////////////////////VARIABLES PARA POINTER LOCK///////////////////////////////////*/
       var blocker = document.getElementById( 'blocker' );
			var instructions = document.getElementById( 'instructions' );
        var havePointerLock = 'pointerLockElement' in document || 'mozPointerLockElement' in document || 'webkitPointerLockElement' in document;

			if ( havePointerLock ) {

				var element = document.body;

				var pointerlockchange = function ( event ) {

					if ( document.pointerLockElement === element || document.mozPointerLockElement === element || document.webkitPointerLockElement === element ) {

						controlsEnabled = true;
						controls.enabled = true;

						blocker.style.display = 'none';

					} else {

						controls.enabled = false;

						blocker.style.display = '-webkit-box';
						blocker.style.display = '-moz-box';
						blocker.style.display = 'box';

						instructions.style.display = '';

					}

				};

				var pointerlockerror = function ( event ) {

					instructions.style.display = '';

				};

				// Hook pointer lock state change events
				document.addEventListener( 'pointerlockchange', pointerlockchange, false );
				document.addEventListener( 'mozpointerlockchange', pointerlockchange, false );
				document.addEventListener( 'webkitpointerlockchange', pointerlockchange, false );

				document.addEventListener( 'pointerlockerror', pointerlockerror, false );
				document.addEventListener( 'mozpointerlockerror', pointerlockerror, false );
				document.addEventListener( 'webkitpointerlockerror', pointerlockerror, false );

				instructions.addEventListener( 'click', function ( event ) {

					instructions.style.display = 'none';

					// Ask the browser to lock the pointer
					element.requestPointerLock = element.requestPointerLock || element.mozRequestPointerLock || element.webkitRequestPointerLock;
					element.requestPointerLock();

				}, false );

			} else {

				instructions.innerHTML = 'Your browser doesn\'t seem to support Pointer Lock API';

			}
        /*////////////////////////////VARIABLES PARA POINTER LOCK///////////////////////////////////*/
       
        for(var i = 0;i<10;i++){
              gema[i] = new THREE.Mesh();
        }

          //objhelice.position.y = 0.7;
          angulohelice = 0;
           $(document).ready(function(){
               $(document).click(function(){
                   
                 
               })
               
           })
           init()
           animate()
           
           var controlsEnabled = false;

			var moveForward = false;
			var moveBackward = false;
			var moveLeft = false;
			var moveRight = false;
			var canJump = false;

			var prevTime = performance.now();
			var velocity = new THREE.Vector3();
           
            function init(){
                // Pre condiciones
                   container = document.createElement("div");
                   document.body.appendChild(container)
                   camera = new THREE.PerspectiveCamera(70,1.3,1,150000);
                   
                    escena = new THREE.Scene();
                // Pre condiciones
               // Creo una luz del sol
               var directionalLight = new THREE.DirectionalLight( 0xffffff, 0.7 );
               directionalLight.position.x = 100;
               directionalLight.position.y = 100;
               directionalLight.castShadow = true;
                    directionalLight.shadow.mapSize.width = 4096;
                    directionalLight.shadow.mapSize.height = 4096;
                    directionalLight.shadow.camera.near = 1;
                    directionalLight.shadow.camera.far = 1;
                    directionalLight.shadow.camera.fov = 30;
                escena.add( directionalLight )
                var ambient = new THREE.AmbientLight( 0xffffff, 0.1 );
                escena.add( ambient )
                /*/////////////////////////////LOGICA POINTER LOCK///////////////////////////////*/
                
                controls = new THREE.PointerLockControls( camera );
				escena.add( controls.getObject() );

				var onKeyDown = function ( event ) {

					switch ( event.keyCode ) {

						case 38: // up
						case 87: // w
							moveForward = true;
							break;

						case 37: // left
						case 65: // a
							moveLeft = true; break;

						case 40: // down
						case 83: // s
							moveBackward = true;
							break;

						case 39: // right
						case 68: // d
							moveRight = true;
							break;

						case 32: // space
							if ( canJump === true ) velocity.y += 350;
							canJump = false;
							break;

					}

				};

				var onKeyUp = function ( event ) {

					switch( event.keyCode ) {

						case 38: // up
						case 87: // w
							moveForward = false;
							break;

						case 37: // left
						case 65: // a
							moveLeft = false;
							break;

						case 40: // down
						case 83: // s
							moveBackward = false;
							break;

						case 39: // right
						case 68: // d
							moveRight = false;
							break;

					}

				};

				document.addEventListener( 'keydown', onKeyDown, false );
				document.addEventListener( 'keyup', onKeyUp, false );
				
                 /*////////////////////////////ESFERA DEL CIELO////////////////////////////*/
                cielo = new THREE.SphereGeometry(100000,25,25);
                var mapacielo = THREE.ImageUtils.loadTexture("cielo.jpg");
                materialcielo = new THREE.MeshBasicMaterial({map:mapacielo});
                materialcielo.side = THREE.DoubleSide;
                 micielo = new THREE.Mesh(cielo,materialcielo);
                 micielo.rotation.y = Math.PI/3
                 escena.add(micielo);
                
                /*////////////////////////////ESFERA DEL CIELO////////////////////////////*/
                
                /*/////////////////////////////LOGICA POINTER LOCK///////////////////////////////*/
                <?php 
                    // Quiero mirar cuantos objetos hay dentro de la carpeta X
                    $dir    = 'dinamico';
                    $files1 = scandir($dir);
                    
                    foreach ($files1 as $key => $value) {
                        if(explode(".",$value)[1] == "obj"){
                        ?>
                        /*/////////////AQUI VOY A IMPORTAR UNA LIBRERIA OBJ/////////////*/
                        var i = 1;
                           mapamuros = THREE.ImageUtils.loadTexture("dinamico/<?= explode(".",$value)[0] ?>.jpg")
                           // Creo un gestor de carga (si os fijais mas abajo vereis que es necesario)
                           manager[i] = new THREE.LoadingManager();
                           // Creo un nuevo material
                           material4 = new THREE.MeshPhongMaterial({map:mapamuros});
                           // Sobre el gestor, cargo un cargador de OBJ
                           loader[i] = new THREE.OBJLoader(manager[i])
                           // Sobre el cargador, cargo el modelo concreto OBJ
                           loader[i].load("dinamico/<?= explode(".",$value)[0] ?>.obj",function(objeto){
                               objeto.traverse( function ( child ) {
            						if ( child instanceof THREE.Mesh ) {
            						    // Si es hijo de malla 3D, aplicale este material
            							child.material = material4;
            						}
            					} );
            					object[i] = objeto
            					gema[i] = object[i]
                               gema[i].scale.x = 40;
                                gema[i].scale.y = 40;
                                gema[i].scale.z = 40;
                                gema[i].receiveShadows = true;
                                gema[i].castShadows = true;
            					escena.add(gema[i]);
                           },onProgress,onError)
                           /*/////////////AQUI VOY A IMPORTAR UNA LIBRERIA/////////////*/
                       <?php
                        }
                    }
               ?>
                   function onProgress(){}
                   function onError(){}
               
              
               
               // Post condiciones
                   renderer = new THREE.WebGLRenderer();
                   renderer.setClearColor(0xf0f0f0);
                   renderer.setPixelRatio(1);
                   renderer.setSize(800,600);
                    // Activo las sombras
               renderer.shadowMap.enabled = true;
			renderer.shadowMap.type = THREE.PCFSoftShadowMap;
                    container.appendChild(renderer.domElement)
                // Post condiciones
                console.log(gema)
            }
            
            function animate(){
              if ( controlsEnabled ) {
				

					var time = performance.now();
					var delta = ( time - prevTime ) / 1000;

					velocity.x -= velocity.x * 10.0 * delta;
					velocity.z -= velocity.z * 10.0 * delta;

					velocity.y -= 9.8 * 100.0 * delta; // 100.0 = mass

					if ( moveForward ) velocity.z -= 400.0 * delta;
					if ( moveBackward ) velocity.z += 400.0 * delta;

					if ( moveLeft ) velocity.x -= 400.0 * delta;
					if ( moveRight ) velocity.x += 400.0 * delta;

					//if ( isOnObject === true ) {
						velocity.y = Math.max( 0, velocity.y );

						canJump = true;
				//	}

					controls.getObject().translateX( velocity.x * delta );
					controls.getObject().translateY( velocity.y * delta );
					controls.getObject().translateZ( velocity.z * delta );

					if ( controls.getObject().position.y < 10 ) {

						velocity.y = 0;
						controls.getObject().position.y = 10;

						canJump = true;

					}

					prevTime = time;

				}
             // console.log(gema[0].position.x)
              render();
              requestAnimationFrame(animate);
                
            }
            function render(){
                
             

                renderer.render(escena,camera);
                
            }
        </script>
    </body>
</html>