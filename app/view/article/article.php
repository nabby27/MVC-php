<a class="btn btn-primary text-center" href="<?php echo Settings::PATH['base'] ?>/article/create"><i class="fas fa-plus"></i> Create</a>
<hr/>
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <th class="text-center"><i class="fas fa-trash-alt"></i></th>
            <th class="text-center"><i class="far fa-edit"></i></th>
            <th class="text-center"><i class="far fa-images"></i></th>
            <th class="text-center"><i class="fas fa-link"></i></th>
            <th class="text-center">ID</th><th class="text-center">NAME</th><th class="text-center">DESCRIPTION</th>
                <th class="text-center">PICTURE</th><th class="text-center">CATEGORY</th>
        </thead>
        <?php if ($articles != null) { ?>
            <?php foreach($articles as $article): ?>
                <tr>
                    <td class="text-center">
                        <a class="btn btn-danger" onclick="javascript:return confirm('Do you want delete this article?');" href="<?php echo Settings::PATH['base'] ?>/article/delete/<?php echo $article->getId(); ?>">Delete</a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-warning" href="<?php echo Settings::PATH['base'] ?>/article/edit/<?php echo $article->getId(); ?>">Edit</a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-info" href="<?php echo Settings::PATH['base'] ?>/picture/list/article/<?php echo $article->getId(); ?>">Pictures</a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-info" href="<?php echo Settings::PATH['base'] ?>/link/list/article/<?php echo $article->getId(); ?>">Links</a>
                    </td>
                    <td class="text-center"><?php echo $article->getId(); ?></td>
                    <td class="text-center"><?php echo $article->getName(); ?></td>
                    <td class="text-center"><?php echo $article->getDescription(); ?></td>
                    <td class="text-center"><?php echo $article->getPicture(); ?></td>
                    <?php foreach($this->categoryModel->getAll() as $category): ?>
                        <?php if ($category->getId() == $article->getIdCategory()) echo "<td class='text-center'>".$category->getName()."</td>"; ?>
                    <?php endforeach; ?>

                </tr>
            <?php endforeach; ?>
        <?php } else { ?>
            <tr>
                <td colspan="9" class="text-center text-info bg-light"> THERE ARE NO RECORDS </td>
            </tr>
        <?php } ?>
    </table>
</div>