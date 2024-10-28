@extends('layouts.admin')

@section('title', 'Add New Plant Attribute')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs
        title="{{ __('Tambah Atribut Tanaman')}}"
        :items="[
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['route' => 'plantAttributes', 'label' => 'Atribut Tanaman'],
          ['label' => 'Tambah Atribut Tanaman']
        ]"
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('Tambahkan Atribut Tanaman')}}</h5>
                <p class="mb-3">{{__('Lengkapi form berikut untuk menambahkan atribut tanaman baru.')}}</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form for Creating Plant Attribute -->
                <form action="{{ route('plantAttributes.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="text" name="plant_code" class="form-control" id="plant_code" placeholder="Max 9 Characters" required>
                                <label for="plant_code">{{ __('Kode Tanaman') }}</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Tanaman" required>
                                <label for="name">{{ __('Nama Tanaman') }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="text" name="scientific_name" class="form-control" id="scientific_name" placeholder="Nama Ilmiah">
                                <label for="scientific_name">{{ __('Nama Ilmiah') }}</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <select name="type" class="form-select" id="type" required>
                                    <option value="" disabled selected>Pilih Tipe</option>
                                    <option value="Herbal">Herbal</option>
                                    <option value="Sayuran">Sayuran</option>
                                </select>
                                <label for="type">{{ __('Tipe Tanaman') }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <select name="category_id" class="form-select" id="category_id" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <label for="category_id">{{ __('Kategori') }}</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <select name="benefit_id" class="form-select" id="benefit_id" required>
                                    <option value="" disabled selected>Pilih Manfaat</option>
                                    @foreach ($benefits as $benefit)
                                        <option value="{{ $benefit->id }}">{{ $benefit->name }}</option>
                                    @endforeach
                                </select>
                                <label for="benefit_id">{{ __('Manfaat') }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea name="description" class="form-control" id="description" placeholder="Deskripsi Tanaman"></textarea>
                            <label for="description">{{ __('Deskripsi') }}</label>
                        </div>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <!-- End Form -->

              </div>
            </div>
          </div>
        </div>
      </section>

    </main>
  </div>
@endsection
