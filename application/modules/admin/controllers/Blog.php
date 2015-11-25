<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Admin_Controller {

	// Blog Posts
	public function post()
	{
		$crud = $this->crud->generate_crud('blog_posts');
		$crud->columns('author_id', 'category_id', 'title', 'tags', 'publish_time', 'status');
		$crud->set_relation('category_id', 'blog_categories', 'title');
		$crud->set_relation_n_n('tags', 'blog_post_tag_rel', 'blog_tags', 'post_id', 'tag_id', 'title');

		$crud->add_action('galeria', site_url('assets/grocery_crud/themes/flexigrid/css/images/add.png'), 'admin/blog/galeria','various fancybox.iframe');	
		
		$state = $crud->getState();
		if ($state==='add')
		{
			$crud->field_type('author_id', 'hidden', $this->mUser->id);
			$this->crud->unset_fields(array('status'));
		}
		else
		{
			$crud->set_relation('author_id', 'users', '{first_name} {last_name}');
		}

		$this->mTitle = 'Blog Posts';
		$this->mViewData['crud_data'] = $this->crud->render();
		$this->render('crud');
	}

	// Blog Categories
	public function category()
	{
		$crud = $this->crud->generate_crud('blog_categories');
		$crud->columns('title');
		$this->mTitle = 'Blog Categories';
		$this->mViewData['crud_note'] = btn('Sort Order', 'blog/category_sortable');
		$this->mViewData['crud_data'] = $this->crud->render();
		$this->render('crud');
	}
	
	// Blog Categories (Sort Order)
	public function category_sortable()
	{
		$this->load->library('sortable');
		$this->sortable->init('blog_category_model');
		$this->mViewData['content'] = $this->sortable->render('{title}', 'blog/category');
		$this->mTitle = 'Blog Categories';
		$this->render('general');
	}

	// Blog Tags
	public function tag()
	{
		$crud = $this->crud->generate_crud('blog_tags');
		$this->mTitle = 'Blog Tags';
		$this->mViewData['crud_data'] = $this->crud->render();
		$this->render('crud');
	}

	// Blog Image
	public function galeria($idPost)
	{
			   
		$crud= $this->crud->generate_image_crud('blog_images','url',UPLOAD_BLOG_POST,'priority','title');
		$crud->set_relation_field('post_id');
		$this->mTitle = 'Images Pots';
		
		$this->mViewData['crud_data'] = $crud->render();		
		
		$this->render('crud_img_box');

	}
}
