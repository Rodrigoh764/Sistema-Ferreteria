<?php

class Producto
{
    private $nombreProducto;
    private $categoria;
    private $marca;
    private $precio;
    private $stock;
    private $medida;
    private $descripcion;
    private $garantia;

    public function __construct($nombreProducto, $categoria, $marca, $precio, $stock, $medida, $descripcion, $garantia)
    {
        $this->nombreProducto = $nombreProducto;
        $this->categoria = $categoria;
        $this->marca = $marca;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->medida = $medida;
        $this->descripcion = $descripcion;
        $this->garantia = $garantia;
    }

    public function validaPrecio()
    {
        if ($this->getPrecio() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function validaStock()
    {
        if ($this->getStock() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function validaGarantia()
    {
        if ($this->getGarantia() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;
    }

    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setMedida($medida)
    {
        $this->medida = $medida;
    }

    public function getMedida()
    {
        return $this->medida;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setGarantia($garantia)
    {
        $this->garantia = $garantia;
    }

    public function getGarantia()
    {
        return $this->garantia;
    }
}
