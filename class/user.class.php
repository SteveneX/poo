<?php

class User
{
  private $id;
  private $pseudo;
  private $email;
  private $mdp;
  private $date_inscription;
  private $date_naissance;
  private $civilite;

  public function __construct($pseudo, $email, $mdp, $date_naissance, $civilite, $id = NULL, $date_inscription = NULL)
    {
      $this->setId($id);
      $this->setPseudo($pseudo);
      $this->setEmail($email);
      $this->setMdp($mdp);
      $this->setDate_inscription($date_inscription);
      $this->setDate_naissance($date_naissance);
      $this->setCivilite($civilite);
    }


    public function setId($id)
  	{
  		if(is_int($id)||$id == NULL)
  		{
  			$this->id = $id;
  		} else {
  			trigger_error('integer required', E_USER_ERROR);
  		}
  	}

    public function setMdp($mdp)
  	{
  		if(is_string($mdp))
  		{
  			$this->mdp = $mdp;
  		} else {
  			trigger_error('integer required', E_USER_ERROR);
  		}
  	}

    public function setPseudo($pseudo)
  	{
  		if(is_string($pseudo))
  		{
  			$this->pseudo = $pseudo;
  		} else {
  			trigger_error('integer required', E_USER_ERROR);
  		}
  	}

    public function setEmail($email)
  	{
  		if(is_string($email))
  		{
  			$this->email = $email;
  		} else {
  			trigger_error('string required', E_USER_ERROR);
  		}
  	}

    public function setDate_inscription($date_inscription)
  	{
  		if(is_string($date_inscription) ||$date_inscription == NULL)
  		{
  			$this->date_inscription = $date_inscription;
  		} else {
  			trigger_error('integer required', E_USER_ERROR);
  		}
  	}

    public function setDate_naissance($date_naissance)
  	{
  		if(is_string($date_naissance))
  		{
  			$this->date_naissance = $date_naissance;
  		} else {
  			trigger_error('integer required', E_USER_ERROR);
  		}
  	}

    public function setCivilite($civilite)
  	{
  		if(is_string($civilite))
  		{
  			$this->civilite = $civilite;
  		} else {
  			trigger_error('integer required', E_USER_ERROR);
  		}
  	}


    public function getId()
    {
      return $this->id;
    }
    public function getPseudo()
    {
      return $this->pseudo;
    }
    public function getEmail()
    {
      return $this->email;
    }
    public function getMdp()
    {
      return $this->mdp;
    }
    public function getDate_inscription()
    {
      return $this->date_inscription;
    }
    public function getDate_naissance()
    {
      return $this->date_naissance;
    }
    public function getCivilite()
    {
      return $this->civilite;
    }




    public function save()
    {
      if($this->id)
      {
        // $this->id != NULL -----> UPDATE
        Global $pdo;
        $pdo->exec("
          UPDATE users
          SET pseudo = '" .$this->pseudo. "',
              email = '" .$this->email. "',
              mdp = '" .$this->mdp. "',
              date_inscription = '" .$this->date_inscription. "',
              date_naissance = '" .$this->date_naissance. "',
              civilite = '" .$this->civilite. "'
          WHERE id = '" .$this->id. "'");
      } else {
        // $this->id = NULL ----> INSERT
        Global $pdo;
        $pdo->exec("INSERT INTO users (pseudo, email, mdp, date_inscription, date_naissance, civilite)
            VALUES('".$this->pseudo."', '".$this->email."', '".$this->mdp."', NOW(), '".$this->date_naissance."', '".$this->civilite."')");
        $this->setId(intval($pdo->lastInsertId()));
      }
    }
}
