<div id="modalLoan<?php echo $value['id_book']; ?>" class="modal">
    <div class="modal-content">
        <h4>Solicitar Libro</h4>
        <div class="divider"></div>
        <div class="row" style="margin-top:15px;">
            <div class="col s9">
                <h4 style="margin-top:10px;">
                    <?php echo $value['title']; ?>
                </h4>
                <h5>
                    <?php echo $value['description']; ?>
                </h5>
            </div>
            <div class="col s3">
                <img src=" <?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>" width="110px">
            </div>
        </div>
        <h6>El préstamo tiene una validez de 7 días</h6>
        <h5>El libro tiene que ser devuelto el día:
            <strong>
                <?php echo $hasta->format('d-m-Y'); ?>
            </strong>
        </h5>
    </div>
    <div class="divider"></div>
    <div class="modal-footer">
        <form action="../../controllers/save/save_loan.php?<?php echo $value['id_book']; ?>" method='POST'>
            <input type="hidden" value='<?php echo $value['id_book']; ?>' name='id_book' />
            <input type="hidden" value='<?php echo $hasta->format('Y-m-d'); ?>' name='hasta' />
            <input type="hidden" value='<?php echo $now->format("Y-m-d") ?>' name='desde' />
            <input type="hidden" value='<?php echo $_SESSION['id_user'] ?>' name='id_user' />

            <input type="submit" class="modal-close btn red" name='btnSave' value="Si">
            <a href="" class="modal-close waves-effect  btn black">No</a>
        </form>
    </div>
</div>