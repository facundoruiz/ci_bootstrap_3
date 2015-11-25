<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {

	public function index()
	{
		$this->load->model('user_model', 'users');
		$this->load->model('blog_post_model', 'blog_posts');
		$this->mViewData['count'] = array(
<<<<<<< HEAD
			'users' => $this->users->count_all(),
=======
			'users'				=> $this->users->count_all(),
			'blog_posts'		=> $this->blog_posts->count_all(),
>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
		);
		$this->render('home');
	}
}
