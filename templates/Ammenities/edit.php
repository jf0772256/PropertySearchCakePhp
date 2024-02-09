<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ammenity $ammenity
 * @var string[]|\Cake\Collection\CollectionInterface $properties
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ammenity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ammenity->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ammenities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ammenities form content">
            <?= $this->Form->create($ammenity) ?>
            <fieldset>
                <legend><?= __('Edit Ammenity') ?></legend>
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
