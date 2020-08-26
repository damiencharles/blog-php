
<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-5">

            <h1>Soumettre un article</h1>

            <form action="" method="post" enctype="multipart/form-data" class="mt-5 bg-light">

                <div class="form-group col-6 offset-3 mt-4">
                    <label for="titre" class='mt-4'>Titre</label>
                    <input type="text" class="form-control text-center" name="titre" id="titre" placeholder="Titre de l'article">
                </div>

                <div class="form-group col-6 offset-3 mt-4">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="img" id="img">
                </div>

                <div class="form-group col-6 offset-3 mt-4">
                    <label for="texte">Texte</label>
                    <textarea class="form-control text-center" name="texte" id="texte" rows="3" placeholder="Votre article"></textarea>
                </div>

                <div class="form-group col-6 offset-3 mt-4">
                    <label for="categorie">Categorie</label>
                    <select class="custom-select" name="categorie" id="categorie">
                    <?php 
                        foreach($categories as $categorie){?>
                        <option value="<?php echo $categorie['ID']?>"><?php echo $categorie['nom_categorie']?><?php }?></option>
                    </select>
                </div>

                <div class="form-group col-6 offset-3 mt-4">
                    <label for="date">Date Creation</label>
                    <input type="date" class="form-control text-center" name="date" id="date">
                </div>



                <div class="mt-4">
                <button type="submit" class="btn btn-success mb-5">Soumettre</button>
                </div>

            </form>

        </div>
    </div>
</div>