<?php

class TarjetaCredito {
    private $numeroTarjeta;
    private $contrasena;

    public function __construct($numeroTarjeta, $contrasena) {
        $this->numeroTarjeta = $numeroTarjeta;
        $this->contrasena = $contrasena;
    }

    public function verificarContrasena($contrasenaIngresada) {
        return $this->contrasena === $contrasenaIngresada;
    }
}

class CuentaBancaria {
    private $numeroCuenta;
    private $saldo;
    private $tarjetaCredito;

    public function __construct($numeroCuenta, $saldo, $tarjetaCredito) {
        $this->numeroCuenta = $numeroCuenta;
        $this->saldo = $saldo;
        $this->tarjetaCredito = $tarjetaCredito;
    }

    public function depositar($contrasena, $monto) {
        if ($this->tarjetaCredito->verificarContrasena($contrasena)) {
            $this->saldo += $monto;
            return "Depósito realizado. Nuevo saldo: $this->saldo";
        } else {
            return "Error: contraseña incorrecta. No se pudo realizar el depósito.";
        }
    }

    public function getNumeroCuenta() {
        return $this->numeroCuenta;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function obtenerInformacion() {
        return "Número de cuenta: $this->numeroCuenta, Saldo actual: $this->saldo";
    }
}

class Banco {
    private $cuentas = [];

    public function __construct() {
        // Inicializa la lista de cuentas
    }

    public function agregarCuenta($cuenta) {
        $this->cuentas[] = $cuenta;
    }

    public function realizarDepositoCuentaBancaria($numeroCuenta, $contrasena, $monto) {
        foreach ($this->cuentas as $cuenta) {
            if ($cuenta->getNumeroCuenta() === $numeroCuenta) {
                return $cuenta->depositar($contrasena, $monto);
            }
        }
        return "Error: La cuenta no existe.";
    }
}

// Crear instancias de las clases
$tarjeta1 = new TarjetaCredito("123456789", "contrasena1");
$tarjeta2 = new TarjetaCredito("987654321", "contrasena2");

$cuenta1 = new CuentaBancaria("001", 1000, $tarjeta1);
$cuenta2 = new CuentaBancaria("002", 500, $tarjeta2);

$banco = new Banco();
$banco->agregarCuenta($cuenta1);
$banco->agregarCuenta($cuenta2);

// Realizar depósitos y mostrar información actualizada de las cuentas
echo $banco->realizarDepositoCuentaBancaria("001", "contrasena1", 500) . "<br>";
echo $cuenta1->obtenerInformacion() . "<br>";

echo $banco->realizarDepositoCuentaBancaria("002", "contrasena2", 200) . "<br>";
echo $cuenta2->obtenerInformacion() . "<br>";

echo $banco->realizarDepositoCuentaBancaria("003", "contrasena", 100) . "<br>"; // Cuenta no existente

?>
