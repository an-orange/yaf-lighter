<?php
/*
 * @Author: 172999@gmail.com
 */
namespace App\Models;
use App\Models\EloquentModel;
use App\Models\ThemeRankModel;
class ThemeModel extends EloquentModel
{
	const SHOW_IN_THEME_CENTER = 1;
	protected $table = 'theme';

	public function rank() {
		return $this->hasOne('\App\Models\ThemeRankModel','theme_id', 'id');
	}
}