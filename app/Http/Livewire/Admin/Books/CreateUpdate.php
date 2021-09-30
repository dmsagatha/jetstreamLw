<?php

namespace App\Http\Livewire\Admin\Books;

use App\Models\Book;
use Livewire\Component;

class CreateUpdate extends Component
{
  public $book = [];
  public $bookId;

  public function render()
  {
    return view('admin.books.createUpdate');
  }

  public function rules()
  {
    return [
      'book.name'   => 'required|string|min:4|unique:categories,name,' . $this->bookId,
      'book.author' => 'required|string',
      'book.pages'  => 'required|integer',
    ];
  }

  protected $messages = [
    'book.name.required'   => 'El nombre del libro es obligatorio',
    'book.author.required' => 'El autor es obligatorio.',
    'book.pages.required'  => 'El númeor de páginas es obligatorio.',
  ];

  public function save()
  {
    $this->validate();

    Book::create($this->book);

    $this->emit('alertCreate', 'Registro creado satisfactoriamente.');
    
    return redirect()->route('books.index');
  }





  // public Book $book;
  /* public $bookId;

  public function render()
  {
    return view('admin.books.createUpdate');
  } */

  /* public function rules()
  {
    return [
      'book.name'   => 'required|string|min:4|unique:categories,name,' . $this->bookId,
      'book.author' => 'required|string',
      'book.pages'  => 'required|integer',
    ];
  } */

  /* public function mount()
  {
    $this->book = new Book();
  } */

  /* public function save()
  {
    $this->validate();

    if (!is_null($this->bookId)) {
      $this->book->update($this->book->toArray());
      
      $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');
    } else {
      Book::create($this->book->toArray());

      $this->emit('alertCreate', 'Registro creado satisfactoriamente.');
    }

    $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');
    
    return redirect()->route('books.index');
  } */

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }
}