@extends('layouts.admin')

@section('title', 'Edit Plant Attribute')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs
        title="{{ __('Edit Atribut Tanaman')}}"
        :items="[
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['route' => 'plantAttributes', 'label' => 'Atribut Tanaman'],
          ['label' => 'Edit Atribut Tanaman']
        ]"
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('Edit Atribut Tanaman')}}</h5>
                <p class="mb-3">{{__('Update informasi atribut tanaman berikut.')}}</p>

                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif

                <!-- Form for Editing Plant Attribute -->
                <form action="{{ route('plantAttributes.update', $plantAttribute->id) }}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-floating">
                        <input type="text" name="plant_code" class="form-control" id="plant_code" maxlength="9" value="{{ old('plant_code', $plantAttribute->plant_code) }}" required>
                        <label for="plant_code">{{ __('Kode Tanaman') }}</label>
                      </div>
                    </div>

                    <div class="col-md-6 mb-3">
                      <div class="form-floating">
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $plantAttribute->name) }}" required>
                        <label for="name">{{ __('Nama Tanaman') }}</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-floating">
                        <input type="text" name="scientific_name" class="form-control" id="scientific_name" value="{{ old('scientific_name', $plantAttribute->scientific_name) }}">
                        <label for="scientific_name">{{ __('Nama Ilmiah') }}</label>
                      </div>
                    </div>

                    <div class="col-md-6 mb-3">
                      <div class="form-floating">
                        <select name="type" class="form-select" id="type" required>
                          <option value="" disabled>Pilih Tipe</option>
                          <option value="Herbal" {{ $plantAttribute->type == 'Herbal' ? 'selected' : '' }}>Herbal</option>
                          <option value="Sayuran" {{ $plantAttribute->type == 'Sayuran' ? 'selected' : '' }}>Sayuran</option>
                        </select>
                        <label for="type">{{ __('Tipe Tanaman') }}</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-floating">
                        <select name="category_id" class="form-select" id="category_id" required>
                          <option value="" disabled>Pilih Kategori</option>
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $plantAttribute->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                          @endforeach
                        </select>
                        <label for="category_id">{{ __('Kategori') }}</label>
                      </div>
                    </div>

                    <div class="col-md-6 mb-3">
                      <div class="form-floating">
                        <select name="benefit_id" class="form-select" id="benefit_id" required>
                          <option value="" disabled>Pilih Manfaat</option>
                          @foreach ($benefits as $benefit)
                            <option value="{{ $benefit->id }}" {{ $plantAttribute->benefit_id == $benefit->id ? 'selected' : '' }}>{{ $benefit->name }}</option>
                          @endforeach
                        </select>
                        <label for="benefit_id">{{ __('Manfaat') }}</label>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <div class="form-floating">
                      <textarea name="description" class="form-control" id="description" placeholder="Deskripsi Tanaman">{{ old('description', $plantAttribute->description) }}</textarea>
                      <label for="description">{{ __('Deskripsi') }}</label>
                    </div>
                  </div>

                  <hr>
                  <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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
