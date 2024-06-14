<?php
// include("./config/config.php");

// lấy sản phẩm
function get_product()
{
    global $connect;
    $select_query = "SELECT * FROM `tbl_products` LIMIT 0,4";
    $result_query = mysqli_query($connect, $select_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price_new = number_format($row['product_price_new'], 0, ',', '.');
        $product_price_old = number_format($row['product_price_old'], 0, ',', '.');
        $category_id = $row['category_id'];
        if ($product_price_old != 0) {
            echo "
            <div class='col col-half card-product'>
                <div class='baongoai-img'>
                    <ul class='list-product'>
                        <li>
                            <div class='hover-btn'>
                                <img src='../admin/product_images/$product_image1' alt='$product_title'
                                    class='product-img'>
                                <div style='display: flex;' class='nut_2'>
                                    <a href='index.php?add_to_cart=$product_id' class='name js-buy-now' style='cursor: pointer;'>Mua ngay</a>
                                    <a class='name'
                                        href='detail.php?product_id=$product_id'>Chi tiết</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class='info-product'>
                    <p><a href='detail.php?product_id=$product_id'>$product_title</a></p>
                    <div class='product-price'>
                        <p>$product_price_new ₫</p>
                        <p>$product_price_old ₫</p>
                    </div>
                </div>
            </div>";
        } else {
            echo "
                <div class='col col-half card-product'>
                        <div class='baongoai-img'>
                            <ul class='list-product'>
                                <li>
                                    <div class='hover-btn'>
                                        <img src='../admin/product_images/$product_image1' alt='$product_title'
                                            class='product-img'>
                                        <div style='display: flex;' class='nut_2'>
                                            <a href='index.php?add_to_cart=$product_id' class='name js-buy-now' style='cursor: pointer;'>Mua ngay</a>
                                            <a class='name'
                                                href='detail.php?product_id=$product_id'>Chi tiết</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    <div class='info-product'>
                        <p><a href='detail.php?product_id=$product_id'>$product_title</a></p>
                        <div class='product-price'>
                            <p>$product_price_new ₫</p>
                            </div>
                    </div>
                </div>";
        }
    }
}

// sản phẩm bán chạy index 
function hot_product_index()
{
    global $connect;
    $select_query = "SELECT * FROM `tbl_products` LIMIT 0,6";
    $result_query = mysqli_query($connect, $select_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price_new = number_format($row['product_price_new'], 0, ',', '.');
        $product_price_old = number_format($row['product_price_old'], 0, ',', '.');
        $category_id = $row['category_id'];

        if ($product_price_old != 0) {
            echo "
            <form action='cart.php' method='post'>
            <div class='col col-third card-product'>
                <div class='baongoai-img'>
                    <ul class='list-product'>
                        <li>
                            <div class='hover-btn'>
                                <img src='../admin/product_images/$product_image1' alt='$product_title'
                                    class='product-img'>
                                <div style='display: flex;' class='nut_2'>
                                    <a href='index.php?add_to_cart=$product_id' class='name js-buy-now' style='cursor: pointer;'>Mua ngay</a>
                                    <a class='name'
                                        href='detail.php?product_id=$product_id'>Chi tiết</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class='info-product'>
                    <p><a href='detail.php?product_id=$product_id'>$product_title</a></p>
                    <div class='product-price'>
                        <p>$product_price_new ₫</p>
                        <p>$product_price_old ₫</p>
                    </div>
                    
                </div>
            </div>
        </form>
            ";
        } else {
            echo "
            <form action='cart.php' method='post'>
            <div class='col col-third card-product'>
            <div class='baongoai-img'>
            <ul class='list-product'>
                <li>
                    <div class='hover-btn'>
                        <img src='../admin/product_images/$product_image1' alt='$product_title'
                            class='product-img'>
                        <div style='display: flex;' class='nut_2'>
                            <a href='index.php?add_to_cart=$product_id' class='name js-buy-now' style='cursor: pointer;'>Mua ngay</a>
                            <a class='name'
                                href='detail.php?product_id=$product_id'>Chi tiết</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
                <div class='info-product'>
                    <p><a href='detail.php?product_id=$product_id'>$product_title</a></p>
                    <div class='product-price'>
                        <p>$product_price_new ₫</p>
                    </div>
                    
                </div>
            </div>
        </form>
            ";
        }
    }
}


