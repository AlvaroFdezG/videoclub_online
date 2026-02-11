<?php
class Pelicula
{
    private $id;
    private $titulo;
    private $genero;
    private $pais;
    private $anyo;
    private $cartel;
    private $reparto;

    public function __construct($id, $titulo, $genero, $pais, $anyo, $cartel)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->pais = $pais;
        $this->anyo = $anyo;
        $this->cartel = $cartel;
    }

    public function getReparto()
    {
        return $this->reparto;
    }

    public function setReparto($reparto)
    {
        $this->reparto = $reparto;
    }

    public function addReparto(Actor $actor)
    {
        $this->reparto[] = $actor;
    }

    /**
     * Get the value of genero
     */
    public function getgenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */
    public function setgenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of titulo
     */
    public function gettitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */
    public function settitulo($titulo)
    {
        $this->titulo = $titulo;

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
     * Get the value of pais
     */
    public function getpais()
    {
        return $this->pais;
    }

    /**
     * Set the value of pais
     *
     * @return  self
     */
    public function setpais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get the value of anyo
     */
    public function getAnyo()
    {
        return $this->anyo;
    }

    /**
     * Set the value of anyo
     *
     * @return  self
     */
    public function setAnyo($anyo)
    {
        $this->anyo = $anyo;

        return $this;
    }

    /**
     * Get the value of cartel
     */
    public function getCartel()
    {
        return $this->cartel;
    }

    /**
     * Set the value of cartel
     *
     * @return  self
     */
    public function setCartel($cartel)
    {
        $this->cartel = $cartel;

        return $this;
    }
}
