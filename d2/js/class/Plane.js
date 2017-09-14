function Plane(px,py,pz,wx,wz,material) {
    that = this;
    that.geometry = new THREE.PlaneGeometry( wx, wz, 1, 1 );
    that.material = material;
    that.object = new THREE.Mesh(that.geometry, that.material);
    that.object.rotation.x = -Math.PI / 2;
    that.object.position.set(px, py, pz);
    this.receiveShadows = true;
    scene.add(that.object);
}