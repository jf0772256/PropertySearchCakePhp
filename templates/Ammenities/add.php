<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ammenity $ammenity
 * @var \Cake\Collection\CollectionInterface|string[] $properties
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Ammenities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ammenities form content">
            <?= $this->Form->create($ammenity) ?>
            <fieldset>
                <legend><?= __('Add Ammenity') ?></legend>
                <?php
                    echo $this->Form->control('ammenity');
                    echo $this->Form->control('properties._ids', ['options' => $properties]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
