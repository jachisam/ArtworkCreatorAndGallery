<?php
class Product extends Eloquent{
  public $timestamps  = false;
  protected $fillable = array('title','image');
}
 ?>
