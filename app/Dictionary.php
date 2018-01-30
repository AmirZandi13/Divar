<?php

namespace App;

use Baum\Node;

class Dictionary extends Node
{

	protected $table = 'dictionary';

	// 'parent_id' column name
	protected $parentColumn = 'parent_id';

	// 'lft' column name
	protected $leftColumn = 'lidx';

	// 'rgt' column name
	protected $rightColumn = 'ridx';

	// 'depth' column name
	protected $depthColumn = 'nesting';

	// guard attributes from mass-assignment
	protected $guarded = array('id', 'parent_id', 'lidx', 'ridx', 'nesting');
}
