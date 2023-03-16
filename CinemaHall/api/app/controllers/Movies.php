<?php

class Movies extends Controller
{

  private $movieModel;

  public function __construct()
  {
    headerHelper();
    $this->movieModel = parent::model('Movie');
  }

  public function index()
  {
    getHelper();
    echo json_encode($this->movieModel->allMovies());
  }

  public function show($shown_at)
  {
    getHelper();
    if ($this->movieModel->singleMovie($shown_at)) {
      echo json_encode($this->movieModel->singleMovie($shown_at));
    } else {
      echo json_encode(["Unfound" => "Could not found any movie with id {$shown_at}"]);
    }
  }

  public function filter($show_at)
  {
    if ($this->movieModel->filter($show_at)) {
      echo json_encode($this->movieModel->filter($show_at));
    } else {
      echo json_encode(0);
    }
  }

  public function reserved_seats($shown_at)
  {
    if($this->movieModel->reserved_seats($shown_at))
    {
      echo json_encode($this->movieModel->reserved_seats($shown_at));
    }
  }
 }
