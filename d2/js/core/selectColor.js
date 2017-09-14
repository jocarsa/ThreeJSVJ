function selectColorInit() {
    //$('#interfaceGround').addClass("jscolor {valueElement:'chosen-value', onFineChange:'setGroundColor(this)'}")
    $('#interfaceGround').on('click', function() {
        console.log('has hecho click en ground')
    })
    
}

function selectColorLoop() {
    
}

function setGroundColor(picker) {
    materialSuelo = null;
    materialSuelo = new THREE.MeshBasicMaterial({color:'#'+picker.toString()});
    plane.material = materialSuelo;
    console.log('hecho');
    plane = null;
    plane = plane = new Plane(0, -8, 0, 30, 30, materialSuelo);
}

function setCharacterColor(picker) {
    //setMaterial(dae, new THREE.MeshBasicMaterial({color:'#'+picker.toString()}));
    //console.log(personaje.material.color)
    var miColor = hexToRgb('#'+picker.toString());
    //console.log(personaje.material.color['r'])
    personaje.material.color['r'] = miColor.r
    personaje.material.color['g'] = miColor.g
    personaje.material.color['b'] = miColor.b
    
}

/*
var setMaterial = function(node, material) {
  node.material = material;
  if (node.children) {
    for (var i = 0; i < node.children.length; i++) {
      setMaterial(node.children[i], material);
    }
  }
}
*/

function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}