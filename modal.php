<div class="modal fade" id="addtourmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tour info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <span>Kamion</span>
                    <select class="form-select" id="kamion">
                        <?php
                        require 'Kamion.php';
                        $kamion = new Kamion(NULL, NULL, NULL, NULL, NULL, NULL);
                        $dostupni_kamioni = $kamion->dostupniKamioni($connection);
                        foreach ($dostupni_kamioni as $k) {
                        ?>
                            <option value="<?php echo $k['id']; ?>">
                                <?php echo $k['tablice']; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <span>Datum</span>
                    <input class="form-control" type="text" id="datum">
                </div>
                <div>
                    <span>Cena</span>
                    <input class="form-control" type="number" id="cena">
                </div>
                <div>
                    <span>Polazak</span>
                    <input class="form-control" type="text" id="polazak">
                </div>
                <div>
                    <span>Dolazak</span>
                    <input class="form-control" type="text" id="dolazak">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="save">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>