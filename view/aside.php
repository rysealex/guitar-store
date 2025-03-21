<aside>
    <ul>
        <?php foreach($categories as $category) : ?>
        <li>
            <a href="?action=category_name&category_id=<?php
                      echo $category['category_id']; ?>">
                <?php echo htmlspecialchars(get_category_name($category['category_id'])); ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul> 
</aside>