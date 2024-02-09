<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Amenity $amenity
 * @var string[]|\Cake\Collection\CollectionInterface $properties
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $amenity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $amenity->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Amenities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="amenities form content">
            <?= $this->Form->create($amenity) ?>
            <fieldset>
                <legend><?= __('Edit Amenity') ?></legend>
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
