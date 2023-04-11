<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    
    <link rel="stylesheet" href="assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/022912981f.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('header.php'); ?>
    <main>
        <section class="z-1 position-relative">
            <img class="img-fluid h-auto" src="images/main.jpg" width="100%" >
        </section>
        <section class="container rounded-3 col-4 bg-light z-2 pt-5 pb-4 position-absolute top-50 start-50 translate-middle">
            <form>
                <div class="container justify-content-center row mb-5">
                    <input 
                        class="col-5 rounded ms-4 me-2 pt-2 pb-2 text-center";
                        type="text";
                        placeholder="City"/>
                    <input 
                        class="col-5 rounded pt-2 pb-2 text-center";
                        type="text";
                        placeholder="Room Type"/>
                </div>
                <div class="container  justify-content-center row">
                    <input 
                        class="col-5 rounded ms-4 me-2 pt-2 pb-2 text-center";
                        type="date"/>
                    <input 
                        class="col-5 rounded pt-2 pb-2 text-center";
                        type="date"/>
                </div>
                <div class="text-center">
                    <button type="submit" class="d-inline mt-5 mb-2 ps-4 pe-4 btn btn-secondary"><i class="fa fa-search me-2" aria-hidden="true"></i>Search</button>
                </div>

            </form>
        </section>
    </main>
    <footer class="z-3">
        <p class="text-center m-0 p-4 bg-light">© Copyright 2023 Hotels. All rights reserved.</p>
    </footer>
</body>
</html>