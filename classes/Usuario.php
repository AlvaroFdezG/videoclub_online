<?php
class Usuario
{
    private $id;
    private $userName;
    private $passWord;
    private $rol;

    public function __construct($id,$userName, $passWord,$rol)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->passWord = $passWord;
        $this->rol = $rol;
    }
    public function __destruct()
    {
        echo "Eliminado: " . $this->userName;
    }



    /**
     * Get the value of passWord
     */
    public function getPassWord()
    {
        return $this->passWord;
    }

    /**
     * Set the value of passWord
     *
     * @return  self
     */
    public function setPassWord($passWord)
    {
        $this->passWord = $passWord;

        return $this;
    }

    /**
     * Get the value of userName
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set the value of userName
     *
     * @return  self
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

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
     * Get the value of rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */ 
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }
}
