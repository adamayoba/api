<?php
namespace App\Models;

/**
 * Modèle pour la table "user"
 */
class UserModel extends Model
{
    protected $id;

    protected $name;

    protected $email;


    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '',__CLASS__);
        $this->table = strtolower(str_replace("Model", '',$class));
    }

    /**
     * Obtenir la valeur de id
     */ 
    public function getId():int
    {
        return $this->id;
    }

    /**
     * Définir la valeur de id
     *
     * @return  self
     */ 
    public function setId(int $id):self
    {
        $this->id = $id;

        return $this;
    }



    /**
     * Obtenir la valeur du name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Définir la valeur du name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Obtenir la valeur de email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Définir la valeur de email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}