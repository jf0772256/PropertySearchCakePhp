<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Amenity> $amenities
 */
?>
<div class="amenities index content">
    <?= $this->Html->link(__('New Amenity'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Amenities') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('ammenity') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($amenities as $amenity): ?>
                <tr>
                    <td><?= $this->Number->format($amenity->id) ?></td>
                    <td><?= h($amenity->ammenity) ?></td>
                    <td><?= h($amenity->created) ?></td>
                    <td><?= h($amenity->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $amenity->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $amenity->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $amenity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $amenity->id)]) ?>
                    </td>
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
