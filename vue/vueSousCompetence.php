<form method="POST" class="lb mb-3" action ="index.php?action=sousCompetence">
    <h1 id="lstA">Créer une sous-compétence</h1>
    </br>


    <input required type="text" name='txtIntituleSousCompetence' placeholder='Intitulé de la sous-compétence'>



    </br>
    <input type="submit" value="AJOUTER" name="btnAjoutSousCompetence">
    <input type="submit" value="ANNULER" name="btnCancel">

</form>



    <table class="table table-dark">

        <tr class="table-active">

            <th>Libellé</th>
            <th>Intitulé</th>
           
        </tr>
        <?php
        foreach ($listeSousCompetence as $uneSousCompetence) {
        ?>
            <tr>
                <input class='txt' type='hidden' name='txtNum' value="<?php echo $uneSousCompetence["idSousCompetence"]; ?>">
                <td><?php echo $uneSousCompetence["libelleSousCompetence"]; ?></td>
                <td><?php echo $uneSousCompetence["intituleSousCompetence"]; ?></td>
    


            </tr>
        <?php
        }

        ?>
    </table>


