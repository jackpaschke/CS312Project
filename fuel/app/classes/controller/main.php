<?php
class Controller_Main extends Controller_Template{
	
	public $template = 'maintemplate';

	public function action_index()
	{
		$this->template->title= 'Home Page';
        	$this->template->content=View::forge('m2/index');
		$this->template->css = "main.css";
	}

	public function action_about()
	{
		$this->template->title= 'About Page';
		$this->template->css = "about.css";
        $this->template->content=View::forge('m2/about');
	}

	public function action_color()
	{
	$this->template->title= 'Color Coordinate Generator';
	$this->template->css = "about.css";
    $this->template->content=View::forge('m2/color');
	}

	public function action_print()
	{
		return View::forge('m2/print');
	}
}