// in ra chi tiết sản phẩm
function get_product_detail()
{
    global $connect;
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $select_query = "SELECT * FROM `tbl_products` WHERE product_id=$product_id";
        $result_query = mysqli_query($connect, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_price_new = number_format($row['product_price_new'], 0, ',', '.');
            $product_price_old = number_format($row['product_price_old'], 0, ',', '.');
            $category_id = $row['category_id'];
            echo "
            <div class='detailinfo'>
            <div class='left-column'>
                <div class='box-hover'>
                    <img src='../images/selling_product/$product_image1' alt=''>
                    <img src='../images/selling_product/$product_image2' alt='' class='img-'>
                </div>
            </div>

            <div class='right-column'>
                <h1>$product_title</h1>
                <h4>Còn hàng</h4>
                <h1 style='color: red; font-weight:100;'>{$product_price_new} ₫</h1>
                <p>$product_description</p>
                <div id='buy-amount'>
                    <label style='padding: 15px 15px 0px 0px;' for='quantity'>SỐ LƯỢNG:</label>
                    <button class='minus-btn' onclick='handleMinus()'>
                        <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                            <path stroke-linecap='round' stroke-linejoin='round' d='M19.5 12h-15' />
                        </svg>
                    </button>
                    <input type='text' name='amount' id='amount' value='1'>
                    <button class='plus-btn' onclick='handlePlus()'>
                        <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                            <path stroke-linecap='round' stroke-linejoin='round' d='M12 4.5v15m7.5-7.5h-15' />
                        </svg>
                    </button>
                    <a href='detail.php?add_to_cart=$product_id' style='cursor: pointer;' class='buy js-buy-now'>MUA NGAY</a>
                </div>

                <div class='blackcall'>
                    <i><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                            <path stroke-linecap='round' stroke-linejoin='round' d='M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z' />
                        </svg>
                    </i>
                    <div style='padding:3px 0px 0px 20px;' class='text'>
                        <h4>GỌI NGAY 19006750</h4>
                        <h5>(Đặt Hàng Nhanh Chóng)</h5>
                    </div>
                </div>
            </div>

           

        </div>
            ";
        }
    }
}

// tất cả sản phẩm
function get_all_product()
{
    global $connect;

    // phân trang web 
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "";
    }
    if ($page == "" || $page == 1) {
        $begin = 0;
    } else {
        $begin = ($page * 9) - 9;
    }
    if (!isset($_GET['category'])) {
        $select_query = "SELECT * FROM `tbl_products`  LIMIT $begin,9 ";
        $result_query = mysqli_query($connect, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price_new = number_format($row['product_price_new'], 0, ',', '.');
            $product_price_old = number_format($row['product_price_old'], 0, ',', '.');
            $category_id = $row['category_id'];
            if ($product_price_old != 0) {
                echo "
                    <form action='cart.php' method='post'>
                        <div class='col col-third card-product'>
                            <div class='baongoai-img'>
                                <ul class='list-product'>
                                    <li>
                                        <div class='hover-btn'>
                                            <img src='../admin/product_images/$product_image1' alt='$product_title'
                                                class='product-img'>
                                            <div style='display: flex;' class='nut_2'>
                                                <a href='products.php?add_to_cart=$product_id' class='name js-buy-now' style='cursor: pointer;'>Mua ngay</a>
                                                <a class='name'
                                                    href='detail.php?product_id=$product_id'>Chi tiết</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class='info-product'>
                                <p><a href='detail.php?product_id=$product_id'>$product_title</a></p>
                                <div class='product-price'>
                                    <p>$product_price_new ₫</p>
                                    <p>$product_price_old ₫</p>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                    ";
            } else {
                echo "
                    <form action='cart.php' method='post'>
                    <div class='col col-third card-product'>
                    <div class='baongoai-img'>
                    <ul class='list-product'>
                        <li>
                            <div class='hover-btn'>
                                <img src='../admin/product_images/$product_image1' alt='$product_title'
                                    class='product-img'>
                                <div style='display: flex;' class='nut_2'>
                                    <a href='products.php?add_to_cart=$product_id' class='name js-buy-now' style='cursor: pointer;'>Mua ngay</a>
                                    <a class='name'
                                        href='detail.php?product_id=$product_id'>Chi tiết</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                        <div class='info-product'>
                            <p><a href='detail.php?product_id=$product_id'>$product_title</a></p>
                            <div class='product-price'>
                                <p>$product_price_new ₫</p>
                            </div>
                            
                        </div>
                    </div>
                </form>
                ";
            }
        }
    }
}


