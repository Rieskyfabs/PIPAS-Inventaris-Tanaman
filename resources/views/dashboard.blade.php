@extends('layouts.user')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="User Dashboard" 
        :items="[
            ['route' => 'home', 'label' => 'Home'],
            ['label' => 'Dashboard']
        ]" 
      />

      <section class="section">
        <div class="row">
          <div class="col-lg-6">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Example Card</h5>
                <p>This is an examle page with no contrnt. You can use it as a starter for your custom pages.</p>
              </div>
            </div>

          </div>

          <div class="col-lg-6">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Example Card</h5>
                <p>This is an examle page with no contrnt. You can use it as a starter for your custom pages.</p>
              </div>
            </div>

          </div>
        </div>
      </section>

    </main>
  </div>
@endsection