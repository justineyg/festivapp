<?php ?> 

<h1><?= $a->user->pseudo ?></h1>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Créé</th>
            <th>Post photo</th>
            <th>Alt</th>
            <th>Post description</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($tA as $s) : ?>
            <tr>
                <td><?= $s->id ?></td>
                <td><?= $s->created ?></td>
                <td><?= $s->picture ?></td>
                <td><?= $s->description_img ?></td>
                <td><?= $s->description ?></td>
                
            </tr>
            <?php endforeach; ?>
</tbody> 
</table>