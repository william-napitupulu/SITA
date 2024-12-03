<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('description', 'like', '%' . $search . '%');
        }

        // Sorting functionality
        $allowedSortColumns = ['id', 'description', 'created_at'];
        $sortColumn = $request->input('sort', 'id');
        $sortDirection = $request->input('direction', 'asc');

        if (!in_array($sortColumn, $allowedSortColumns)) {
            $sortColumn = 'id';
        }

        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'asc';
        }

        $query->orderBy($sortColumn, $sortDirection);

        // Pagination
        $galeris = $query->paginate(10);

        // AJAX response for live search/sorting
        if ($request->ajax()) {
            return response()->json([
                'data' => $galeris->items(),
                'pagination' => $galeris->appends(request()->except('page'))->links()->render(),
                'total' => $galeris->total(),
                'per_page' => $galeris->perPage(),
                'current_page' => $galeris->currentPage(),
                'sortColumn' => $sortColumn,
                'sortDirection' => $sortDirection,
            ]);
        }

        return view('informasi.galeri', compact('galeris', 'sortColumn', 'sortDirection'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['description']);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('galeri_photos', 'public');
        }

        if ($request->galeri_id) {
            // Update existing Galeri data
            $galeri = Galeri::findOrFail($request->galeri_id);

            if ($request->hasFile('photo') && $galeri->photo) {
                Storage::disk('public')->delete($galeri->photo);
            }

            $galeri->update($data);

            // Log update action
            $logMessage = "'" . Auth::user()->name . "' mengubah data Galeri '" . $galeri->description . "'pada bagian Informasi.";
            Log::create(['message' => $logMessage]);

            return redirect()->back()->with('success', 'Galeri updated successfully.');
        } else {
            // Create new Galeri data
            $galeri = Galeri::create($data);

            // Log add action
            $logMessage = "'" . Auth::user()->name . "' menambahkan data Galeri '" . $galeri->description . "'pada bagian Informasi.";
            Log::create(['message' => $logMessage]);

            return redirect()->back()->with('success', 'Galeri added successfully.');
        }
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return response()->json($galeri);
    }

    public function destroy($id)
    {
        if (!in_array(Auth::user()->role, ['Admin', 'Editor'])) {
            abort(403, 'Unauthorized action.');
        }

        $galeri = Galeri::findOrFail($id);
        $description = $galeri->description;

        if ($galeri->photo) {
            Storage::disk('public')->delete($galeri->photo);
        }

        $galeri->delete();

        // Log delete action
        $logMessage = "'" . Auth::user()->name . "' menghapus data Galeri '" . $description . "' pada bagian Informasi.";
        Log::create(['message' => $logMessage]);

        return redirect()->back()->with('success', 'Galeri item deleted successfully.');
    }
}
