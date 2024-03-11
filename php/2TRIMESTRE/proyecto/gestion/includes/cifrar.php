<?php
include "../header.php";
?>
<br><br><br><br>
<form method="POST" class="mt-4">
    <div class="form-group col-sm-12 mt-3">
        <input type="text" name="textito" id="textito" class="form-control" placeholder="Introduce el texto para cifrar" >
    </div>
    <div class="form-group m-3 d-flex justify-content-center">
        <input type="submit"  name="crear" id="crear" class="btn btn-primary mt-2 mb-5" value="Cifrar">
    </div>
</form>

<?php
    if ($_POST) {
        $crear = htmlspecialchars($_POST["crear"]);
        $textito = htmlspecialchars($_POST["textito"]);


        /////////////////

        if (CRYPT_STD_DES == 1) {
            echo 'Standard DES: ' . crypt($textito , 'rl') . "\n";
            echo "<br>";
        }
        
        if (CRYPT_EXT_DES == 1) {
            echo 'Extended DES: ' . crypt($textito, '_J9..rasm') . "\n";
            echo "<br>";

        }
        
        if (CRYPT_MD5 == 1) {
            echo 'MD5:          ' . crypt($textito, '$1$rasmusle$') . "\n";
            echo "<br>";

        }
        
        if (CRYPT_BLOWFISH == 1) {
            echo 'Blowfish:     ' . crypt($textito, '$2a$07$usesomesillystringforsalt$') . "\n";
            echo "<br>";

        }
        
        if (CRYPT_SHA256 == 1) {
            echo 'SHA-256:      ' . crypt($textito, '$5$rounds=5000$usesomesillystringforsalt$') . "\n";
            echo "<br>";

        }
        
        if (CRYPT_SHA512 == 1) {
            echo 'SHA-512:      ' . crypt($textito, '$6$rounds=5000$usesomesillystringforsalt$') . "\n";
            echo "<br>";

        }
        
        ////////////////


    }
?>
<?php
include "../footer.php";
?>