// hiển thị danh mục
function categories()
{
    global $connect;
    $select_categories = "SELECT * FROM `tbl_categories`";
    $result_categories = mysqli_query($connect, $select_categories);
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];

        echo "
            <li >
                <a href='products.php?category=$category_id'>$category_title</a>
            </li>
            ";
    }
}




// lấy ra từng phần trong danh mục
function get_unique_categories()
{
    global $connect;
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM `tbl_products` WHERE category_id=$category_id";
        $result_query = mysqli_query($connect, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
        } else {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price_new = number_format($row['product_price_new'], 0, ',', '.');
                $product_price_old = number_format($row['product_price_old'], 0, ',', '.');
                $category_id = $row['category_id'];
                if ($product_price_old != 0) {
                    echo "
                    <div class='col col-third card-product'>
                        <div class='baongoai-img'>
                            <ul class='list-product'>
                                <li>
                                    <div class='hover-btn'>
                                        <img src='../admin/product_images/$product_image1' alt='$product_title'
                                            class='product-img'>
                                        <div style='display: flex;' class='nut_2'>
                                            <a href='index.php?add_to_cart=$product_id' class='name js-buy-now' style='cursor: pointer;'>Mua ngay</a>
                                            <a class='name'
                                                href='detail.php?product_id=$product_id'>Chi tiết</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                            <div class='info-product'>
                                <p><a href='detail.php?product_id=$product_id'>$product_title</a></p>
                                <div class='product-price'>
                                    <p>$product_price_new ₫</p>
                                    <p>$product_price_old ₫</p>
                                </div>
                            </div>
                    </div>";
                } else {
                    echo "
                    <div class='col col-third card-product'>
                        <div class='baongoai-img'>
                            <ul class='list-product'>
                                <li>
                                    <div class='hover-btn'>
                                        <img src='../admin/product_images/$product_image1' alt='$product_title'
                                            class='product-img'>
                                        <div style='display: flex;' class='nut_2'>
                                            <a href='index.php?add_to_cart=$product_id' class='name js-buy-now' style='cursor: pointer;'>Mua ngay</a>
                                            <a class='name'
                                                href='detail.php?product_id=$product_id'>Chi tiết</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                            <div class='info-product'>
                                <p><a href='detail.php?product_id=$product_id'>$product_title</a></p>
                                <div class='product-price'>
                                    <p>$product_price_new ₫</p>
                                </div>
                            </div>
                    </div>";
                }
            }
        }
    }
}

