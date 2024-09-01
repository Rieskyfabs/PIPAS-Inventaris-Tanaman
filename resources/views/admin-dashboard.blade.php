@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Admin Dashboard" 
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
                <h5 class="card-title">Card</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores neque ratione labore tenetur quis eveniet quidem earum id expedita, veniam obcaecati accusamus ex ipsa nesciunt temporibus ipsam, nemo voluptates atque   .</p>
              </div>
            </div>

          </div>

          <div class="col-lg-6">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Card</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta perspiciatis, dolorum molestiae amet beatae ullam quos delectus aspernatur, autem voluptatum, optio enim perferendis illum magnam esse maxime possimus qui minus?.</p>
              </div>
            </div>

          </div>
        </div>
      </section>

    </main>
  </div>
@endsection