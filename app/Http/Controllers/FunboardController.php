<?php

namespace App\Http\Controllers;

use App\Http\Requests\FunboardCreateRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Models\Funboard;
use Illuminate\Support\Facades\Auth;

class FunboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => [
            'index'
        ]]);
    }
    public function store(FunboardCreateRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 'pending';
        return response()->json(Funboard::create($data));
    }
    public function index()
    {
        return response()->json(Funboard::with('owner')->get());
    }
    public function updateStatus(UpdateStatusRequest $request, $id)
    {
        $funboard = Funboard::findOrFail($id);
        $this->authorize('updateStatus', $funboard);
        $data = $request->validated();
        $funboard->status = $data['status'];
        $funboard->save();
        return response()->json($funboard);
    }
    public function updateMessage(UpdateMessageRequest $request, $id)
    {
        $funboard = Funboard::findOrFail($id);
        $this->authorize('updateMessage', $funboard);
        $data = $request->validated();
        $funboard->message = $data['message'];
        $funboard->status = 'submitted';
        $funboard->save();
        return response()->json($funboard);
    }
}
