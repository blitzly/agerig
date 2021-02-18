    <nav class="navbar navbar-expand-md navbar-light fixed-top text-uppercase">
          <a class="navbar-brand" href="/page/home"><img src="/img/frontend/logo.png"  class="img-fluid"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link px-4" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-4" href="#"> 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-4" href="#">News</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-4" href="#">Kontakt</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <button class="btn btn-primary my-2 my-sm-0" type="submit">Make an Appointment</button> 
              <?php if (isset($_SESSION['username'])){  ?>
                  <a class="pl-2" href="/dashboard"><i class="fa fa-cog"></i></a>
                <?php } ?>
            </form>
          </div>
    </nav>