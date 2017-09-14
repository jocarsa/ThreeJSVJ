function Light (x, y, z) {
    this.object = new THREE.PointLight();
    this.object.position.set(x, y, z);
    scene.add(this.object);
    this.castShadows = true;
}