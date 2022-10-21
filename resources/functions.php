<?php require_once("config.php"); ?>
<?php
// helper functions for front end
$ip_add = getenv("REMOTE_ADDR");

function last_id()
{
    global $conn;
    return mysqli_insert_id($conn);
}


function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['msg'] = $msg;
    } else {
        $msg = "";
    }
}


function display_message()
{
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
}

function display_user()
{
    if (isset($_SESSION['username'])) {
        echo $_SESSION['username'];
        // unset($_SESSION['user_email']);
    }
}


function admin_message()
{
    if (isset($_SESSION['user_email'])) {
        echo $_SESSION['user_email'];
        // unset($_SESSION['user_email']);
    }
}

function redirect($location)
{
    header("Location: $location");
}

function query($sql)
{
    global $conn;
    return mysqli_query($conn, $sql);
}

function confirm($result)
{
    global $conn;

    if (!$result) {
        die("QUERY FAILED " . mysqli_error($conn));
    }
}

function escape_string($string)
{
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}

function fetch_array($result)
{
    return $result->fetch_assoc();
}

function categories()
{
    $query = query("SELECT * FROM categories");
    confirm($query);
    while ($row = fetch_array($query)) {
        $cat_title = <<<DELIMETER
        <li class='list-group-item'><a href="/e_commerce/public/shop/{$row['cat_id']}/{$row['cat_title']}" class="text-dark">{$row['cat_title']}</a></li>
        DELIMETER;
        echo $cat_title;
    }
}

function brands()
{
    $query = query("SELECT * FROM brands");
    confirm($query);
    while ($row = fetch_array($query)) {
        $brand_links = <<<DELIMETER
        <li class='list-group-item'><a href="#" class="text-dark">{$row['brand_name']}</a></li>
        DELIMETER;
        echo $brand_links;
    }
}

// get the product from the database;
function product_count()
{
    $query = query("SELECT * FROM products");
    confirm($query);
    $count = mysqli_num_rows($query);
    echo $count;
}


function displayNaturalshampoo($cat_id = "4")
{
    $query = query("SELECT * FROM products WHERE product_category_id='{$cat_id}' LIMIT 0, 8");
    confirm($query);
    while ($row = fetch_array($query)) {

        $product_title = substr($row['product_title'], 0, 5) . "..";

        $products = <<<DELIMETER
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 mb-3 text-center">
                    <div class="card" style="padding:0px; border-radius:14px;">
                        <div class="card-body">
                            <a href="single-product/{$row["product_id"]}/{$row["product_category_id"]}">
                                <img src="/e_commerce/resources/uploads/{$row['product_image']}" alt='' style='height:150px; border-radius:12px;'>
                            </a>
                        </div>
                        <div class="card-footer text-center">
                            <div>
                                <h6 class='mb-0'>{$product_title}</h6>
                                <p class="text-bold">&#36;{$row['product_price']}</p>
                            </div>
                            <a href="/e_commerce/public/cart/{$row["product_id"]}" add="{$row["product_id"]}" style="background-color:#F28123; border-radius:6px" class="btn btn-sm text-white product" >
                            Add to <i class="fas fa-shopping-cart"></i></a>
                            </form>
                        </div>
                    </div>
                </div>
        DELIMETER;
        echo $products;
    }
}


function displayProductByCategories($cat_id = "7")
{
    $query = query("SELECT * FROM products WHERE product_category_id='{$cat_id}' LIMIT 0, 8");
    confirm($query);
    while ($row = fetch_array($query)) {
        $product_title = substr($row['product_title'], 0, 5) . "..";
        $products = <<<DELIMETER
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12 col-6 mb-3 text-center">
                    <div class="card" style="padding:0px; border-radius:14px;">
                        <div class="card-body">
                            <a href="single-product/{$row["product_id"]}/{$row["product_category_id"]}">
                                <img src="/e_commerce/resources/uploads/{$row['product_image']}" alt='' style='height:150px; border-radius:12px;'>
                            </a>
                        </div>
                        <div class="card-footer text-center">
                            <div>
                                <h6 class='mb-0'>{$product_title}</h6>
                                <p class="text-bold">&#36;{$row['product_price']}</p>
                            </div>
                            <a href="/e_commerce/public/cart/{$row["product_id"]}" add="{$row["product_id"]}" style="background-color:#F28123; border-radius:6px" class="btn btn-sm text-white product" >
                            Add to <i class="fas fa-shopping-cart"></i></a>
                            </form>
                        </div>
                    </div>
                </div>
        DELIMETER;
        echo $products;
    }
}

