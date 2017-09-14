// variables para stats
var stats;

// variables de la escena
var scene;
var camera;
var renderer;


function gameInitVariables() {
    container = document.createElement("div");
    document.body.appendChild(container);
    
    scene = new THREE.Scene();
    
    camera = new THREE.PerspectiveCamera(70, window.innerWidth / window.innerHeight, 1, 1000000);
    camera.position.x = 10;
    camera.position.z = 10;
    camera.position.y = 0;
    scene.add(camera);
    
    renderer = new THREE.WebGLRenderer();
    renderer.setClearColor(0xffffff); // color de fondo blanco
    renderer.setPixelRatio(window.devicePixelRatio); // Pongo el pixel aspect ratio
    renderer.setSize(window.innerWidth, window.innerHeight); // Le digo el tamaño de la ventana
    container.appendChild(renderer.domElement);
}

function render() {
    renderer.render(scene, camera);
}

function initGeometry() {
    //cubo = new Cubo(0,0,0,5,5,5);
    sphere = new Sphere(0, 0, 0, 1000, 100, 100);
    materialSuelo = new THREE.MeshBasicMaterial({color:0x0000ff});
    plane = new Plane(0, -8, 0, 30, 30, materialSuelo);
}

function initLights() {
    pointLight = new Light(10, 10, 10);
}

function statsInit() {
    stats = new Stats();
	container.appendChild( stats.dom );
}

function statsLoop() {
    
	stats.update();
}

function changeControls() {
    if(controlMode == "fps"){
        document.pointerLockElement = null;
        controlMode = "orbit";
        orbitControlsInit();
        //fpsControls = null;
    } else {
        controlMode = "fps";
        $("#blocker").show();
        fpsControlsInit();
        myOrbitControls = null;
    }
}

function eventListeners() {
    $(document).on('keydown', function(event){
        if(event.which == 27) {
            event.preventDefault();
            centerCamera();
        }
    });
}

function centerCamera() {
    myOrbitControls.reset();
}