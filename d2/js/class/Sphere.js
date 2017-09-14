var background360 = THREE.ImageUtils.loadTexture("assets/img/fondo2.jpg");

function Sphere(px,py,pz,r,nh,nv) {
    that = this;
    that.geometry = new THREE.SphereGeometry( r, nh, nv ); // radio, separaciones verticales y separaciones horizontales
    that.material = new THREE.MeshBasicMaterial({map:background360});
    that.material.side = THREE.DoubleSide;
    that.object = new THREE.Mesh(that.geometry, that.material);
    that.object.position.set(px, py, pz);
    scene.add(that.object);
}