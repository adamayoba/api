<?php
namespace App\models;

/**
 * Modèle pour la table "task"
 */
class TaskModel extends Model
{
    protected $id;

    protected $user_id;

    protected $title;

    protected $description;

    protected $creation_date;

    protected $status;

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
     * Obtenir la valeur de user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Définir la valeur de user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Obtenir la valeur de title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Définir la valeur de title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Obtenir la valeur de description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Définir la valeur de description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Obtenir la valeur de creation_date
     */ 
    public function getCreation_date()
    {
        return $this->creation_date;
    }

    /**
     * Définir la valeur de creation_date
     *
     * @return  self
     */ 
    public function setCreation_date($creation_date)
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * Obtenir la valeur de status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Définir la valeur de status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}