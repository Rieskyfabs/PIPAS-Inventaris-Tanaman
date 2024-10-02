@extends('layouts.admin')

@section('title', 'Add New Plant')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="{{ __('Add New Plant')}}" 
        :items="[ 
          ['route' => 'home', 'label' => 'Home'], 
          ['route' => 'categories', 'label' => 'Categories'], 
          ['label' => 'Add New Category'] 
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('Tambahkan Category Baru')}}</h5>
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
                  <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name" required>
                        <label for="floatingInput">{{__('Category ')}}</label>
                    </div>
                    <hr>
                    <div class="form-floating mb-3">
                      <input type="text" name="description" class="form-control" id="floatingInput" placeholder="description">
                      <label for="floatingInput">{{__('Description')}}</label>
                  </div>
                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
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