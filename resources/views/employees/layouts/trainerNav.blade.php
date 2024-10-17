<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @yield('css')
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('employees.trainerIndex') }}">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Workout Clients
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('employees.workUsersWithoutPlans') }}">Clients have no plans</a></li>
                  <li><a class="dropdown-item" href="{{ route('employees.workUsersWithPlans') }}">Clients have plans</a></li>
                </ul>
              </li>


                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Nutration Clients
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('employees.nutrationUsersWithoutPlans') }}">Clients have no plans</a></li>
                  <li><a class="dropdown-item" href="{{ route('employees.nutrationUsersWithPlans') }}">Clients have plans</a></li>
                </ul>
              </li>






              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::guard('employees')->user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('employees.trainerProfile') }}">Profile</a></li>
                  <li><a class="dropdown-item" href="{{ route('employees.trainerQualifications') }}">Qualifications</a></li>
                  <li><a class="dropdown-item" href="{{ route('employees.transformations') }}">Transformations</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item">Logout</button>
                    </form>
                </li>
                </ul>
              </li>


              @php
                  $unread = auth()->user()->unreadNotifications()->count();
              @endphp
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="{{  $unread == 0 ?'': 'badge rounded-pill badge-notification bg-danger ' }} ">{{ $unread == 0 ? "" : $unread}}</span>
                </a>
                <ul class="dropdown-menu">
                  @forelse( auth()->user()->notifications as $notification)

                  <li><a class="dropdown-item {{ $notification->unread() ? 'fw-bold' : '' }}"  href="{{ route('employees.markNotification',$notification->id) }}">
                    <img src="{{asset('images/users_images/'.$notification->data['image'] )}}" alt="Notification Image" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                    {{ $notification->data['body']  }}    {{ $notification->created_at->diffForHumans() }}</a></li>

                  @empty
                    <h5>You have no notifications</h5>
                  @endforelse
                </ul>
              </li>



            </ul>
          </div>
        </div>
      </nav>

    <main>
        @yield('content')
    </main>


    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
