<?php
class Actor
{
    private $id;
    private $nombre;
    private $apellidos;
    private $fotografia;

    public function __construct($id,$nombre, $apellidos,$fotografia)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->fotografia = $fotografia;
    }
    public function __destruct()
    {
        echo "Eliminado: " . $this->nombre;
    }



    /**
     * Get the value of apellidos
     */
    public function getapellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */
    public function setapellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getnombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setnombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of fotografia
     */ 
    public function getfotografia()
    {
        return $this->fotografia;
    }

    /**
     * Set the value of fotografia
     *
     * @return  self
     */ 
    public function setfotografia($fotografia)
    {
        $this->fotografia = $fotografia;

        return $this;
    }
}
