<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Property> $properties
 */


?>
<div class="properties index content">
    <?php //= $this->Html->link(__('New Property'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Properties') ?></h3>

    <style>
        .container
        {
            max-width: 150rem;
        }
    </style>

    <div class="row">
        <div class="column column-20">
            sidebar
        </div>
        <div class="column">
            <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('name') ?></th>
                        <th><?= $this->Paginator->sort('street_address') ?></th>
                        <th><?= $this->Paginator->sort('city') ?></th>
                        <th><?= $this->Paginator->sort('state') ?></th>
                        <th><?= $this->Paginator->sort('postal_code') ?></th>
                        <th><?= $this->Paginator->sort('price') ?></th>
                        <th><?= $this->Paginator->sort('baths') ?></th>
                        <th><?= $this->Paginator->sort('beds') ?></th>
                        <th><?= $this->Paginator->sort('sqft') ?></th>
                        <th><?= $this->Paginator->sort('acres') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($properties as $property): ?>
                        <tr>
                            <td><?= h($property->name) ?></td>
                            <td><?= h($property->street_address) ?></td>
                            <td><?= h($property->city) ?></td>
                            <td><?= h($property->state) ?></td>
                            <td><?= h($property->postal_code) ?></td>
                            <td>$<?= $this->Number->format($property->price) ?></td>
                            <td><?= $this->Number->format($property->baths) ?></td>
                            <td><?= $this->Number->format($property->beds) ?></td>
                            <td><?= $this->Number->format($property->sqft) ?></td>
                            <td><?= $this->Number->format($property->acres) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
            </div>
        </div>
    </div>
</div>
