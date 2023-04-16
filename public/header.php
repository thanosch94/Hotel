<header>
    <nav class="row col-12 container-fluid pt-4 bg-light shadow">
        <div class="col-2">
            <a class="text-decoration-none text-body "><p></p></a>
        </div>            
        <div class="col-2 row align-items-center pb-2">
            <a class="text-decoration-none text-body " href="list.php"><p class="d-inline">Hotels</p></a>
        </div>

        <div class="col-8 row justify-content-end align-items-center pb-2">
            <a href="index.php" class="col-2 text-decoration-none text-body"><i class="fa-solid fa-house"></i>
            <p class="d-inline">Home</p></a>
            <a href="profile.php" class="col-2 text-decoration-none text-body"><i class="fa-solid fa-user"></i>
            <p class="d-inline">Profile</p></a>
            <?php if(!empty($currentUser)){
                echo '<form class="col-2" action="actions/logout.php"><button class="text-decoration-none text-body btn btn-link" type="submit"><i class="fa-solid fa-door-closed"></i>
                Log out</button></form>';       
            }
            ?>
        </div>   
    </nav>
</header>
