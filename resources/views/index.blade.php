<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Clinique Santé Plus Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  
  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center me-auto">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src=""('/img/logo.png" alt=""> -->
          <h1 class="sitename">Clinique Santé Plus</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">Home<br></a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#departments">Departments</a></li>
            <li><a href="#doctors">Doctors</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="cta-btn d-none d-sm-block" href="{{ route('appointments.create')}}">Make an Appointment</a>

      </div>

    </div>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <img src="{{ asset('/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

      <div class="container position-relative">

        <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
          <h2>WELCOME TO Clinique Santé Plus</h2>
          <p>We are team of talented designers making websites with Bootstrap</p>
        </div><!-- End Welcome -->

        <div class="content row gy-4">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
              <h3>Why Choose Clinique Santé Plus?</h3>
              <p>
                La Clinique Santé Plus offre une gamme complète de services médicaux dans un environnement moderne et accueillant. 
                Notre équipe de spécialistes couvre plusieurs domaines tels que la cardiologie, la pédiatrie, la dermatologie, la gynécologie et la chirurgie générale. 
                Nous mettons un point d’honneur à offrir des soins de qualité, basés sur l’écoute, le professionnalisme et le respect du patient. 
                Grâce à nos équipements de dernière génération, nous assurons un suivi précis et personnalisé pour chaque cas.
              </p>
              <div class="text-center">
                <a href="#about" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="d-flex flex-column justify-content-center">
              <div class="row gy-4">

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                    <i class="bi bi-clipboard-data"></i>
                    <h4>Corporis voluptates officia eiusmod</h4>
                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                  </div>
                </div><!-- End Icon Box -->

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                    <i class="bi bi-gem"></i>
                    <h4>Ullamco laboris ladore pan</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                  </div>
                </div><!-- End Icon Box -->

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                    <i class="bi bi-inboxes"></i>
                    <h4>Labore consequatur incidid dolore</h4>
                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                  </div>
                </div><!-- End Icon Box -->

              </div>
            </div>
          </div>
        </div><!-- End  Content-->

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4 gx-5">

          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset('/img/about.jpg') }}" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
          </div>

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>À propos de nous</h3>
            <p>
            La Clinique Santé Plus est un centre médical moderne dédié à offrir des soins complets et de haute qualité à ses patients. 
            Notre mission est d’assurer une prise en charge efficace et humaine, dans un cadre confortable et bien équipé. 
            Grâce à une équipe multidisciplinaire composée de médecins expérimentés, nous couvrons plusieurs spécialités médicales telles que la cardiologie, 
            la pédiatrie, la dermatologie, la gynécologie et la chirurgie générale.
            </p>
            <ul>
              <li>
                <i class="fa-solid fa-vial-circle-check"></i>
                <div>
                  <h5>Services médicaux complets</h5>
                  <p>
                    Nous offrons une gamme variée de soins, de la consultation générale aux interventions spécialisées, avec un suivi attentif et personnalisé.
                  </p>
                </div>
              </li>
              <li>
                <i class="fa-solid fa-pump-medical"></i>
                <div>
                  <h5>Équipements modernes</h5>
                  <p>
                    Notre clinique dispose d’appareils de diagnostic et de traitement à la pointe de la technologie, garantissant des résultats précis et rapides.
                  </p>
                </div>
              </li>
              <li>
                <i class="fa-solid fa-heart-circle-xmark"></i>
                <div>
                  <h5>Équipe dévouée et professionnelle</h5>
                  <p>
                    Nos médecins et infirmiers mettent l’humain au centre de leurs priorités, assurant des soins empreints d’écoute, de respect et de bienveillance.
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="fa-solid fa-user-doctor"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="{{$doctorsCount}}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Doctors</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="fa-regular fa-hospital"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="{{$specialitiesCount}}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Departments</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="fas fa-flask"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
              <p>Research Labs</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="fas fa-award"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter"></span>
              <p>Awards</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Nos Services</h2>
        <p>Découvrez les soins et services médicaux que nous offrons à nos patients avec professionnalisme et bienveillance.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-stethoscope"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Consultations médicales</h3>
              </a>
              <p>Des consultations générales et spécialisées assurées par nos médecins qualifiés dans un environnement moderne et accueillant.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-heartbeat"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Cardiologie</h3>
              </a>
              <p>Un suivi complet pour les maladies cardiovasculaires, incluant dépistage, diagnostic et prévention des troubles du cœur.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-user-md"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Pédiatrie</h3>
              </a>
              <p>Des soins attentionnés et adaptés pour vos enfants, de la naissance à l’adolescence, avec un suivi personnalisé.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-female"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Gynécologie</h3>
              </a>
              <p>Des consultations et examens pour la santé féminine, la maternité, et le suivi prénatal dans un cadre discret et rassurant.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-eye"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Ophtalmologie</h3>
              </a>
              <p>Examens de la vue, traitement des maladies oculaires et suivi post-opératoire par des spécialistes expérimentés.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-vials"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Analyses médicales</h3>
              </a>
              <p>Un laboratoire équipé pour effectuer des analyses fiables et rapides afin d’assurer un diagnostic précis et efficace.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

