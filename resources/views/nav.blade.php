<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/customers">Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about" tabindex="-1" aria-disabled="true">About Us</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="/logout" method="post">
            @csrf
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Log Out</button>
        </form>
    </div>
</nav>