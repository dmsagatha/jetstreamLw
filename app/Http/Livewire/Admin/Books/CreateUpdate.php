<?php

namespace App\Http\Livewire\Admin\Books;

use App\Models\Book;
use Livewire\Component;

class CreateUpdate extends Component
{
  public Book $book;
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

  public function mount()
  {
    $this->book = new Book();
  }

  public function save()
  {
    $this->validate();

    Book::create($this->book->toArray());

    $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');
    
    return redirect()->route('books.index');
  }

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }
}