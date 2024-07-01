

<div class="featured-products container-fluid bg-light" >
    <div class="container py-4">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="fs-3">Sản Phẩm nổi bật</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($featureProducts as $product) : ?>
                <div class="col-3 mb-3">
                    <div class="card border-0">
                        <img src="<?php echo _WEB_ROOT . $product['cover_image_url'] ?>" class="card-img-top img-fluid" alt="Product Image" >
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $product['title'] ?></h5>
                            <p class="card-text text-center">Giá: <?php echo $product['price'] ?> VNĐ</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<hr class="mb-3">

<div class="featured-products container-fluid bg-light" >
    <div class="container py-4">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="fs-3">One Piece</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($OP_Products as $product) : ?>
                <div class="col-3 mb-3">
                    <div class="card border-0">
                        <img src="<?php echo _WEB_ROOT . $product['cover_image_url'] ?>" class="card-img-top img-fluid" alt="Product Image" >
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $product['title'] ?></h5>
                            <p class="card-text text-center">Giá: <?php echo $product['price'] ?> VNĐ</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<hr class="mb-3">

<div class="featured-products container-fluid bg-light" >
    <div class="container py-4">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="fs-3">Naruto</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($Naruto_Products as $product) : ?>
                <div class="col-3 mb-3">
                    <div class="card border-0">
                        <img src="<?php echo _WEB_ROOT . $product['cover_image_url'] ?>" class="card-img-top img-fluid" alt="Product Image" >
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $product['title'] ?></h5>
                            <p class="card-text text-center">Giá: <?php echo $product['price'] ?> VNĐ</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<hr class="mb-3">

<div class="featured-products container-fluid bg-light" >
    <div class="container py-4">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="fs-3">Dragon Ball</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($DB_Products as $product) : ?>
                <div class="col-3 mb-3">
                    <div class="card border-0">
                        <img src="<?php echo _WEB_ROOT . $product['cover_image_url'] ?>" class="card-img-top img-fluid" alt="Product Image" >
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $product['title'] ?></h5>
                            <p class="card-text text-center">Giá: <?php echo $product['price'] ?> VNĐ</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
