@extends('layouts.frontend.page')

@section('content')
<section class="about aos-init aos-animate" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <img src="../assets/frontend/img/teamwork.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <h3>Fathforce Starter Kits Pro</h3>
          <p class="fst-italic">
            A web-based application with the Laravel 8 Framework that can be integrated with various android/ios mobile platforms. Fathforce Starter Kit aims to help companies, campuses, schools, students, freelancers, and the general public in building applications more effectively and efficiently.
          </p>
          <ul>
            <li><i class="bi bi-check2-circle"></i> Basic Blog CRUD</li>
            <li><i class="bi bi-check2-circle"></i> Gallery</li>
            <li><i class="bi bi-check2-circle"></i> Todo List</li>
            <li><i class="bi bi-check2-circle"></i> User Managemet</li>
            <li><i class="bi bi-check2-circle"></i> Open Source</li>

          </ul>
          <p>
            Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.
          </p>
        </div>
      </div>
    </div>
  </section>
@endsection
