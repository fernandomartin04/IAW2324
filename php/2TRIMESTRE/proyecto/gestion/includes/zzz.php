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
        $crear = "Aula " . $textito . "nonono";
        echo $crear;
        echo $textito;
        echo "<br>";
        if (CRYPT_STD_DES == 1) {
            echo 'Standard DES: ' . crypt($textito , 'rl') . "\n";
            echo "<br>";
        }
    }
?>
<?php
include "../footer.php";
?>