<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    @if(session()->get('city') !== null)
        <a class="navbar-brand" href="#">Ваш город {{ session()->get('city')['name']  }}</a>
    @else
        <li>Выберите город</li>
    @endif
    </div>
  </div>
</nav>


