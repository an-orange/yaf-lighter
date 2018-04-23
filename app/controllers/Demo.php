<?php
/*
 * @Author: 172999@gmail.com
 */
use Yaf\Application;
use App\Models\ThemeModel;

class DemoController extends BaseController
{
	public function dbAction() {
		$offset = 0;
		$data = ThemeModel::selectRaw("theme.*")
		->leftJoin('theme_rank','theme.id', '=', 'theme_rank.theme_id')
		->where('theme_store', '=', ThemeModel::SHOW_IN_THEME_CENTER)
		->skip($offset)
		->limit(10)
		->orderBy('rank','desc')
		->orderBy('lastest_downloads', 'desc')
		->orderBy('created_at', 'desc')
		->get()
		->toArray();
		$this->response(['data' => $data]);
	}
}