

<h1>Les commentaires</h1>
<?php if(empty($post->comments))
	echo '<p>Aucun commentaire pour le moment</p>';
else { ?>
	<table>
		<thead>
			<tr>
		
				<th>Commentaire : </th>	
            </tr>
        </thead>	
	
		<tbody>
    <?php foreach ($post->comments as $acomment) { ?>
				<tr>

					<td><?= $acomment->comment ?></td>

                        <td>
							<?= $this->Html->link('Modifier', ['controller' => 'Comments', 'action' => 'edit', $acomment->id]) ?>
							
							<?= $this->Form->postLink(
								'Supprimer',
								['controller' => 'Comments', 'action' => 'delete', $acomment->id],
								['confirm' => 'Etes-vous sûr de vouloir supprimer cet épisode ?']
							) ?>
                        </td>
						
                </tr>
    <?php } ?>
            </tbody>
    </table>
<?php } ?>


<br>	
<h2>Ajouter un commentaire</h2>			
	<?= $this->Form->create($newcomment, ['url' => ['controller' => 'Comments', 'action' => 'new']]) ?>
		<?= $this->Form->hidden('user_id', ['value' => $user->id]) ?>
		<?= $this->Form->control('comment', ['label' => 'Commentaire']) ?>

		<?= $this->Form->button('Ajouter') ?>
	<?= $this->Form->end() ?>
