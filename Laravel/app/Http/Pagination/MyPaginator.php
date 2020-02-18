<?php
namespace App\Http\Pagination;
use Illuminate\Contracts\Pagination\Paginator;

class MyPaginator{
	private $paginator;

	public function __construct(Paginator $paginator){
		$this->paginator = $paginator;
	}

	public function link(){
		$prev = $this->paginator->currentPage() 1 ? ' disabled : ';

	}
}