// in ra sản phẩm bán chạy
function hot_product()
{
    global $connect;
    $select_query = "SELECT * FROM `tbl_products` LIMIT 0,5";
    $result_query = mysqli_query($connect, $select_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price_new = number_format($row['product_price_new'], 0, ',', '.');
        $product_price_old = number_format($row['product_price_old'], 0, ',', '.');
        $category_id = $row['category_id'];

        if ($product_price_old != 0) {
            echo "
                <div style='margin-bottom: 36px; border-bottom:1px solid #ddd ;' class='row'>
                    <div style='margin-bottom: 30px;' class='col col-third'>
                        <img src='../admin/product_images/$product_image1' alt='' class='product-img'>
                    </div>
                    <div class='col col-two-third'>
                        <div style='padding:0 ;' class='info-product'>
                            <p><a href='detail.php?product_id=$product_id'>$product_title</a></p>
                            <div style='margin: 0px 0; display: block;' class='product-price'>
                                <p>$product_price_new ₫</p>
                                <p>$product_price_old ₫</p>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        } else {
            echo "
                <div style='margin-bottom: 36px; border-bottom:1px solid #ddd ;' class='row'>
                    <div class='col col-third'>
                        <img src='../admin/product_images/$product_image1' alt='' class='product-img'>
                    </div>
                    <div style='margin-bottom: 20px' class='col col-two-third'>
                        <div style='padding:0 ;' class='info-product'>
                            <p><a href='detail.php?product_id=$product_id'>$product_title</a></p>
                            <div style='margin: 0px 0;' class='product-price'>
                                <p>$product_price_new ₫</p>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
    }
}

// tìm kiếm sản phẩm
function search()
{
    global $connect;
    $sql = "";
    if (isset($_POST['btn_search'])) {
        $search_txt = $_POST['search_txt'];
        $sql = "SELECT * FROM `tbl_products` WHERE product_title like '%" . $search_txt . "%'";
    } else {
        $sql = "SELECT * FROM tbl_products order by product_id DESC";
    }
    $result_query = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result_query) > 0) {
        while ($row = mysqli_fetch_assoc($result_query)) {

            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price_new = number_format($row['product_price_new'], 0, ',', '.');
            $product_price_old = number_format($row['product_price_old'], 0, ',', '.');
            $category_id = $row['category_id'];
            if ($product_price_old != 0) {
                echo "
                <div class='search-single-product'>
                        <div class='search-product'>
                            <div class='product-img_search'>
                                <a href=''>
                                    <img src='../images/selling_product/$product_image1' alt='$product_title'>
                                </a>
                            </div>
                        </div>

                        <div class='info-product_search'>
                            <h3>
                                <a href='detail.php?product_id=$product_id'>$product_title</a>
                            </h3>

                            <div class='price-product_search'>
                                <small>$product_price_new ₫</small>
                            </div>

                            <div class='desc-product_search'>
                                <p>Cần bán lại căn hộ 2 phòng ngủ tại Khu phức hợp cao cấp Pearl Plaza, căn hộ có góc
                                    nhìn được 02 mặt tiền đường và sông Sai Gòn. Được hưởng tất cả các tiện ích của khu
                                    phức hợp như: Trung tâm mua sắm..</p>
                            </div>

                        </div>

                    </div>
                    ";
            } else {
                echo "<div class='col col-third card-product'>
                        <img src='../admin/product_images/$product_image1' alt='$product_title' class='product-img'>
                        <div class='info-product'>
                            <p><a href='detail.php?product_id=$product_id'>$product_title</a></p>
                            <div class='product-price'>
                                <p>$product_price_new ₫</p>
                            </div>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                        </div>
                    </div>";
            }
        }
    }
}

