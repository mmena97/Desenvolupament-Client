class Persona {

		constructor(nombre, oficio, disponibilidad, email){
			this.nombre=nombre;
			this.oficio=oficio;
			this.disponibilidad=disponibilidad+"h";
			this.email=email;
		}

		datos(){
			return this.nombre+" - "+this.oficio+" - "+this.disponibilidad+" - "+this.email;
		}

}
