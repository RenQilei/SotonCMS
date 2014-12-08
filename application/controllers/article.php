<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

	public function showarticle()
	{
		if($this->uri->segment(3)) {
			// get for the article
			$this->load->model('Article_model', 'article');
			$articleResult = $this->article->singlearticle($this->uri->segment(3)); //print_r($articleResult);
			$data['article'] = $articleResult[0];
			// get for the tags
			$this->load->model('Tag_model', 'tag');
			$tagResult = $this->tag->tagsForOneArticle($this->uri->segment(3));
			$data['tags'] = $tagResult;
		
			$this->load->vars($data);
		
			$this->load->view('shared/leftside');
			$this->load->view('article/single');
			$this->load->view('shared/footer');
		}
		else {
			echo 'FUCH YOU WRONG WAY! GET OUT IDIOT!';
		}
	}
}