 var angulo = 0;
            var posx = 0;
            var posz = 0;
            var posy = 0;
          
            init();
            animate();
            $(document).ready(function(){
             $(document).keydown(function(event){
                    console.log("tecla")
                    if ( event.which == 37 ) {
                         posx--;
                      }
                       if ( event.which == 39 ) {
                         posx++;
                      }
                      if ( event.which == 38 ) {
                         posz++;
                      }
                      if ( event.which == 40 ) {
                         posz--;
                      }
                    
                })
            })
            function init(){
               container = document.createElement("div");
               document.body.appendChild(container);
               camera = new THREE.PerspectiveCamera(70,1.3,1,1000);
               camera.position.x = 0;
               camera.position.y = 0;
               camera.position.z = 100;
               
               escena = new THREE.Scene();
               cubo = new THREE.BoxGeometry(5,5,5);
               material = new THREE.MeshPhongMaterial({color:0xff0000});
               
               micubo = new THREE.Mesh(cubo,material);
               micubo.position.x = 0;
               micubo.position.y = 0;
               micubo.position.z = 0;
               micubo.rotation.y = Math.PI/4;
               escena.add(micubo);


               cubo2 = new THREE.BoxGeometry(200,10,200);

               material2 = new THREE.MeshPhongMaterial({color:0x00ff00});
               
               micubo2 = new THREE.Mesh(cubo2,material2);
               micubo2.position.x = 0;
               micubo2.position.y = -45;
               micubo2.position.z = 0;
               micubo2.rotation.y = Math.PI/4;
               escena.add(micubo2);

               esfera = new THREE.SphereGeometry( 5, 32, 32 );

               material3 = new THREE.MeshPhongMaterial({color:0x0000ff});
               
               miesfera = new THREE.Mesh(esfera,material3);
               miesfera.position.x = 0;
               miesfera.position.y = -35;
               miesfera.position.z = 0;
               miesfera.rotation.y = Math.PI/4;
               escena.add(miesfera);

                   var manager = new THREE.LoadingManager();

                   material4 = new THREE.MeshPhongMaterial({color:0xffffff});

                   var loader = new THREE.OBJLoader(manager);

                   loader.load("modelos/suzanne.obj",function(object){
                       object.traverse( function ( child ) {
    						if ( child instanceof THREE.Mesh ) {

    							child.material = material4;
    						}
    					} );

    					
    					object.position.x = 0;
    					object.position.y = -20;
    					object.position.z = 0;
    					object.scale.x = 10;
    					object.scale.y = 10;
    					object.scale.z = 10;
    					mono = object;
 
    					escena.add(mono);
                   },onProgress,onError);

                   function onProgress(){}

                   function onError(){}

               

              luz = new THREE.PointLight( 0xffffff, 2, 1000 );
              luz.position.set( 100, 100, 100 );
                escena.add( luz );
              

               renderer = new THREE.WebGLRenderer();

               renderer.setClearColor(0xf0f0f0);

               renderer.setPixelRatio(1);

               renderer.setSize(800,600);

               container.appendChild(renderer.domElement);
               
            }
            
            function animate(){

                miesfera.position.x = posx;
                miesfera.position.z = posz;

                angulo += 0.01;

                micubo.rotation.y = angulo;
                micubo.rotation.x = angulo;

                requestAnimationFrame(animate);

                render();
            }
            function render(){

                renderer.render(escena,camera);
                
            }