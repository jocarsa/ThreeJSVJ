function Cubo(px,py,pz,wx,wy,wz) {
    that = this;
    that.geometry = new THREE.BoxGeometry( wx, wy, wz );
    that.material = new THREE.MeshBasicMaterial({color:0x00ff00});
    that.object = new THREE.Mesh(that.geometry, that.material);
    that.object.position.set(px, py, pz);
    that.object.rotation.x = Math.PI/4;
    that.object.rotation.y = Math.PI/4;
    scene.add(that.object);
}