<button class="btn btn-bg-light border border-secondary-subtle btn-back"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
  </svg></button>
<div class="container">
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-4">
      <img src="<?php echo _WEB_ROOT . $product['cover_image_url']; ?>" alt="Ảnh Bìa" class="product-image img-fluid">
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-5">
      <div class="product-details">
        <h5 class="mb-3 font-monospace">Tác Giả: <?php echo $product['author_name']; ?></h5>
        <h5 class="mb-3 font-monospace">Tiêu Đề: <?php echo $product['title']; ?></h5>
        <h5 class="mb-3 font-monospace">Thể Loại: <?php echo $product['genre']; ?></h5>

        <h5 class="mb-3 font-monospace">Ngày phát hành: <?php echo $product['release_date']; ?></h5>
        <h5 class="mb-3 font-monospace">Giá: <?php echo $product['price']; ?></h5>
        <h5 class="mb-3 font-monospace">Trạng Thái: <?php
                                                    if ($product['status'] == "active") {
                                                      echo '<button  class="badge text-bg-success text-decoration-none border-0" > Hoạt động</button>';
                                                    } else {
                                                      echo '<button  class="badge text-bg-danger text-decoration-none border-0" >Dừng hoạt động</button>';
                                                    } ?>
        </h5>
        <h5 class="mb-3 font-monospace">Mô Tả: <p><?php echo $product['description']; ?></p>
        </h5>
      </div>
    </div>
  </div>
</div>
<script>
  const btnBack = document.querySelector('.btn-back');
  if(btnBack){
    btnBack.addEventListener("click",() => {
      window.history.back()
    });
  }
</script>