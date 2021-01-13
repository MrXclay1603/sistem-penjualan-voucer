<!-- Fixed navbar -->
  <div class="container" >
        <div class="navbar-header-">
              <?php if (isset($_SESSION['level']) == '1') { ?>
                  <p align="right">Anda masuk sebagai <strong><?= ucfirst($_SESSION['username']); ?></strong> | <?=$_SESSION['ket']; ?></p>
            <?php  } ?>

        </div>
    </div>
