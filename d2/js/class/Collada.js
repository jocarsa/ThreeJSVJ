var clock = new THREE.Clock();
var personaje;


function ColladaInit(argcolor) {
	
	// Cargo la animacion de andar //////////////////////////////////////////////////////////////////////
	var loader2 = new THREE.ColladaLoader();
		loader2.load( "assets/models/cubeman2_andando.dae", function ( collada ) {			
			collada.scene.traverse( function ( child ) { // Vamos objeto a objeto
				if ( child instanceof THREE.SkinnedMesh ) {	// En este caso preguntamos si el objeto es una malla con piel				
					var animation = new THREE.Animation( child, child.geometry.animation );
					animation.play();
					animacionandando = child.geometry.animation ;
				}
			} );
		} );
		// Cargo la animacion de andar //////////////////////////////////////////////////////////////////////
		
		// Cargo la animacion de saludar //////////////////////////////////////////////////////////////////////
	var loader2 = new THREE.ColladaLoader();
		loader2.load( "assets/models/cubeman2_saludando.dae", function ( collada ) {			
			collada.scene.traverse( function ( child ) { // Vamos objeto a objet
				if ( child instanceof THREE.SkinnedMesh ) {	// En este caso preguntamos si el objeto es una malla con piel
					var animation = new THREE.Animation( child, child.geometry.animation );
					animation.play();
					animacionsaludando = child.geometry.animation ;
				}
			} );
		} );
		// Cargo la animacion de saludar //////////////////////////////////////////////////////////////////////
		
		// Cargo la animacion de saludar //////////////////////////////////////////////////////////////////////
	var loader2 = new THREE.ColladaLoader();
		loader2.load( "assets/models/cubeman2_patada.dae", function ( collada ) {			
			collada.scene.traverse( function ( child ) { // Vamos objeto a objet
				if ( child instanceof THREE.SkinnedMesh ) {	// En este caso preguntamos si el objeto es una malla con piel
					var animation = new THREE.Animation( child, child.geometry.animation );
					animation.play();
					animacionpatada = child.geometry.animation ;
				}
			} );
		} );
		// Cargo la animacion de saludar //////////////////////////////////////////////////////////////////////
	
	// Cargo la animacion por defecto //////////////////////////////////////////////////////////////////////
    superloader = new THREE.ColladaLoader();
		superloader.load( "assets/models/cubeman2_andando.dae", function ( collada ) {
				
			collada.scene.traverse( function ( child ) { // Vamos objeto a objeto

				if ( child instanceof THREE.SkinnedMesh ) {	// En este caso preguntamos si el objeto es una malla con piel
					superdae = child;
					personaje = child;	// Igualando el personajo al child
					child.rotation.x = - Math.PI /2
					//var animation = new THREE.Animation( child, child.geometry.animation );
					//var animation = animacion2
					animation = new THREE.Animation( child, animacionandando );
					//animacion1 = animation;
					//console.log(animacion2)
					animation.play();
					//animacionactual = animation;
					camera.lookAt( child.position );

				}

			} );
			
			collada.scene.castShadows = true;
			dae = collada.scene;
			if(argcolor != 0xffffff) {
				console.log(argColor);
				setMaterial(dae, new THREE.MeshBasicMaterial({color: argcolor}));
			}
			scene.add( dae );

		} );
	
}

function colladaLoop() {
  THREE.AnimationHandler.update( clock.getDelta()/4 );
  
}