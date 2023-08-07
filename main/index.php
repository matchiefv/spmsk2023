<?php 
    session_start();
    include ("sambungan.php"); // samb$sambungan to database
    include('_style.php'); // access stylesheets
    

    if(isset($_POST["submit_login"])) {
        $idUser = $_POST["idUser"];
        $password = $_POST["password"];

        // check for penjual or pembeli
        $chek = FALSE;
        if ($chek == FALSE) {
            $sql = "SELECT * FROM pembeli";
            $result = mysqli_query($sambungan, $sql);
            while ($pembeli = mysqli_fetch_array($result)) {
                if ($pembeli['idpembeli'] == $idUser && $pembeli["password"] == $password) {

                    $chek = TRUE; 
                    $_SESSION['idpengguna'] = $pembeli['idpembeli'];
                    $_SESSION['nama'] = $pembeli['namapembeli'];     
                    $_SESSION['status'] = 'pembeli';                  
                    break;               

                }}
        }

        if ($chek == FALSE) {
            $sql = "SELECT * FROM penjual";
            $result = mysqli_query($sambungan, $sql);
            while ($penjual = mysqli_fetch_array($result)) {
                if ($penjual['idpenjual'] == $idUser && $penjual["password"] == $password) {

                    $chek = TRUE; 
                    $_SESSION['idpengguna'] = $penjual['idpenjual'];
                    $_SESSION['nama'] = $penjual['namapenjual'];  
                    $_SESSION['status'] = 'penjual';                  
                    break;
                }}
        }

        if ($chek == TRUE) {
            if ($_SESSION['status'] == 'pembeli')
                header("location:pembeli_home.php");
            else if ($_SESSION['status'] == 'penjual')
                header("location:penjual_home.php");
        }
        // if it fails...
        else echo "
            <script>
                alert('Identifikasi username dan password gagal');
                window.location ='index.php';
            </script>
        ";
    }

    if (isset( $_POST['submit_signup'] )) {

        // declare credentials
        $idpembeli = $_POST['idpembeli'];
        $password = $_POST['password'];
        $namapembeli = $_POST['namapembeli'];

        // send to database
        $sql = "insert into pembeli values('$idpembeli','$password','$namapembeli')";
        $result = mysqli_query($sambungan, $sql);

        if ($result == TRUE) 
            echo "<script>alert('Account created successfully');</script>"; // get success 
        else {
            echo "<script>alert('Error');</script>"; // catch errors 
        }
    }
?>

<section class= "bg-gradient-to-r from-gray-200 via-gray-400 to-gray-600 flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 ">
    <label class="swap swap-flip text-9xl">

        <!-- this hidden checkbox controls the state -->
        <input type="checkbox" id='flip' />

        <!-- log in account -->
        <div class="swap-off card lg:card-side bg-base-100 shadow-xl">
        <figure><img class='' src="https://cdn.dribbble.com/users/1161517/screenshots/7896076/media/24ae74ddb6c9eb7789ae3a189a6b30ae.gif" alt="Album"/></figure>
        <div class="card-body bg-base-200 px-10">
        <form class="space-y-4 md:space-y-6" action="index.php" method="post">
                <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" placeholder="Type here" name="idUser" id="idUser" required='' class="input input-primary input-bordered" />

                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" maxlength="16" name="password" id="password" placeholder="••••••••" required='' class="input input-primary input-bordered" />
                </div>
                <div class="form-control mt-6">
                <label class="label" for='flip'>
                    <span class="label-text">Don't have an account? <a class='link-primary link-hover'>Sign up </a></span>
                </label>
                <button type="submit" name='submit_login' class="btn btn-primary">Log in</button>
                </div>
            </div>
        </form>
            </div>
        </div>
        </div>

        <!-- sign up -->
        <div class="swap-on card lg:card-side bg-base-100 shadow-xl">
        <figure><img class='object cover' src="https://cdn.dribbble.com/users/1161517/screenshots/7896076/media/24ae74ddb6c9eb7789ae3a189a6b30ae.gif" alt="Album"/></figure>
        <div class="card-body bg-base-200 px-10">
        <form class="space-y-4 md:space-y-6" action="index.php" method="post">
                <div class="form-control">
                <label class="label">
                    <span class="label-text">Name</span>
                </label>
                <input type="text" placeholder="Type here" name='namapembeli' id='namapembeli' required='' class="input input-primary input-bordered" />

                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" placeholder="Type here" name="idpembeli" id="idpembeli" required='' class="input input-primary input-bordered" />
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" maxlength="16" name="password" id="password" placeholder="••••••••" required='' class="input input-primary input-bordered" />
                </div>
                <div class="form-control mt-6">
                <label class="label" for='flip'>
                    <span class="label-text">Already have an account? <a class='link-primary link-hover'> Log in </a></span>
                </label>
                <button type="submit" name='submit_signup' class="btn btn-primary">Sign up</button>
        </div>
        </form>
        </div>

    </div>
</label>
</section>




<!--
<section class="bg-gray-50 dark:bg-gray-900">
<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
<a href="#" class="flex items-right mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="mr-2 scale-40" src="img/logo2.png" alt="logo"> 
            </a>
    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                Log in to your account
            </h1>
            <form class="space-y-4 md:space-y-6" action="index.php" method="post">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                    <input type="email" name="idpembeli" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                </div>
                <button type="submit" name='submit' class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 w-full">Sign in</button>
                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    Don’t have an account yet? <a href="signup.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                </p>
            </form>
        </div>
    </div>
</div>
</section>
