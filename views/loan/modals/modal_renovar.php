<div id="modalRenovar<?php echo $value['id_rental']; ?>" class="modal">
    <div class="modal-content">
        <h4>Renovar Préstamo</h4>
        <div class="divider"></div>
        <h6>Vas a renovar el préstamo del libro
            <?php echo $value['title']; ?>
        </h6>
        <h6>La renovación tiene una validez de 7 días</h6>
        <h5>El libro tiene que ser devuelto el día:
            <strong>
                <?php //echo $hasta->format('d-m-Y'); ?>
            </strong>
        </h5>
    </div>
    <div class="modal-footer">
        <form action="../../controllers/edit/edit_rental.php?<?php echo $value['id_rental']?>" method="POST">
            <input type="hidden" value='<?php echo $value['id_rental']; ?>' name='id_rental' />
            <input type="hidden" value='<?php echo $value['until_date']; ?>' name='hasta' />
            <input type="submit" class="modal-close waves-effect  btn green" name="btnRenovar" value="Renovar">
        </form>
    </div>
</div>