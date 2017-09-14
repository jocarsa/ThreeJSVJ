function interfaceInit() { // cosas que se deben ejecutar una vez
    /*
    interfaceHead = new interfaceElement('image', 'interfaceHead', "head.png", 0, 0);
    interfaceHead = new interfaceElement('image', 'interfaceGround', "grass.png", 0, 1);
    interfaceHead = new interfaceElement('#ff0000', 'red', "nada", 1, 0);
    interfaceHead = new interfaceElement('#00ff00', 'green', "nada", 1, 1);
    interfaceHead = new interfaceElement('#0000ff', 'blue', "nada", 1, 2);
    */
}

function deleteInterface() { // cosas que deben suceder cuando ya no se necesite interfaz en el juego
    
}

function interfaceLoop() { // cosas que debe hacer la interfaz en el loop
    
}

function interfaceElement(type, name, source, x, y) { // declaracion de clase y constructor
    // en image hay que poner "imagen" en el caso de que sea una imagen, o el nombre del color en caso de que sea un div con background de un color
    this.name = name;
    this.source = source;
    this.width = window.innerWidth / 10;
    this.height = this.width;
    this.marginLeft = 10;
    this.marginTop = window.innerHeight / 10;
    this.x = x * this.width + this.marginLeft;
    this.y = y * this.height + this.marginTop;
    if(type == 'image') {
        $("#interface").append("<button class = 'jscolor {valueElement:\"chosen-value\", onFineChange:\"setGroundColor(this)\"}'  id = '" + this.name + "'style = 'background-image:url(assets/interface/"+this.source+"); background-size:cover; position:absolute; width:"+this.width+"px; height:"+this.height+"px; left:"+this.x+"px; top:"+this.y+"px; border: 1px solid black; background-color: #ffffff'></button>");
    } else {
        $("#interface").append("<button class = 'jscolor {valueElement:\"chosen-value\", onFineChange:\"setGroundColor(this)\"}'  id = '" + this.name + "' style = 'position:absolute; width:"+this.width+"px; height:"+this.height+"px; left:"+this.x+"px; top:"+this.y+"px; border: 1px solid black; background-color: "+type+"';></button>");
    }
}