<!-- Departments Section -->
    <section id="departments" class="departments section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Départements</h2>
    <p>Découvrez nos principaux services médicaux, chacun dédié à offrir les meilleurs soins selon la spécialité.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row">
      <div class="col-lg-3">
        <ul class="nav nav-tabs flex-column">
          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" href="#departments-tab-1">Cardiologie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-2">Dermatologie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-3">Pédiatrie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-4">Ophtalmologie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-5">Gynécologie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-6">Neurologie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-7">Dentisterie</a>
          </li>
        </ul>
      </div>

      <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="tab-content">

          <!-- Cardiologie -->
          <div class="tab-pane active show" id="departments-tab-1">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Cardiologie</h3>
                <p class="fst-italic">La cardiologie traite les maladies du cœur et des vaisseaux sanguins.</p>
                <p>Nos cardiologues spécialisés assurent la prévention, le diagnostic et le traitement des pathologies cardiovasculaires, avec un suivi attentif et des technologies de pointe pour préserver votre santé cardiaque.</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="{{ asset('/img/departments-1.jpg') }}" alt="Cardiologie" class="img-fluid">
              </div>
            </div>
          </div>

          <!-- Dermatologie -->
          <div class="tab-pane" id="departments-tab-2">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Dermatologie</h3>
                <p class="fst-italic">Spécialisée dans les soins de la peau, des cheveux et des ongles.</p>
                <p>Nos dermatologues offrent des traitements pour les affections cutanées courantes et complexes, ainsi que des soins esthétiques et préventifs adaptés à chaque type de peau.</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="{{ asset('/img/dermatologue.jpg') }}" alt="Dermatologie" class="img-fluid">
              </div>
            </div>
          </div>

          <!-- Pédiatrie -->
          <div class="tab-pane" id="departments-tab-3">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Pédiatrie</h3>
                <p class="fst-italic">La pédiatrie veille à la santé des enfants, de la naissance à l’adolescence.</p>
                <p>Nos pédiatres accompagnent les jeunes patients avec douceur et expertise, en assurant un suivi global de leur croissance et de leur bien-être.</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="{{ asset('/img/pediatre.jpg') }}" alt="Pédiatrie" class="img-fluid">
              </div>
            </div>
          </div>

          <!-- Ophtalmologie -->
          <div class="tab-pane" id="departments-tab-4">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Ophtalmologie</h3>
                <p class="fst-italic">L’ophtalmologie traite les maladies et troubles de la vision.</p>
                <p>Nos spécialistes prennent en charge la correction visuelle, les maladies oculaires et la chirurgie de la vue, en utilisant des équipements de dernière génération.</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="{{ asset('/img/Ophtalmologie.jpg') }}" alt="Ophtalmologie" class="img-fluid">
              </div>
            </div>
          </div>

          <!-- Gynécologie -->
          <div class="tab-pane" id="departments-tab-5">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Gynécologie</h3>
                <p class="fst-italic">La gynécologie est dédiée à la santé de la femme à chaque étape de sa vie.</p>
                <p>Nos gynécologues assurent le suivi médical, la prévention et le traitement des affections féminines, avec une approche bienveillante et professionnelle.</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="{{ asset('/img/gynecologie.jpg') }}" alt="Gynécologie" class="img-fluid">
              </div>
            </div>
          </div>

          <!-- Neurologie -->
          <div class="tab-pane" id="departments-tab-6">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Neurologie</h3>
                <p class="fst-italic">La neurologie s’occupe du cerveau, de la moelle épinière et des nerfs.</p>
                <p>Nos neurologues diagnostiquent et traitent les troubles neurologiques tels que les migraines, l’épilepsie ou les maladies neurodégénératives, avec une approche précise et humaine.</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="{{ asset('/img/neurologie.jpg') }}" alt="Neurologie" class="img-fluid">
              </div>
            </div>
          </div>

          <!-- Dentisterie -->
          <div class="tab-pane" id="departments-tab-7">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Dentisterie</h3>
                <p class="fst-italic">La dentisterie prend soin de votre sourire et de votre santé bucco-dentaire.</p>
                <p>Nos dentistes proposent des soins complets — du détartrage aux implants — dans un environnement moderne, confortable et hygiénique.</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="{{ asset('/img/dentiste.jpg') }}" alt="Dentisterie" class="img-fluid">
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>

