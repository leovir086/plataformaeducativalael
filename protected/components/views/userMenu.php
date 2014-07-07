<ul>
        <!-- Get the rols of user --> 
	<?php foreach($this->getRecentRols() as $rols): ?>
            <!-- Got the relations rols from model user-->
            <?php foreach($rols->rols as $rol):?>
                    <!-- Get the form the real rol id-->
                    <?php foreach($this->getRecentForms($rol->id_rol) as $forms):?>
                        <?php foreach ($forms->forms as $form):?>
                            <li>
                                <?php echo CHtml::link(CHtml::encode($form->name_form),array($form->url_form));?>
                            </li>
                        <?php endforeach;?>
                    <?php endforeach;?>
            <?php endforeach?>
	<?php endforeach; ?>
</ul>