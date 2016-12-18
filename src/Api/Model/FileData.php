<?php namespace Api\Model;

use Illuminate\Database\Eloquent\Model;

class FileData extends Model {

  protected $table = 'file_data';
  public $timestamps = true;

  protected $casts = [
    'is_complete' => 'boolean',
  ];

  public function tags() {
    $this->hasMany('Api\Model\Tag');
  }

}