</section><!-- /Departments Section -->

<!-- /Departments Section -->

<!-- Doctors Section -->
<section id="doctors" class="doctors section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Nos Docteurs</h2>
    <p>Découvrez notre équipe de professionnels qualifiés et passionnés par la santé de nos patients.</p>
  </div>

  <div class="container">
    <div class="row gy-4">
      @foreach ($doctors as $doctor)
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
          <div class="team-member d-flex align-items-start">
            <div class="pic">
              <img src="{{ asset('/img/doctors/doctors-' . (($loop->index % 4) + 1) . '.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              <h4>{{ $doctor->prenom }} {{ $doctor->nom }}</h4>
              <span>{{ $doctor->speciality->name }}</span>
              <p>
                @if($doctor->speciality->name === 'Cardiologue')
                  Spécialiste du cœur et des maladies cardiovasculaires, offrant des soins de qualité.
                @elseif($doctor->speciality->name === 'ORL')
                  Spécialiste des oreilles, du nez et de la gorge, assurant un suivi attentif et professionnel.
                @elseif($doctor->speciality->name === 'Chirurgien')
                  Expert en interventions chirurgicales, garantissant précision et sécurité.
                @elseif($doctor->speciality->name === 'Urologue')
                  Spécialiste du système urinaire et reproducteur masculin, à l’écoute de ses patients.
                @elseif($doctor->speciality->name === 'Rhumatologue')
                  Spécialiste des maladies articulaires et osseuses, aidant à retrouver mobilité et confort.
                @elseif($doctor->speciality->name === 'Dermatologue')
                  Expert de la peau et des affections cutanées, offrant des traitements efficaces.
                @else
                  Professionnel dévoué au bien-être et à la santé de ses patients.
                @endif
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>


    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Gallery</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('/img/gallery/gallery-1.jpg')}}" class="glightbox" data-gallery="images-gallery">
                <img src="{{ asset('/img/gallery/gallery-1.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('/img/gallery/gallery-2.jpg')}}" class="glightbox" data-gallery="images-gallery">
                <img src="{{ asset('/img/gallery/gallery-2.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('/img/gallery/gallery-3.jpg')}}" class="glightbox" data-gallery="images-gallery">
                <img src="{{ asset('/img/gallery/gallery-3.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('/img/gallery/gallery-4.jpg')}}" class="glightbox" data-gallery="images-gallery">
                <img src="{{ asset('/img/gallery/gallery-4.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('/img/gallery/gallery-5.jpg')}}" class="glightbox" data-gallery="images-gallery">
                <img src="{{ asset('/img/gallery/gallery-5.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('/img/gallery/gallery-6.jpg')}}" class="glightbox" data-gallery="images-gallery">
                <img src="{{ asset('/img/gallery/gallery-6.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('/img/gallery/gallery-7.jpg')}}" class="glightbox" data-gallery="images-gallery">
                <img src="{{ asset('/img/gallery/gallery-7.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('/img/gallery/gallery-8.jpg')}}" class="glightbox" data-gallery="images-gallery">
                <img src="{{ asset('/img/gallery/gallery-8.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Gallery Item -->

        </div>

      </div>

    </section><!-- /Gallery Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div><!-- End Google Maps -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Location</h3>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>info@example.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Clinique Santé Plus</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Hic solutasetp</h4>
          <ul>
            <li><a href="#">Molestiae accusamus iure</a></li>
            <li><a href="#">Excepturi dignissimos</a></li>
            <li><a href="#">Suscipit distinctio</a></li>
            <li><a href="#">Dilecta</a></li>
            <li><a href="#">Sit quas consectetur</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Nobis illum</h4>
          <ul>
            <li><a href="#">Ipsam</a></li>
            <li><a href="#">Laudantium dolorum</a></li>
            <li><a href="#">Dinera</a></li>
            <li><a href="#">Trodelas</a></li>
            <li><a href="#">Flexo</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Clinique Santé Plus</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href=“https://themewagon.com>ThemeWagon
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('/js/main.js') }}"></script>

</body>

</html>