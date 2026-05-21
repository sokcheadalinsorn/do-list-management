<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
 
class CompletedController extends Controller
{
   public function index(Request $request)
{
    $tasks = Task::where('status', 'completed') ->orderBy('created_at', 'desc') ->paginate(10);
    return view('completed.index', compact('tasks'));
}


}
 