<div class="container">
    <h1 class="page-header">
        <?php echo $link->getId() != 0 ? $link->getId() : 'New link'; ?>
    </h1>

    <form class="border border-info rounded p-4" action="<?php echo Settings::PATH['base'] ?>/link/save" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $link->getId(); ?>" />
        
        <fieldset class="border border-black px-3 pb-3 mb-4">
            <legend>Link data</legend>
            <div class="form-group py-2">
                <label class="d-none d-lg-block" for="name">Name:</label>
                <input type="text" name="name" value="<?php echo ucfirst($link->getName()); ?>" class="form-control" placeholder="Name" required>
            </div>

            <div class="form-group py-2">
                <label class="d-none d-lg-block" for="link">Link:</label>
                <input type="text" name="link" value="<?php echo $link->getLink(); ?>" class="form-control" placeholder="Link" required>
            </div>

            <div class="form-group py-2">
            <label class="d-none d-lg-block" for="idArticle">Article:</label>
            <select name="idArticle" class="form-control custom-select" required>
                <option value="" disabled selected>Choose...</option>
                <?php foreach($this->articleModel->getAll() as $article): ?>
                    <option value="<?php echo $article->getId(); ?>" <?php if ($article->getId() == $link->getIdArticle()) echo 'selected'; ?> >
                        <?php echo ucfirst($article->getName()); ?> 
                    </option>
                <?php endforeach; ?>
            </select>
            </div>
        </fieldset>

        <div class="text-right pt-3">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
</div>