// onClick="document.location.reload(true)"


// display product categories in the shop page;
function displayProductByCategoriesInShop($cat_id = "5")
{
    $query = query("SELECT * FROM products WHERE product_category_id='5' LIMIT 0,12");
    confirm($query);
    while ($row = fetch_array($query)) {
        $product_title = substr($row['product_title'], 0, 5) . "..";
        $products = <<<DELIMETER
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 text-center mb-3">
                    <div class="card" style="padding:0px; border-radius:14px;">
                        <div class="card-body">
                            <a href="single-product/{$row["product_id"]}/{$row["product_category_id"]}">
                                <img src="/e_commerce/resources/uploads/{$row['product_image']}" alt='' style='height:150px; border-radius:12px;'>
                            </a>
                        </div>
                        <div class="card-footer text-center">
                            <div>
                                <h6 class='mb-0'>{$product_title}</h6>
                                <p class="text-bold">&#36;{$row['product_price']}</p>
                            </div>
                            <a href="/e_commerce/public/cart/{$row["product_id"]}" add="{$row["product_id"]}" style="background-color:#F28123; border-radius:6px" class="btn btn-sm text-white product">
                            Add to <i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
        DELIMETER;
        echo $products;
    }
}


function shopProducts()
{
    //&cat_id={$row["product_category_id"]}
    $query = query("SELECT * FROM products ORDER BY product_keywords");
    confirm($query);
    while ($row = fetch_array($query)) {
        $product_title = substr($row['product_title'], 0, 9) . "..";

        $shop_products = <<<DELIMETER
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 mb-3 text-center">
            <div class="card" style="padding:0px; border-radius:14px;">
                <div class="card-body">
                    <a href="single-product/{$row["product_id"]}/{$row["product_category_id"]}">
                        <img src="/e_commerce/resources/uploads/{$row['product_image']}" alt='' style='height:150px; border-radius:12px;'>
                    </a>
                </div>
                <div class="card-footer text-center">
                    <div>
                        <h6 class='mb-0'>{$product_title}</h6>
                        <p class="text-bold">&#8358;{$row['product_price']}</p>
                    </div>
                    <a href="/e_commerce/public/cart/{$row["product_id"]}" add="{$row["product_id"]}"  style="background-color:#F28123; border-radius:6px" class="btn btn-sm text-white product">
                    Add to <i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>
        DELIMETER;
        echo $shop_products;
    }
}

// ////////////////////****BACKEND FUNCTIONS****///////////////////////////////////////////
function orders_count()
{
    $query = query("SELECT * FROM orders");
    confirm($query);
    $count = mysqli_num_rows($query);
    echo $count;
}

function orders()
{
    $order_query = query("SELECT * FROM orders ORDER BY order_id DESC ");
    confirm($order_query);
    while ($row = fetch_array($order_query)) {
        $orders = <<<DELIMETER
                <tr>
                <td>{$row['order_id']}</td>
                <td>{$row['order_amount']}</td>
                <td>{$row['order_transaction']}</td>
                <td>{$row['order_currency']}</td>
                <td>{$row['order_status']}</td>
                <td>{$row['order_date']}</td>
                <td><a href='../../resources/templates/back/delete_order.php?remove={$row['order_id']}' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a></td>
                </tr>
        DELIMETER;
        echo $orders;
    }
}

