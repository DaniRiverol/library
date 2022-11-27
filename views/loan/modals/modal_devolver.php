<div id="modalDevolver<?php echo $value['id_rental']; ?>" class="modal">
    <div class="modal-content">
        <h4>Devolver libro</h4>
        <div class="divider"></div>
        <h5>Vas a devolver el libro 
            <?php echo $value['title']; ?>
        </h5>
    </div>
    <div class="modal-footer">
        <form action="../../controllers/edit/edit_book.php?<?php echo $value['id_book']; ?>" method='POST'>
            <input type="hidden" value='<?php echo $value['id_book']; ?>' name='id_book' />
            <input type="submit" class="btn green" name="btnDevolver" value="Aceptar">
        </form>
    </div>
</div>