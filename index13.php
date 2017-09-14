<?php

    // Voy a crear un mtl personalizado
    $myfile = fopen("mtl/mimtl.mtl", "w") or die("Unable to open file!");
    $txt = '

        newmtl Material.001
        Ns 96.078431
        Ka 1.000000 1.000000 1.000000
        Kd '.$_GET['r'].' '.$_GET['g'].' '.$_GET['b'].'
        Ks 0.500000 0.500000 0.500000
        Ni 1.000000
        d 1.000000
        illum 2
        map_Kd mtl/madera.jpg
        
        newmtl Material.002
        Ns 96.078431
        Ka 0.000000 0.000000 0.000000
        Kd 0.002444 0.000880 0.640000
        Ks 1.00000 0.00000 0.00000
        Ni 1.000000
        d 1.000000
        illum 2
        map_Kd mtl/hierro.jpg
        
        newmtl Material.003
        Ns 96.078431
        Ka 0.000000 0.000000 0.000000
        Kd 0.009485 0.640000 0.053020
        Ks 0.500000 0.500000 0.500000
        Ni 1.000000
        d 1.000000
        illum 2
        map_Kd mtl/piedra.jpg
    ';
    fwrite($myfile, $txt);
    sleep(1);
?>
<html>
    <head>
        <script src="lib/three.min.js"></script>
        <script src="lib/CanvasRenderer.js"></script>
        <script src="lib/Projector.js"></script>
        <script src="lib/jquery-3.1.1.min.js"></script>
        <script src="lib/OBJLoader.js"></script>
        <script src="lib/MTLLoader.js"></script>
    </head>
    <body>
        <script>
            var angulo = 0;
            var posx = 0;
            var posz = 0;
            var posy = 0;
            //var mono = THREE.Mesh();
            init();
            animate();
            $(document).ready(function(){
             $(document).keydown(function(event){
                    console.log("tecla")
                    if ( event.which == 37 ) {
                         posx--;
                      }
                       if ( event.which == 39 ) {
                         posx++
                      }
                      if ( event.which == 38 ) {
                         posz++
                      }
                      if ( event.which == 40 ) {
                         posz--
                      }
                    
                })
            })
            function init(){
                // Dentro del documento, creo un elemento nuevo llamado div
               container = document.createElement("div");
               // Añado el contenedor al documento
               document.body.appendChild(container)
               // Creo una nueva camara YA en el mundo 3D
               camera = new THREE.PerspectiveCamera(70,1.3,1,1000);
               // Ahora le digo a la camara DONDE esta
               camera.position.x = 0;
               camera.position.y = 0;
               camera.position.z = 100;
               
               // Ahora quiero una escena 3D - La escena 3D es la que lo recoge todo
               escena = new THREE.Scene();
               /*////////////////////////////////////////////////////////*/
               // Ya tengo una camara en el mundo 3D.
               // Ahora quiero geometria
               cubo = new THREE.BoxGeometry(5,5,5);
               // Al cubo le quiero poner un material
               //material = new THREE.MeshBasicMaterial({color:0xff0000});
               material = new THREE.MeshPhongMaterial({color:0xff0000});
               
               micubo = new THREE.Mesh(cubo,material);
               micubo.position.x = 0;
               micubo.position.y = 0;
               micubo.position.z = 0;
               micubo.rotation.y = Math.PI/4
               escena.add(micubo);
                /*////////////////////////////////////////////////////////*/
                
                /*////////////////////////////////////////////////////////*/
               // Ya tengo una camara en el mundo 3D.
               // Ahora quiero geometria
               cubo2 = new THREE.BoxGeometry(200,10,200);
               // Al cubo le quiero poner un material
               //material = new THREE.MeshBasicMaterial({color:0xff0000});
               material2 = new THREE.MeshPhongMaterial({color:0x00ff00});
               
               micubo2 = new THREE.Mesh(cubo2,material2);
               micubo2.position.x = 0;
               micubo2.position.y = -45;
               micubo2.position.z = 0;
               micubo2.rotation.y = Math.PI/4
               escena.add(micubo2);
                /*////////////////////////////////////////////////////////*/
                
                 /*////////////////////////////////////////////////////////*/
               // Ya tengo una camara en el mundo 3D.
               // Ahora quiero geometria
               esfera = new THREE.SphereGeometry( 5, 32, 32 )
               // Al cubo le quiero poner un material
               //material = new THREE.MeshBasicMaterial({color:0xff0000});
               material3 = new THREE.MeshPhongMaterial({color:0x0000ff});
               
               miesfera = new THREE.Mesh(esfera,material3);
               miesfera.position.x = 0;
               miesfera.position.y = -35;
               miesfera.position.z = 0;
               miesfera.rotation.y = Math.PI/4
               escena.add(miesfera);
                /*////////////////////////////////////////////////////////*/
               
               /*/////////////AQUI VOY A IMPORTAR UNA LIBRERIA OBJ/////////////*/
               
                    var mtlLoader = new THREE.MTLLoader();
                    mtlLoader.load( 'mtl/mimtl.mtl', function( materials ) {

        					materials.preload();
        
        					var objLoader = new THREE.OBJLoader();
        					objLoader.setMaterials( materials );
        					
        					objLoader.load( 'mtl/objetos3.obj', function ( object ) {
        
        						//object.position.y = - 95;
        						object.scale.x = 10;
        						object.scale.y = 10;
        						object.scale.z = 10;
        						escena.add( object );
        						
        
        					}, onProgress, onError );
        
        				});
                    
                  
                   // Esto es algo que ejecutamos mientras se carga
                   function onProgress(){}
                   // Esto se lanza si hay algun error en la carga
                   function onError(){}
               /*/////////////AQUI VOY A IMPORTAR UNA LIBRERIA/////////////*/
               
              // Pues vale Elias, vamos a crear una luz
              luz = new THREE.PointLight( 0xffffff, 2, 1000 );
              luz.position.set( 100, 100, 100 );
                escena.add( luz );
              
               
               // De los renderizadores disponibles en Three, voy a usar uno que de momento no usa aceleración 3D
               //renderer = new THREE.CanvasRenderer();
               renderer = new THREE.WebGLRenderer();
               // El color de fondo es gris
               renderer.setClearColor(0xf0f0f0);
               // Pongo el pixel aspect ratio
               renderer.setPixelRatio(1);
               // Le digo el tamaño de la ventana
               renderer.setSize(800,600);
               // Añadimos el renderizador al HTML
               container.appendChild(renderer.domElement)
               
            }
            
            function animate(){
               //mono.rotation.x = angulo;
               //mono.rotation.y = angulo;
                miesfera.position.x = posx;
                miesfera.position.z = posz;
                // Cada vez que pases por aqui aumenta un poco el angulo
                angulo += 0.01;
                // Y ahora actualizame la rotación de la caja
                micubo.rotation.y = angulo;
                micubo.rotation.x = angulo;
                // Ejecuta animate de nuevo cuando puedas
                requestAnimationFrame(animate);
                // Ejecuta el render
                render();
            }
            function render(){
                // Esta es la linea que hace toda la magia
                renderer.render(escena,camera);
                
            }
        </script>
    </body>
</html>