function get_products_in_admin()
{
    $product_query = query("SELECT * FROM products ORDER BY product_id DESC ");
    confirm($product_query);
    while ($row = fetch_array($product_query)) {
        $cat_title = show_product_category_title($row['product_category_id']);
        $products = <<<DELIMETER
                <tr>
                <td style='vertical-align:middle;'>{$row['product_id']}</td>
                <td style='vertical-align:middle;'>{$row['product_title']}</td>
                <td style='vertical-align:middle;'><a href='index.php?edit_product&p_id={$row['product_id']}'><img src="../../resources/uploads/{$row['product_image']}" width='150px' class='img-responsive' alt='image'></a></td>
                <td style='vertical-align:middle;'>{$cat_title}</td>
                <td style='vertical-align:middle;'>{$row['product_quantity']}</td>
                <td style='vertical-align:middle;'>{$row['product_price']}</td>
                <td style='vertical-align:middle;'>
                <a href='../../resources/templates/back/delete_product.php?p_id={$row['product_id']}' class='btn btn-danger' style='margin-bottom:2px;'><span class='glyphicon glyphicon-remove'></span></a>
                <a href='index.php?edit_product&p_id={$row['product_id']}' class='btn btn-info' style='margin-bottom:2px;'><span class='glyphicon glyphicon-edit'></span></a>
                </td>
                </tr>
        DELIMETER;
        echo $products;
    }
}

