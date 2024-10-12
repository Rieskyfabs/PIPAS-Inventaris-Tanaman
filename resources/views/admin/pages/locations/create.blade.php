@extends('layouts.admin')

@section('title', 'Add New Location')

@section('contents')
    <div>
        <main id="main" class="main">

            <x-breadcrumbs title="{{ __('Add New Location') }}" :items="[
                ['route' => 'home', 'label' => 'Home'],
                ['route' => 'locations.index', 'label' => 'Locations'],
                ['label' => 'Add New Location'],
            ]" />

            <section class="section dashboard">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ __('Tambahkan Lokasi Baru') }}</h5>
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
                                <form action="{{ route('locations.store') }}" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="text" name="name" class="form-control" id="floatingInput"
                                            placeholder="name" required>
                                        <label for="floatingInput">{{ __('Nama Lokasi') }}</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
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
