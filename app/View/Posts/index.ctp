<!-- File: /app/View/Posts/index.ctp -->
<?php echo $this->element('searchForm')?>

<h1>Blog posts</h1>

<p><?php echo $this->Html->link(
    'Add Post',
    array('action' => 'add')); ?></p>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Category</th>
        <th>Tag</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

<!-- ここで $posts 配列をループして、投稿情報を表示 -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array('action' => 'view', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $post['Category']['category']; ?>
        </td>
        <td>
            <?php foreach ($post['Tag'] as $tag): ?>
            <?php echo $tag['tag']; ?>
            <?php endforeach; ?>
                
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $post['Post']['modified']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
