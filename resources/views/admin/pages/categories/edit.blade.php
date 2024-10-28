@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('contents')
    <div>
        <main id="main" class="main">

            <x-breadcrumbs title="{{ __('Edit Kategori') }}" :items="[
                ['route' => 'home', 'label' => 'Home'],
                ['route' => 'categories', 'label' => 'Kategori'],
                ['label' => 'Edit Kategori'],
            ]" />

            <section class="section dashboard">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ __('Edit Kategori') }}</h5>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- Advanced Form Elements -->
                                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-floating mb-3">
                                        <input type="text" name="name" class="form-control" id="floatingInput"
                                            placeholder="name" value="{{ $category->name }}" required>
                                        <label for="floatingInput">{{ __('Category ') }}</label>
                                    </div>
                                    <hr>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="description" class="form-control" id="floatingInput"
                                            placeholder="description" value="{{ $category->description }}">
                                        <label for="floatingInput">{{ __('Description') }}</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                </form>
                                <!-- End General Form Elements -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>
    </div>
@endsection
