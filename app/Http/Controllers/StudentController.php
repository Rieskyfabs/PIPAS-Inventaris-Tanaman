<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log; // Tambahkan ini
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['rombel', 'rayon'])
            ->orderBy('created_at', 'desc')
            ->get();

        $rombels = Rombel::all();
        $rayons = Rayon::all();

        $title = 'Apakah anda yakin?';
        $text = "Aksi anda tidak akan bisa dikembalikan.";
        confirmDelete($title, $text);

        return view('admin.pages.students.index', compact('students', 'rombels', 'rayons'));
    }

    public function store(StoreStudentRequest $request)
    {
        try {
            // Menyimpan data siswa dengan email dan gender
            Student::create($request->all());

            ActivityLogger::log('create', 'Menambahkan data siswa baru dengan nama: ' . $request->name);
            Alert::success('Data Ditambahkan', 'Berhasil menambahkan data siswa!');
        } catch (QueryException $e) {
            Log::error('Student creation failed', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
            ]);

            Alert::error('Gagal Menambahkan Data', 'Terjadi kesalahan pada sistem: ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Unexpected error in student creation', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
            ]);

            Alert::error('Gagal Menambahkan Data', 'Kesalahan tidak terduga: ' . $e->getMessage());
        }

        return redirect()->route('student-data');
    }


    public function update(UpdateStudentRequest $request, $id)
    {
        try {
            // Temukan siswa berdasarkan ID
            $student = Student::findOrFail($id);

            // Update data siswa
            $student->update($request->all());

            ActivityLogger::log('update', 'Memperbarui data siswa dengan nama: ' . $request->name);
            Alert::success('Data Diperbarui', 'Berhasil memperbarui data siswa!');

            return redirect()->route('student-data');
        } catch (QueryException $e) {
            Log::error('Student update failed', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
            ]);

            Alert::error('Gagal Memperbarui Data', 'Terjadi kesalahan pada sistem: ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Unexpected error in student update', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
            ]);

            Alert::error('Gagal Memperbarui Data', 'Kesalahan tidak terduga: ' . $e->getMessage());
        }

        return redirect()->route('student-data');

    }

    public function destroy($id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();

            ActivityLogger::log('delete', 'Menghapus data siswa dengan nama: ' . $student->name);
            Alert::success('Data Terhapus', 'Berhasil menghapus data siswa.');
        } catch (QueryException $e) {
            Log::error('Student deletion failed', [
                'error' => $e->getMessage(),
                'student' => $id,
            ]);

            Alert::error('Gagal Menghapus Data', 'Terjadi kesalahan pada sistem: ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Unexpected error in student deletion', [
                'error' => $e->getMessage(),
                'student' => $id,
            ]);

            Alert::error('Gagal Menghapus Data', 'Kesalahan tidak terduga: ' . $e->getMessage());
        }

        return redirect()->route('student-data');
    }
}
