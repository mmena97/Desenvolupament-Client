class Persona {

		constructor(nombre, oficio, disponibilidad, email){
			this.nombre=nombre;
			this.oficio=oficio;
			this.disponibilidad=disponibilidad;
			this.email=email;
		}

		datos(){
			return this.nombre+" - "+this.oficio+" - "+this.disponibilidad+" - "+this.email;
		}
		
}