//***********Product  SEction********** */
function add_product()
{
    if (isset($_POST['publish'])) {

        $product_title = escape_string($_POST['product_title']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_brand_id = escape_string($_POST['product_brand_id']);
        $product_price = escape_string($_POST['product_price']);
        $product_description = escape_string($_POST['product_description']);
        //$short_desc = escape_string($_POST['short_desc']);
        $product_quantity = escape_string($_POST['product_quantity']);
        $product_image = escape_string($_FILES['file']['name']);
        $product_keywords = escape_string($_POST['product_keywords']);
        $image_tmp_location = $_FILES['file']['tmp_name']; //DON'T ALWAYS STRIPE THIS GUY, ELSE....


        if (
            !$product_title || !$product_category_id || !$product_brand_id || !$product_price || !$product_description || !$product_quantity || !$product_keywords || !$product_image
        ) {

            set_message("<h4><span class='text-danger'> All Fields are Required</span></h4>");
            redirect("index.php?add_product");
            die();
        } else {
            if (isset($_FILES['file']['name'])) {

                $product_image = escape_string($_FILES['file']['name']);

                if ($product_image !== "") {

                    $product_image_size = escape_string($_FILES['file']['size']);
                    $allowable_img_ext = ['jpg', 'png', 'jpeg'];
                    $ext = pathinfo($product_image, PATHINFO_EXTENSION);


                    if ($product_image_size > 2000000) {

                        set_message("<h3><span class='text-danger'>Image should be less than 2mb</span></h3>");
                        redirect("index.php?add_product");
                        die();
                    } else {
                        if (!in_array($ext, $allowable_img_ext)) {

                            set_message("<h4><span class='text-danger'> Allowable image types are jpg, png, jpeg</span></h4>");
                            redirect("index.php?add_product");
                            die();
                        } else {

                            $image_tmp_location = $_FILES['file']['tmp_name'];

                            $uploads = move_uploaded_file($image_tmp_location, UPLOAD_DIRECTORY . DS . $product_image);

                            if (!$uploads) {
                                set_message("<h4 class='text-center'>Failed To Upload Image</h4>");
                                redirect('index.php?add_product');
                                die();
                            }
                        }
                    }
                } else {
                    $product_image = escape_string($_FILES['file']['name']);
                }
            }

            $query = query("INSERT INTO products(product_category_id, product_brand_id, product_title, product_price, product_quantity, product_description, product_image, product_keywords) VALUES('{$product_category_id}', '{$product_brand_id}', '$product_title', '$product_price', '$product_quantity', '{$product_description}', '{$product_image}', '{$product_keywords}')");
            confirm($query);

            set_message("<h3><span class='text-success'>New Product Added</span></h3>");

            // $last_id = mysqli_insert_id($conn);

            redirect('index.php?products');
        }
    }
}

function edit_product()
{
    if (isset($_POST['update'])) {

        $p_id = $_GET['p_id'];

        $product_title = escape_string($_POST['product_title']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_brand_id = escape_string($_POST['product_brand_id']);
        $product_price = escape_string($_POST['product_price']);
        $product_description = escape_string($_POST['product_description']);
        //$short_desc = escape_string($_POST['short_desc']);
        $product_quantity = escape_string($_POST['product_quantity']);
        $product_keywords = escape_string($_POST['product_keywords']);
        $current_image = escape_string($_POST['current_image']);
        $product_image = escape_string($_FILES['file']['name']);
        $image_tmp_location = $_FILES['file']['tmp_name']; //DON'T ALWAYS STRIPE THIS GUY, ELSE....


        if (
            !$product_title || !$product_category_id || !$product_brand_id || !$product_price || !$product_description || !$product_quantity || !$product_keywords
        ) {

            set_message("<h4><span class='text-danger'> All Fields are Required</span></h4>");
            redirect("index.php?edit_product&p_id={$p_id}");
        } else {
            if (isset($_FILES['file']['name'])) {

                $product_image = escape_string($_FILES['file']['name']);

                if ($product_image !== "") {

                    $product_image_size = escape_string($_FILES['file']['size']);
                    $allowable_img_ext = ['jpg', 'png', 'jpeg'];
                    $ext = pathinfo($product_image, PATHINFO_EXTENSION);


                    if ($product_image_size > 2000000) {

                        set_message("<h3><span class='text-danger'>Image should be less than 2mb</span></h3>");
                        redirect("index.php?edit_product?p_id={$p_id}");
                        die();
                    } else {
                        if (!in_array($ext, $allowable_img_ext)) {

                            set_message("<h4><span class='text-danger'> Allowable image types are jpg, png, jpeg</span></h4>");
                            redirect("index.php?edit_product?p_id={$p_id}");
                            die();
                        } else {

                            $image_tmp_location = $_FILES['file']['tmp_name'];

                            $uploads = move_uploaded_file($image_tmp_location, UPLOAD_DIRECTORY . DS . $product_image);

                            if (!$uploads) {
                                set_message("<h4 class='text-center'>Failed To Upload Image</h4>");
                                redirect("index.php?edit_product?p_id={$p_id}");
                                die();
                            }
                        }

                        $current_image_path = UPLOAD_DIRECTORY . DS . $current_image;
                        unlink($current_image_path);

                        // $remove_image = 
                        // if (!$remove_image) {
                        //     set_message("<h4 class='text-center'>Failed To Remove Image</h4>");
                        //     redirect("index.php?edit_product?p_id={$p_id}");
                        // }
                    }
                } else {
                    $product_image = $current_image;
                }
            } else {
                $product_image = $current_image;
            }

            $query = query("UPDATE products SET product_category_id='{$product_category_id}', product_brand_id='{$product_brand_id}', product_title='{$product_title}', product_price='{$product_price}', product_quantity='{$product_quantity}', product_description='{$product_description}', product_image='{$product_image}', product_keywords='{$product_keywords}' WHERE product_id='{$p_id}'");
            confirm($query);

            set_message("<h3><span class='text-success'>Product Updated</span></h3>");

            // $last_id = mysqli_insert_id($conn);

            redirect('index.php?products');
        }
    }
}
//***********Product  SEction Ends********** */





// ****** Categories Section *********//

function categories_count()
{
    $query = query("SELECT * FROM categories");
    confirm($query);
    $count = mysqli_num_rows($query);
    echo $count;
}


function show_category_add_product_page()
{
    $category_query = query("SELECT * FROM categories");
    confirm($category_query);
    while ($row = fetch_array($category_query)) {
        $category_options = <<<DELIMETER
        <option value="{$row['cat_id']}">{$row['cat_title']}</option>
        DELIMETER;
        echo $category_options;
    }
}

function show_product_category_title($product_category_id)
{
    $category_title = query("SELECT * FROM categories WHERE cat_id='{$product_category_id}'");
    confirm($category_title);

    while ($cat_row = fetch_array($category_title)) {
        return $cat_row['cat_title'];
    }
}

function get_category()
{
    $query = query("SELECT * FROM categories ORDER BY cat_id DESC");
    confirm($query);
    while ($row = fetch_array($query)) {

        $get_category = <<<DELIMETER
                <tr>
                <td>{$row['cat_id']}</td>
                <td>{$row['cat_title']}</td>
                <td>
                <a href='../../resources/templates/back/delete_category.php?p_id={$row['cat_id']}' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a>
                <a href='index.php?categories&p_id={$row['cat_id']}' class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span></a>
                </td>
                </tr>
        DELIMETER;
        echo $get_category;
    }
}

function add_category()
{
    if (isset($_POST['add_category'])) {

        $cat_title = $_POST['cat_title'];

        if (!$cat_title) {
            set_message("<h4><span class='text-danger'> Can't Insert empty Field</span></h4>");
            redirect("index.php?categories");
            die();
        } else {
            $query = query("INSERT INTO categories(cat_title) VALUES('$cat_title')");
            confirm($query);
            set_message("<h4><span class='text-success'> Category Added</span></h4>");
            redirect("index.php?categories");
            die();
        }
    }
}

function edit_category()
{
    if (isset($_POST['update_cat'])) {
        $cat_title = $_POST['cat_title'];
        $cat_id = $_POST['cat_id'];
        $query = query("UPDATE categories SET cat_title='{$cat_title}' WHERE cat_id='{$cat_id}'");
        confirm($query);
        set_message("<h4><span class='text-success'> Category Updated</span></h4>");
        redirect("index.php?categories");
        die();
    }
}

// ****** Categories Section Ends *********//


//***********BRAND Section***************/
function brands_count()
{
    $query = query("SELECT * FROM brands");
    confirm($query);
    $count = mysqli_num_rows($query);
    echo $count;
}

function show_product_brand_title($product_brand_id)
{
    $brand_name = query("SELECT * FROM brands WHERE brand_id='{$product_brand_id}'");
    confirm($brand_name);

    while ($cat_row = fetch_array($brand_name)) {
        return $cat_row['brand_name'];
    }
}

function show_brand_add_product_page()
{

    $brands_query = query("SELECT * FROM brands");
    confirm($brands_query);
    while ($row = fetch_array($brands_query)) {
        $brand_options = <<<DELIMETER
        <option value="{$row['brand_id']}">{$row['brand_name']}</option>
        DELIMETER;
        echo $brand_options;
    }
}

function add_brand()
{
    if (isset($_POST['add_brand'])) {

        $brand_name = $_POST['brand_name'];

        if (!$brand_name) {
            set_message("<h4><span class='text-danger'> Can't Insert empty Field</span></h4>");
            redirect("index.php?brands");
            die();
        } else {
            $query = query("INSERT INTO brands(brand_name) VALUES('$brand_name')");
            confirm($query);
            set_message("<h4><span class='text-success'> Brand Added</span></h4>");
            redirect("index.php?brands");
            die();
        }
    }
}

function get_brands()
{
    $query = query("SELECT * FROM brands ORDER BY brand_id DESC");
    confirm($query);
    while ($row = fetch_array($query)) {
        $get_brand = <<<DELIMETER
                <tr>
                <td>{$row['brand_id']}</td>
                <td>{$row['brand_name']}</td>
                <td>
                <a href='../../resources/templates/back/delete_brand.php?p_id={$row['brand_id']}' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a>
                <a href='index.php?brands&p_id={$row['brand_id']}' class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span></a>
                </td>
                </tr>
        DELIMETER;
        echo $get_brand;
    }
}

function edit_brand()
{
    if (isset($_POST['update_brand'])) {

        $brand_id = $_POST['brand_id'];
        $brand_name = $_POST['brand_name'];

        $query = query("UPDATE brands SET brand_name='{$brand_name}' WHERE brand_id='{$brand_id}'");
        confirm($query);
        set_message("<h4><span class='text-success'> Brand Name Updated </span></h4>");
        redirect("index.php?brands");
    }
}
//***********BRAND Section Ends***************/


//*************REport section**********//
function get_reports()
{
    $query = query("SELECT * FROM reports ORDER BY report_id DESC");

    confirm($query);
    while ($row = fetch_array($query)) {
        $report_data = <<<DELIMETER
            <tr>
            <td>{$row['report_id']}</td>
            <td>{$row['product_title']}</td>
            <td>&#36;{$row['product_price']}</td>
            <td>{$row['product_quantity']}</td>
            <td>{$row['date_created']}</td>
            <td><a href='../../resources/templates/back/delete_report.php?p_id={$row['report_id']}' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a></td>
            </tr>
            DELIMETER;
        echo $report_data;
    }
}
//*************REport section Ends**********//

//*****Enquiry Section************ */
function contact_form()
{
    if (isset($_POST['contact_form'])) {

        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        if (!$fullname || !$email || !$mobile || !$subject || !$message) {
            set_message("<h4><span class='text-danger'> All fields are Required </span></h4>");
            redirect("contact.php");
        } else {
            $query = query("INSERT INTO contacts(name, email, mobile, subject, message) VALUES('{$fullname}', '{$email}', '{$mobile}', '{$subject}', '{$message}')");
            confirm($query);
            set_message("<h4><span class='text-danger'>Thanks for contacting, we'll get back to you. </span></h4>");
            redirect("contact.php");
        }
    }
}


function enquiry()
{
    $query = query("SELECT * FROM contacts ORDER BY contact_id DESC");
    confirm($query);
    while ($row = fetch_array($query)) {
        $enquiries =
            <<<DELIMETER
                <tr>
                <td>{$row['contact_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['mobile']}</td>
                <td>{$row['subject']}</td>
                <td>{$row['message']}</td>
                <td><a href='../../resources/templates/back/delete_enquiry.php?enquiry_id={$row['contact_id']}' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a></td>
                </tr>
            DELIMETER;
        echo $enquiries;
    }
}
//*****Enquiry Section Ends*************/


//****************** Customers Section ******************/
function users_count()
{
    $query = query("SELECT * FROM users");
    confirm($query);
    $count = mysqli_num_rows($query);
    echo $count;
}

function get_customers()
{
    // WHERE user_role='subscriber'
    $query = query("SELECT * FROM users ORDER BY user_id DESC");
    confirm($query);
    while ($row = fetch_array($query)) {
        $customers = <<<DELIMETER
                <tr>
                <td>{$row['user_id']}</td>
                <td>{$row['user_firstname']} {$row['user_lastname']}</td>
                <td>{$row['username']}</td>
                <td>{$row['user_email']}</td>
                <td>{$row['mobile']}</td>
                <td>{$row['user_address1']}</td>
                <td>{$row['user_city']}</td>
                <td>{$row['user_state']}</td>
                <td>{$row['user_role']}</td>
                <td><a href="/e_commerce/public/admin/index.php?customers&c_id={$row['user_id']}" class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span></a></td>
                </tr>
        DELIMETER;
        echo $customers;
    }
}


function edit_customer()
{
    if (isset($_POST['update_user'])) {

        $user_id = $_POST['user_id'];
        $user_role = $_POST['user_role'];

        $query = query("UPDATE users SET user_role='{$user_role}' WHERE user_id='{$user_id}'");
        confirm($query);
        set_message("<h4><span class='text-success'>User Role Updated</span></h4>");
        redirect("/e_commerce/public/admin/index.php?customers");
    }
}
//****************** Customers Section Ends ******************/

//********************* cart section starts******************/
if (isset($_POST['p_qty_id'])) {

    $p_qty_id = $_POST['p_qty_id'];
    $qty = $_POST['qty'];

    $query = query("UPDATE cart SET qty='{$qty}' WHERE p_id='{$p_qty_id}'");
    confirm($query);
    redirect("/e_commerce/public/cart");
}

if (isset($_GET['rid'])) {

    $rid = $_GET['rid'];

    if (isset($_SESSION['user_id'])) {

        $user_id = $_SESSION['user_id'];
        $query = query("DELETE FROM cart WHERE user_id='{$user_id}' AND p_id=" . escape_string($rid) . "");
        confirm($query);
        $_SESSION['sub'] = "0";
        $_SESSION['item_quantity'] = "0";
        $_SESSION['item_total'] = "0";

        echo "product removed";
    }
}


if (isset($_POST['cart_count'])) {

    $ip_add = getenv("REMOTE_ADDR");

    if (isset($_SESSION["user_id"])) {

        $user_id = $_SESSION["user_id"];

        $cart_query = query("SELECT * FROM cart WHERE user_id='{$user_id}' AND ip_add='{$ip_add}'");
        confirm($cart_query);
        $count = mysqli_num_rows($cart_query);
        echo isset($count) && $count > 0 ? $count : "";
    }
}
//********************* cart section ends******************/


function show_product_based_on_category_clicked()
{
    if (isset($_GET['cat_id'])) {
        $cat_id = $_GET['cat_id'];
        $query = query("SELECT * FROM products WHERE product_category_id='{$cat_id}' ORDER BY product_price");
        confirm($query);
        $count = mysqli_num_rows($query);
        if ($count > 0) {
            while ($row = fetch_array($query)) {
                $product_title = substr($row['product_title'], 0, 5) . "..";
                $products = <<<DELIMETER
                        <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mb-3 text-center">
                        <div class="card" style="padding:0px; border-radius:14px;">
                            <div class="card-body">
                                <a href="/e_commerce/public/single-product/{$row["product_id"]}/{$row["product_category_id"]}">
                                    <img src="/e_commerce/resources/uploads/{$row['product_image']}" alt='' style='height:150px; border-radius:12px;'>
                                </a>
                            </div>
                            <div class="card-footer text-center">
                                <div>
                                    <h6 class='mb-0'>{$product_title}</h6>
                                    <p class="text-bold">&#8358;{$row['product_price']}</p>
                                </div>
                                <a href="/e_commerce/public/cart/{$row["product_id"]}" add="{$row["product_id"]}" style="background-color:#F28123; border-radius:6px" class="btn btn-sm text-white product" onClick="document.location.reload(true)">
                                Add to <i class="fas fa-shopping-cart"></i></a>
                                </form>
                            </div>
                        </div>
                    </div>
                    DELIMETER;
                echo $products;
            }
        } else {
            echo "<h3 class='text-center'>No Products Yet</h3>";
        }
    }
}



function register_user()
{
    global $conn;
    if (isset($_POST['user_register'])) {

        $firstname = escape_string($_POST['firstname']);
        $lastname = escape_string($_POST['lastname']);
        $username = escape_string($_POST['username']);
        $email = escape_string($_POST['email']);
        $password = escape_string($_POST['password']);
        $confirmpwd = escape_string($_POST['confirmpwd']);
        $mobile = escape_string($_POST['mobile']);
        $address1 = escape_string($_POST['address1']);
        $address2 = escape_string($_POST['address2']);
        $state = escape_string($_POST['state']);
        $city = escape_string($_POST['city']);
        $zip = escape_string($_POST['zip']);


        $hash_f = "$2y$10$";
        $salt = "iusesomecrazystrings22";
        $hash_f_and_salt = $hash_f . $salt;
        $password = crypt($password, $hash_f_and_salt);

        $hash_f1 = "$2y$10$";
        $salt1 = "iusesomecrazystrings22";
        $hash_f1_and_salt1 = $hash_f1 . $salt1;
        $confirmpwd = crypt($confirmpwd, $hash_f1_and_salt1);

        $email_check = mysqli_query($conn, "SELECT * FROM users WHERE user_email='$email'");
        $count = mysqli_num_rows($email_check);


        if (
            empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password)
            || empty($confirmpwd) || empty($mobile) || empty($address1) || empty($state) || empty($city)
            || empty($zip)
        ) {
            set_message("<span class='alert alert-warning text-white' style='background-color:#F28123; border-radius:48px;'> All Fields Are Required</span>");
        } else {
            if ($count > 0) {
                set_message("<span class='alert alert-warning text-white' style='background-color:#F28123; border-radius:48px;'>Email Already Exist: <a href='login.php' class='text-secondary'> Login</a></span>");
                redirect("register.php");
            } else {
                $username_check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
                $count = mysqli_num_rows($username_check);

                if ($count > 0) {
                    set_message("<span class='alert alert-warning text-white' style='background-color:#F28123; border-radius:48px;'>Username already exist, choose another</span>");
                    redirect("register.php");
                } else {
                    if ($password !== $confirmpwd) {
                        set_message("<span class='alert alert-warning text-white' style='background-color:#F28123; border-radius:48px;'>Password Doesn't Match</span>");
                        redirect("register.php");
                    } else {
                        $query = query("INSERT INTO  users(user_firstname, user_lastname, username, user_email, user_password, user_confirm_password, mobile, user_address1, user_address2, user_state, user_city, user_zipcode) VALUES('{$firstname}','{$lastname}','{$username}', '{$email}', '{$password}', '{$confirmpwd}','{$mobile}', '{$address1}', '{$address2}','{$state}','{$city}','{$zip}' )");
                        confirm($query);
                        if ($query) {
                            set_message("<span class='alert alert-warning text-white' style='background-color:#F28123; border-radius:48px;'>User Registered successfully <a href='login.php' class='text-secondary'> Login</a></span>");
                            redirect("register.php");
                        }
                    }
                }
            }
        }
    }
}



function login_users()
{
    if (isset($_POST['user_login'])) {

        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        // $unique = uniqid(true);

        // $token = bin2hex(openssl_random_pseudo_bytes(50));
        $hash_f = "$2y$10$";
        $salt = "iusesomecrazystrings22";
        $hash_and_salt = $hash_f . $salt;
        $user_password = crypt($user_password, $hash_and_salt);

        $query = query("SELECT * FROM users WHERE user_email= '{$user_email}'");
        confirm($query);
        $count = mysqli_num_rows($query);


        if (empty($user_email) || empty($user_password)) {
            set_message("<span class='alert alert-warning text-white' style='background-color:#F28123; border-radius:48px;'>All Fields Are Required</span>");
            redirect("login");
        } else {
            if ($count < 1) {
                set_message("<span class='alert alert-warning text-white' style='background-color:#F28123; border-radius:48px;'>Don't have an Account: <a href='register.php' class='text-secondary'> Register</a></span>");
                redirect("login");
            } else {

                while ($row = fetch_array($query)) {
                    if ($user_email !== $row['user_email'] || $user_password !== $row['user_password']) {
                        set_message("<span class='alert alert-warning text-white' style='background-color:#F28123; border-radius:48px;'>Wrong username or password</span>");
                        redirect("login");
                    } else {

                        // if (isset($_SESSION)) {
                        //     session_destroy();
                        //     session_start();
                        // }

                        $_SESSION['user_email'] = $user_email;
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_firstname'] = $row['user_firstname'];
                        $_SESSION['user_lastname'] = $row['user_lastname'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['mobile'] = $row['mobile'];
                        $_SESSION['user_address1'] = $row['user_address1'];
                        $_SESSION['user_state'] = $row['user_state'];
                        $_SESSION['user_city'] =  $row['user_city'];
                        $_SESSION['user_role'] =  $row['user_role'];

                        if ($_SESSION['user_role'] == "admin") {
                            redirect("/e_commerce/public/admin");
                        } else {
                            redirect("index");
                        }
                    }
                }
            }
        }
    }
}