//in ra sản phẩm khuyến mãi
function promotion_product()
{
    global $connect;
    $select_query = "SELECT * FROM `tbl_products` LIMIT 0,4";
    $result_query = mysqli_query($connect, $select_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price_new = number_format($row['product_price_new'], 0, ',', '.');
        $product_price_old = number_format($row['product_price_old'], 0, ',', '.');
        $category_id = $row['category_id'];
        if ($product_price_old != 0) {
            echo "
            <div class='col col-four card-product'>
                <ul class='list-product'>
                    <li>
                        <div class='hover-btn'>
                            <img src='../images/selling_product/$product_image1' alt='$product_title' class='product-img'>
                            <div style='display: flex;' class='nut_2'>
                                <a href='index.php?add_to_cart=$product_id' class='name js-buy-now' style='cursor: pointer;margin-left: 3px;
                                padding: 10px 11px;'>Mua ngay</a>
                                <a href='detail.php?product_id=$product_id' class='name' style='margin-left: 118px;
                                padding: 10px 20px;' href='detail.php?product_id=$product_id'>Chi tiết</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class='info-product'>
                    <p><a href='detail.php?product_id=$product_id'>$product_title</a></p>
                    <div class='product-price'>
                    <p>$product_price_new ₫</p>
                    <p>$product_price_old ₫</p>
                    </div>
                </div>
            </div>
            ";
        } else {
            echo "
            <div class='col col-four card-product'>
                <ul class='list-product'>
                    <li>
                    <div class='hover-btn'>
                    <img src='../images/selling_product/$product_image1' alt='$product_title' class='product-img'>
                    <div style='display: flex;' class='nut_2'>
                        <a href='index.php?add_to_cart=$product_id' class='name js-buy-now' style='cursor: pointer;margin-left: 3px;
                        padding: 10px 11px;'>Mua ngay</a>
                        <a href='detail.php?product_id=$product_id' class='name' style='margin-left: 118px;
                        padding: 10px 20px;' href='detail.php?product_id=$product_id'>Chi tiết</a>
                    </div>
                </div>
                    </li>
                </ul>
                <div class='info-product'>
                    <p><a href='detail.php?product_id=$product_id'>$product_title</a></p>
                    <div class='product-price'>
                    <p>$product_price_new ₫</p>
                    </div>
                </div>
            </div>    
            ";
        }
    }
}


// hàm lấy địa chỉ ip
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// in ra giỏ hàng sản phẩm
function pay_product()
{
    global $connect;
    $get_ip_add = getIPAddress();
    $total_price = 0;
    $select_query = "SELECT * FROM `tbl_products` LIMIT 0,5";
    $result_query = mysqli_query($connect, $select_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price_new = number_format($row['product_price_new'], 0, ',', '.');
        $product_price_old = number_format($row['product_price_old'], 0, ',', '.');
        $category_id = $row['category_id'];
        echo "
        <form action='cart.php' method='post'>
            <div class='cart-item'>
                <div style='width: 17% ;' class='imgage'>
                    <a href='' class='product-img'>
                        <img width='75px' height='auto' alt='' src='../admin/product_images/$product_image1' alt=''>
                    </a>
                </div>
                <div style='width: 33% ;'>
                    <h2 class='product-name'>
                        <a href='#'>$product_title</a>
                    </h2>
                    <span class='variant-title' style='display: none;'>Default Title</span>
                </div>
                <div style='width: 15% ;' class='a-center'>
                    <span class='item-price'>
                        <span class='price'>$product_price_new</span>
                    </span>
                </div>
                <div style='width: 14% ;' class='a-center'>
                    <div class='input-number-pr'>
                        <!-- <input class='variantID' type='hidden' name='variantId' value='12107814'> -->
                        <button class='cart-btn-minus'>
                            <i class='fa-solid fa-caret-left'></i>
                        </button>
                        <input type='text' value='1' class='num-pro'>
                        <button class='cart-btn-plus'>
                            <i class='fa-solid fa-caret-right'></i>
                        </button>
                    </div>
                </div>
                <div style='width: 15% ;' class='a-center'>
                    <span class='item-price'>
                        <span class='price price-change'>$product_price_new</span>
                    </span>
                </div>
                <div style='width: 6% ;' class='a-center'>
                    <a href='cart.php?remove=delete&product_id=$product_id' class='cart-remove-pr'>
                        <i class='fa-solid fa-trash-can'></i>
                    </a>
                </div>
            </div>
        </form>
            ";
    }
}
//tìm kiếm chó phú
function search_products()
{
    global $connect;

    if (isset($_POST['timkiem'])) {
        $tukhoa = $_POST["tukhoa"];
        $select_query = "SELECT * FROM tbl_products where product_title like '%" . $tukhoa . "%' ";
        $result_query = mysqli_query($connect, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price_new = number_format($row['product_price_new'], 0, ',', '.');
            $product_price_old = number_format($row['product_price_old'], 0, ',', '.');
            $category_id = $row['category_id'];

            echo "
            <div class='search-single-product'>
                <div class='search-product'>
                    <div class='product-img_search'>
                        <a href='detail.php?product_id=$product_id'>
                            <img src='../images/selling_product/$product_image1' alt=''>
                        </a>
                    </div>
                </div>

                <div class='info-product_search'>
                    <h3>
                        <a href='detail.php?product_id=$product_id' >$product_title</a>
                    </h3>

                    <div class='price-product_search'>
                        <small>$product_price_new ₫</small>
                    </div>

                    <div class='desc-product_search'>
                        <p>$product_description</p>
                    </div>

                </div>

            </div>
            ";
        }
    }
}


