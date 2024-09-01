@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Students" 
        :items="[
            ['route' => 'home', 'label' => 'Home'],
            ['label' => 'Students']
        ]" 
      />

      <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Data Siswa</h5>
                <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p>

                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>Nis</th>
                      <th>
                        <b>N</b>ame
                      </th>
                      <th>Email</th>
                      <th>Rayon</th>
                      <th>Rombel</th>
                      <th>Gender</th>
                      {{-- <th data-type="date" data-format="YYYY/DD/MM">Start Date</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>12209261</td>
                      <td>Riesky Fabiansyah</td>
                      <td>rieskyfabs@gmail.com</td>
                      <td>Sukasari-1</td>
                      <td>PPLG XII - 3</td>
                      <td>Laki-Laki</td>
                    </tr>
                    <tr>
                      <td>12209671</td>
                      <td>Daffy Fauzan</td>
                      <td>daffy@gmail.com</td>
                      <td>Sukasari-3</td>
                      <td>PPLG XII - 1</td>
                      <td>Laki-Laki</td>
                    </tr>
                    <tr>
                      <td>12209876</td>
                      <td>Sultan Said</td>
                      <td>sultan@gmail.com</td>
                      <td>Sukasari-3</td>
                      <td>PPLG XII - 1</td>
                      <td>Laki-Laki</td>
                    </tr>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
@endsection