<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;

class PostForm extends Component
{
  public $isModalOpen = false;

  public $title, $content;

  protected $rules = [
    'title'   => 'required|min:3|max:100|unique:posts',
    'content' => 'required|min:10',
  ];

  public function save()
  {
    $this->validate();

    $data = [
      'title'   => $this->title,
      'content' => $this->content
    ];

    Post::create($data);
    $this->emit('refreshParent');
    $this->emitTo('admin.post.postjt', 'render');
    $this->isModalOpen = false;
    $this->cleanVars();
  }

  public function cleanVars()
  {
    $this->title = null;
    $this->content = null;
  }

  public function render()
  {
    return view('admin.post.post-form');
  }

  public function closeModal()
  {
    $this->isModalOpen = false;
  }
}