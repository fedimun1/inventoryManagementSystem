<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\tenderregister;
//use Livewire\WithPagination

use WithPagination;
class TendersTable extends Component
{
	
    public function render()
    {
    	$tender=tenderregister::paginate(10);
        return view('livewire.tenders-table',compact('tender'));
    }
}
 