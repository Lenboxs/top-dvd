<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TopTenMovie extends Pivot
{
	use \Rutorika\Sortable\SortableTrait;
	
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'topten_movie';
	
	protected static $sortableField = 'sort';
}