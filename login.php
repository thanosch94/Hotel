<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/022912981f.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="d-flex justify-content-around pt-4 bg-light">
            <p>Hotels</p>
     
            <div>
                <i class="fa-solid fa-house"></i>
                <p class="d-inline">Home</p>
            </div>
        </nav>
    </header>
    <main>
        <h2 class="text-center mt-4">Login</h2>
        <section class="container rounded-3 col-4 bg-light pt-5 pb-4 position-absolute top-50 start-50 translate-middle">
            <form>
                <div class="container justify-content-center row mb-4">
                    <h4 class="text-center mb-3">Username</h4>
                    <input 
                        class="col-8 rounded ms-4 me-2 pt-1 pb-1 text-center";
                        id="username"
                        type="text"/>

                </div>
                <div class="container  justify-content-center row">
                    <h4 class="text-center mb-3">Password</h4>
                    <input 
                            class="col-8 rounded pt-1 pb-1 text-center";
                            id="password"
                            type="password"/>
                </div>
                <div class="text-center">
                    <button type="submit" class="d-inline mt-3 mb-2 ps-4 pe-4 btn btn-success">Login</button>
                </div>
                <p class="text-center mt-4">Forgot your password? | Create account</p>

            </form>
        </section>
    </main>
    <footer class="position-absolute w-100 bottom-0 pt-5 pb-5 top-100">
        <p class="text-center p-4 bg-light">© Copyright 2023 Hotels. All rights reserved.</p>
    </footer>
</body>
</html>