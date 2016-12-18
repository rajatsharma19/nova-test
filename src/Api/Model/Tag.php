<?php namespace Api\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

  protected $table = 'tags';
  public $timestamps = true;

  public function file_data() {
    return $this->belongsTo('Api\Model\FileData');
  }

}