// hàm lấy số sản phẩm
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $connect;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * from  `tbl_cart_details` where ip_address='$get_ip_add' ";
        $result_query = mysqli_query($connect, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
        if ($result_query) {

            echo "<script>alert('Đã thêm vào giỏ hàng thành công')</script>";
            echo "<script>window.open('../pages/index.php','_self')</script>";
        }
    } else {
        global $connect;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * from  `tbl_cart_details` where ip_address='$get_ip_add' ";
        $result_query = mysqli_query($connect, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

// hàm khi nhấn thêm giỏ hàng giỏ hàng sẽ tăng số lượng trong giỏ hàng
function cart()

{
    if (isset($_GET['add_to_cart'])) {
        global $connect;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * from  `tbl_cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
        $result_query = mysqli_query($connect, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('Sản phẩm này đã có trong  giỏ hàng')</script>";
            echo "<script>window.open('../pages/index.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO `tbl_cart_details` (product_id,ip_address,quantity) values($get_product_id,'$get_ip_add',1)";
            $result_query = mysqli_query($connect, $insert_query);
            echo "<script>alert('Đã thêm vào giỏ hàng thành công')</script>";
            echo "<script>window.open('../pages/index.php','_self')</script>";
        }
    }
}

// hàm tổng tiền 
function total_cart_price()
{
    global $connect;
    $get_ip_add = getIPAddress();
    $total_price = 0;
    $cart_query = "SELECT * FROM `tbl_cart_details` where ip_address='$get_ip_add'";
    $result = mysqli_query($connect, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_product = "SELECT * FROM `tbl_products` where product_id='$product_id'";
        $result_products = mysqli_query($connect, $select_product);
        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price_new']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}


// xóa sản phẩm trong cart
function delete_product()
{
    global $connect;
    if (isset($_POST['remove_cart'])) {
        foreach ($_POST['remove_item'] as $remove_id) {
            echo $remove_id;
            $delete_query = "DELETE from `tbl_cart_details` where product_id=$remove_id";
            $run_delete = mysqli_query($connect, $delete_query);
            if ($run_delete) {
                echo "<script>alert('Đã xóa thành công')</script>";
            }
        }
    }
}

// xóa từng thành phần trong giỏ hàng
function delete_item()
{
    global $connect;
    if (isset($_GET['task']) && $_GET['task' == 'delete']) {
        $product_id = $_GET['product_id'];
        $sql_delete = "DELETE from tbl_cart_details WHERE product_id=$product_id";
        if (mysqli_query($connect, $sql_delete)) {
            echo "<script>alert('Đã xóa thành công')</script>";
        }
    }
}
