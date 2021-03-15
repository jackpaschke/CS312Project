<?php
class Controller_Main extends Controller_Template{

	public $template = 'maintemplate';

	public function action_index()
	{
        	$this->template->content=View::forge('m1/index');
	}
	public function action_about()
	{
		$this->template->content=View::forge('m1/index/about');
	}
}

