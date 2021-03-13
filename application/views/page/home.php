<main>
    <!-- HOME -->
    <section id="showcase">
        <div class="center">
            <div class="avatar">
                <div class="avatar-shape avatar-shape-rounded bg-white mt-n2 mb-n2 mr-n2"></div>
                <img src="/img/adrian_fountain_square_pict.jpg" alt=""
                    class="avatar-img rounded-circle shadow-light">
            </div>
            <h1>Adrian Gerig</h1>
            <h3>Web Developer</h3>
            <div class="cover-letter">A</div>
        </div>
    </section>
    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="title">
                <h2>About me</h2>
                <div class="title-cover-letter">A</div>
            </div>
            
            <div class="row pt-5">
                <div class="col-md-12 col-lg-3 text-center">
                    <img src="/img/adrian_fountain_square_pict.jpg" alt="">
                </div>
                <div class="col-md-12 col-lg-9">
                    <h3>Adrian Gerig</h3>
                    <p class="subtitle-1">Web Developer</p>
                    <p>
                        I am a full stack web developer with over 15 years of experience working in the information technology and services industry. 
                        Skilled in LAMP (Linux, Apache, MariaDB, PHP), Databases, and Open Source Technologies. 
                    </p>
                    <div class="row pt-6">
                        <div class="col-lg-6">
                            <h5>Location</h5>
                            <p>Indianapolis, IN. 46240</p>
                        </div>
                    </div>
                    <div class="row py-6">
                        <div class="col-sm-12 col-lg-6">
                            <h5>Education</h5>
                            <h6>Technical Engineer - Informatics. 2000 - 2003</h6>
                            <p><a href="http://upta.edu.ve/estudios.html#informatica" target="blank">Universidad Politecnica Territorial - Federico Brito Figueroa</a>, La Victoria. Venezuela.</p>	
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <h5>Additional Coursework/Seminars</h5>
                            <h6>Maya Master - Hyper Real Composition & Edition Program. 2005 - 2006</h6>
                            <p>AP Animation Studios, Caracas, Venezuela</p>

                            <h6>React - The Complete Guide (Hooks, React Router, Redux). 2020</h6>
                            <p>Udemy - Maximilian Schwarzmuller</p>
                        </div>
                    </div>
                    <div class="divider-1"></div>
                    <div class="d-inline">
                        <a class="btn-primary pt-6">Download CV <?php echo !isset($_SESSION['id']) ? '*' : '' ?></a>
                        <a class="btn-secondary pt-6" href="#contact">Send Message</a>
                    </div>
                    <?php if (!isset($_SESSION['id'])){ ?>
                    <div class="pt-2">
                        <small id="downloadCVHelp" class="text-muted"> Must be registered. <a href="/user/signup">Sign Up</a></small>
                    </div>
                    <?php } ?>
                </div>
            </div>
            
        </div>
    </section>
    <!-- SKILLS -->
    <section id="skills">
        <div class="container">
            <div class="title">
                <h2> Skills</h2>
                <div class="title-cover-letter">S</div>
            </div>
            <div class="divider-2"></div>
            <div class="divider-2"></div>
            <div class="row">
                <div class="col-md-12">
                    <p class="pt-6">
                    I am a full stack web developer with over 15 years of experience working in the information technology and services industry. 
                    Skilled in LAMP (Linux, Apache, MariaDB, PHP), Databases, and Open Source Technologies.</p>
                </div>
            </div>
            <div class="divider-2"></div>
            <div class="row pt-2">
                <div class="col-lg-6">
                    <h6 class="mt-sm-6">Backend</h6>
                    <div class="progress">
                        <div class="progress-bar" style="width:70%"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6 class="mt-sm-6">Frontend</h6>
                    <div class="progress">
                        <div class="progress-bar" style="width:70%"></div>
                    </div>
                </div>
            </div>
            <div class="row pt-md-5">
                <div class="col-lg-6">
                    <h6 class="mt-sm-6">Web Design</h6>
                    <div class="progress">
                        <div class="progress-bar" style="width:70%"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6 class="mt-sm-6">Agile</h6>
                    <div class="progress">
                        <div class="progress-bar" style="width:70%"></div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </section>
    <!-- PORTFOLIO -->
    <section id="portfolio">
        <div class="container">
        <div class="title">
                <h2>Portfolio</h2>
                <div class="title-cover-letter">P</div>
            </div>
            <div class="divider-2"></div>
            <div class="row text-center mb-6">
                <div class="col-md-12">
                    <p class="mt-6">
                    Below you will find some of my latest projects. Please stay tuned as I keep posting new cool content.</p>
                </div>
            </div>
            <div class="divider-1"></div>
            <div class="row">
                <div class="col-sm-12 col-md-6 text-center">
                    <a href="https://ashtonpaint.com" target="_blank">
                        <img src="/img/portfolio/ashton-thumbnail.png" alt="" class="shadow-light" title="Click to open">
                    </a>
                    <p class="text-center">
                        <small>Ashton Painting LLC <i class="text-info">#Wordpress #WebDesign</i></small> 
                    </p>
                </div>
                <div class="col-sm-12 col-md-6 text-center">
                <a href="https://bilbotri.com" target="_blank">
                        <img src="/img/portfolio/bilbotri-thumbnail.png" alt="" class="shadow-light" title="Click to open">
                    </a>
                    <p class="text-center">
                        <small>Bilbotri <i class="text-info">#Wordpress</i></small>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 text-center">
                    <a href="https://luisaldreymusic.com" target="_blank">
                        <img src="/img/portfolio/luisaldreymusic-thumbnail.png" alt="" class="shadow-light" title="Click to open">
                    </a>
                    <p class="text-center">
                        <small>Luis Aldrey Music <i class="text-info">#WebApp #WebDesign #ReactJS</i> </small>
                    </p>
                </div>
                <div class="col-sm-12 col-md-6 text-center">
                <a href="http://thecreditladyusa.com/go/" target="_blank">
                        <img src="/img/portfolio/thecreditlady-thumbnail.png" alt="" class="shadow-light" title="Click to open"> 
                    </a>
                    <p class="text-center">
                        <small>The Credit Lady USA <i class="text-info">#Bootstrap</i></small>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTACT -->
    <section id="contact">
        <div class="container">
            <div class="title">
                <h2>Contact</h2>
                <div class="title-cover-letter">C</div>
            </div>
            <div class="divider-2"></div>
            <p class="px-5 text-center">
                Want to say hello? Want to know more about me? Drop me an email and I will get back to you as soon as I can. 
                <?php if (!isset($_SESSION['id'])){ ?> 
                    If you're a recruiter and want to have access to more detailed info, you can <a href="user/signup">create an account.</a>
                <?php } ?>
                
            </p>
            <div class="divider-1"></div>
            <div class="row pt-2">
                <div class="col-md-6 text-center">
                    <i class="bi bi-envelope bi-2x"></i>
                    <p><a href=<?php echo "mailto:" . Application::getConfig('company.email')  ?>><?php echo Application::getConfig('company.email') ?></a></p>
                </div>
                <div class="col-md-6 text-center">
                    <i class="bi bi-geo-alt bi-2x"></i>
                    <p>Indianapolis, IN, 46240, United States.</p>
                    <p></p>
                </div>
            </div>
            <div class="divider-1 text-center py-1" id="add_err"></div>
            <form id="contact-form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="Name" class="form-control" id="contactName" placeholder="Enter Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" name="Email" class="form-control" id="contactEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">I'll never share your email with anyone else.</small>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <input type="text" name="Subject" class="form-control" id="contactSubject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <textarea name="Message" id="contactMessage" placeholder="Here goes your message" class="form-control required" rows="7" required></textarea>
                </div>
                <!-- <div class="form-check">
                    <input type="checkbox" name="" class="form-check-input" id="contactNewsletter">
                    <label class="form-check-label" for="exampleCheck1">I want to subscribe to your newsletter</label>
                </div> -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" id="submit-contact-form-btn">Submit</button>
                    <span id="preloader"></span>
                </div>
                <input type="hidden" id="companyEmail" value=<?php echo Application::getConfig('company.email') ?>>
            </form>
        </div>
    </section>
    <!-- CONTACT -->
    <div id="footer">
        <div class="container">
            <p class="text-center">
                <a href="https://www.linkedin.com/in/adrian-gerig" target="blank"><i class="fa fa-linkedin"></i></a>
            </p>
            <p class="px-5 text-center">
                &copy; <?php echo date('Y') ?> - All Rights Reserved
            </p>
        </div>
        
    </div>
</main>