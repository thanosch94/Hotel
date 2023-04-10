<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/022912981f.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('header.php'); ?>
    <main>

        <section class="h-100 h-custom gradient-custom-2">
  <div class="container justify-content-center py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
                <div class="p-5">
                  <h3 class="fw-normal text-center mb-5">Registration</h3>


                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input type="text" id="firstName" class="form-control form-control-lg" />
                        <label class="form-label" for="firstName">First name</label>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input type="text" id="lastName" class="form-control form-control-lg" />
                        <label class="form-label" for="lastName">Last name</label>
                      </div>

                    </div>
                  </div>
                  <div class="mb-4">
                    <div class="form-outline form-white">
                      <input type="text" id="email" class="form-control form-control-lg" />
                      <label class="form-label" for="email">Your Email</label>
                    </div>
                  </div>


                  <div class="mb-4 pb-2">
                    <div class="form-outline">
                      <input type="text" id="emailConf" class="form-control form-control-lg" />
                      <label class="form-label" for="emailConf">Confirm Email</label>
                    </div>
                  </div>
                  <div class="mb-4 pb-2">
                    <div class="form-outline">
                      <input type="text" id="password" class="form-control form-control-lg" />
                      <label class="form-label" for="password">Password</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-4 pb-2 mb-md-0 pb-md-0">

                    <div class="form-outline">
                      <input type="text" id="passwordConf" class="form-control form-control-lg" />
                      <label class="form-label" for="passwordConf">Confirm Password</label>
                    </div>
                    
                  <div class="form-check d-flex justify-content-start mt-3 mb-4 pb-3">
                    <input class="form-check-input me-3" type="checkbox" value="" id="terms" />
                    <label class="form-check-label" for="terms">
                      I do accept the <a href="#!"><u>Terms and Conditions</u></a> of your
                      site.
                    </label>
                  </div>
                    <button type="button" class="btn btn-secondary text-light btn-lg mt-4"
                    data-mdb-ripple-color="dark">Register</button>

                    </div>
                  </div>

                </div>
              </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </main>
    <footer class="position-absolute w-100 bottom-0 pt-5 pb-5 top-100">
        <p class="text-center p-4 bg-light">© Copyright 2023 Hotels. All rights reserved.</p>
    </footer>
</body>
</html>