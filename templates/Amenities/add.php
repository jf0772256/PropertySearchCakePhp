<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Amenity $amenity
 * @var \Cake\Collection\CollectionInterface|string[] $properties
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Amenities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="amenities form content">
            <?= $this->Form->create($amenity) ?>
            <fieldset>
                <legend><?= __('Add Amenity') ?></legend>
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
