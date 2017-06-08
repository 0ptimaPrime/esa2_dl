<?php


class ToDoListe {

    public $name;


    public function __construct($name=""){

      $this->name = $name;

    }

    public function deleteListe() {
       }

    public function getListenname() {
          }

}


 // Klasse fuer einen ToDo-Datenbankeintrag
class ToDoEintrag {
  public $toDo;
  public $prio;
  public $kategorie;
  public $fertigstelldatum;
  public $notiz;
  public $liste;


  public function __construct($toDo="", $prio="", $kategorie="", $fertigstelldatum="", $notiz="", $liste=""){

    $this->toDo = $toDo;
    $this->kategorie = $kategorie;
    $this->prio = $prio;
    $this->fertigstelldatum = $fertigstelldatum;
    $this->notiz = $notiz;
    $this->liste = $liste;
  }

 public function deleteEintrag() {
    }

 public function updateEintrag() {
   }

}






?>
