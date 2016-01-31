<?php namespace App\Http\Controllers\Core;

use App\Http\Controllers\controller;
use Illuminate\Http\Request;

class TemplateController extends Controller {

	public function __construct()
	{

	}

	public function getIndex(Request $request)
	{
		$page = (!is_null ($request->get ('show')) ? $request->get ('show') : '');
		switch ($page)
		{

			case 'typography':
				$tmp = 'core/template/Typography';
				break;

			case 'icon-moon':
				$tmp = 'core/template/Iconmoon';
				break;

			case 'forms':
				$tmp = 'core/template/Forms';
				break;

			case 'tables':
				$tmp = 'core/template/Tables';
				break;

			case 'panel':
				$tmp = 'core/template/Panel';
				break;

			case 'grid':
				$tmp = 'core/template/Grid';
				break;

			case 'icons':
				$tmp = 'core/template/Icons';
				break;

			default:
				$tmp = 'core/template/Index';
				break;
		}


		$this->data = array(
			'pageTitle'    => 'Templates',
			'pageNote'     => 'Elements for template',
			'pageMeta'     => 'MetaKeys',
			'pageMetadesc' => 'Description',
			'page'         => $page

		);

		return view ($tmp, $this->data);

	}


}