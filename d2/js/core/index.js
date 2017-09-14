var animacionsaludando = "";
var animacionandando = "";
var animacionpatada = "";
var superloader = "";
var superdae =  "";
var animacionactual = "";
var animation = "";

$(document).ready(function () {
    init();
	$( document ).keypress(function( event ) {
		console.log("Has pulsado una tecla")
	  if ( event.which == 49 ) {
		   animation.stop();
		  animation = new THREE.Animation( superdae, animacionandando );
		  animation.play();	  
		 event.preventDefault();
	  }
	  if ( event.which == 50 ) {
		  animation.stop();
		  animation = new THREE.Animation( superdae, animacionsaludando );
		  animation.play();
		  
		  
		  
		 event.preventDefault();
	  }
	  if ( event.which == 51 ) {
		  animation.stop();
		  animation = new THREE.Animation( superdae, animacionpatada );
		  animation.play();
		  
		  
		  
		 event.preventDefault();
	  }
	  
	});
})

function init() {
    eventListeners();
    gameInitVariables();
    initGeometry();
    interfaceInit();
    initLights();
    statsInit();
    orbitControlsInit();
    ColladaInit(0xffffff);
    selectColorInit();
    render();
    temporizador = setTimeout(loop, 33);
}

function loop() {
    frameStart = Date.now();
    //console.log("frame");
    //////////////////////////////loop////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////loop////////////////////////////// //////////////////////////////loop//////////////////////////////

    statsLoop();
    render();
    orbitControlsLoop();
    colladaLoop();
    selectColorLoop();
    //////////////////////////////loop////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////loop////////////////////////////// //////////////////////////////loop//////////////////////////////
    frameEnd = Date.now();
    if(frameEnd - frameStart > 1000/fps) {
        clearTimeout(temporizador);
        temporizador = setTimeout(loop, 0);
    } else {
        clearTimeout(temporizador);
        temporizador = setTimeout(loop, 1000/fps - (frameEnd-frameStart));
    }
    //requestAnimationFrame(loop);
}

////////variables//////////////////////////////////////////////////////////////////////////////variables//////////////////////////variables//////////////////////////variables//////////////////////////variables//////////////////////////variables//////////////////
//variables de bucle
    var temporizador;
    var fps = 60;
        // variables para ajustar los fps
        var frameStart;
        var frameEnd;
// variables controles
var controls;
var controlMode = "orbit";

////////variables//////////////////////////////////////////////////////////////////////////////variables//////////////////////////variables//////////////////////////variables//////////////////////////variables//////////////////////////variables//////////////////