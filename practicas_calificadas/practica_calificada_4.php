<?php

class Estudiante {
    public $nombre;
    public $edad;
    public $curso;

    public function __construct($nombre, $edad, $curso) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->curso = $curso;
    }

    public function obtenerInformacion() {
        return "Nombre: $this->nombre, Edad: $this->edad, Curso: $this->curso";
    }

    public function cambiarCurso($nuevoCurso) {
        $this->curso = $nuevoCurso;
        return "El curso ha sido cambiado a $this->curso";
    }
}

// Crear una instancia de la clase Estudiante
$ana = new Estudiante("Ana García", 20, "Ingeniería");

// Mostrar la información del estudiante utilizando el método obtenerInformacion
echo $ana->obtenerInformacion() . "<br>";

// Cambiar el curso del estudiante a "Ciencias de la Computación"
echo $ana->cambiarCurso("Ciencias de la Computación") . "<br>";

// Mostrar la información actualizada del estudiante
echo $ana->obtenerInformacion();
?>
