<?php

namespace App\Http\Controllers;

use App\Requests\AddPetRequest;
use App\Requests\EditPetRequest;
use App\Requests\PostPetRequest;
use App\Requests\UploadRequest;
use App\Services\PetService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PetController extends Controller
{
    public function __construct(
        protected AddPetRequest $addPetRequest,
        protected UploadRequest $uploadRequest,
        protected PetService $petService,
        protected EditPetRequest $editPetRequest,
        protected PostPetRequest $postPetRequest,
    )
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tab = 'create';
        $title = 'pet-create';
        return view('pet.index', compact('tab', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $tab, string $title)
    {
        return view('pet.index', compact('tab', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate($this->addPetRequest->rules());

            $name = $this->petService->addPet($validatedData);

            return redirect()->back()->with(['success' => 'Pet '.$name.' added successfully! ']);
        } catch (Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            if (!is_numeric($id)) {
                throw new Exception('Failed find');
            }

            return $this->petService->show($id);
        } catch (Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (is_numeric($request->input('id'))) {
            $request->merge(['id' => intval($request->input('id'))]);
        }
        try {
            $validatedData = $request->validate($this->editPetRequest->rules());

            $name = $this->petService->editPet($validatedData, $id);

            return response()->json(['message' => 'Pet '.$name.' update']);

        } catch (Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            if (!is_numeric($id)) {
                throw new Exception('Failed find');
            }

            return $this->petService->delete($id);
        } catch (Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    public function uploadImage(Request $request)
    {
        try {
            $validatedData = $request->validate($this->uploadRequest->rules());

            $this->petService->uploadImage($validatedData);

            return redirect()->back()->with(['success' => 'Image added successfully! ']);
        } catch (Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

        public function findByStatus(Request $request)
    {
        try {
            $validatedData = $request->validate(['status' => 'required|array']);

            $data = $this->petService->findByStatus($validatedData['status']);

            return view('pet.status', ['data' => $data]);
        } catch (Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    public function postDataPet(Request $request)
    {
        if (is_numeric($request->input('id'))) {
            $request->merge(['id' => intval($request->input('id'))]);
        }

        try {
            $validatedData = $request->validate($this->postPetRequest->rules());

            $this->petService->postPet($validatedData);

            return redirect()->back()->with(['success' => 'Pet update successfully! ']);
        } catch (Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
}
