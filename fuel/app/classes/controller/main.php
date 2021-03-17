<?php
class Controller_Main extends Controller_Template{
	
	public $template = 'maintemplate';

	public function action_index()
	{
		$this->template->title= 'Home Page';
        	$this->template->content=View::forge('m1/index');
		$this->template->css = "main.css";
		//return Response::forge(View::forge('m1/index'));
	}

	public function action_about()
	{
		$this->template->title= 'About Page';
        	$this->template->content=View::forge('m1/index/about');
		$this->template->css = "about.css";
	}
}
