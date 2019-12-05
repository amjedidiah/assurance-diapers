<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper d-flex clearfix">

    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
        <!-- Navbar Brand -->
        <div class="amado-navbar-brand">
            <a href="../"><img src="../img/logo.png" class="px-3" alt=""></a>
        </div>
        <!-- Navbar Toggler -->
        <div class="amado-navbar-toggler">
            <span></span><span></span><span></span>
        </div>
    </div>

    <!-- Header Area Start -->
    <header class="header-area clearfix">
        <!-- Close Icon -->
        <div class="nav-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <!-- Logo -->
        <div class="logo">
            <a href="../"><img src="../img/logo.png" class="px-3" alt=""></a>
        </div>
        <!-- Amado Nav -->
        <nav class="amado-nav">
            <ul>
                <li><a href="./">Home</a></li>
                <li class="active"><a href="shop.html">Shop</a></li>
                <!-- <li><a href="product.html">Product</a></li> -->
                <li><a href="cart.html">Cart</a></li>
                <!-- <li><a href="checkout.html">Checkout</a></li> -->
            </ul>
        </nav>
        <!-- Button Group -->
        <div class="amado-btn-group mt-30 mb-100">
            <a href="#" class="btn amado-btn mb-15">%Discount%</a>
            <a href="#" class="btn amado-btn active">New this week</a>
        </div>
        <!-- Cart Menu -->
        <div class="cart-fav-search mb-100">
            <a href="cart.html" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
            <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite</a>
            <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
        </div>
        <!-- Social Button -->
        <div class="social-info d-flex justify-content-between">
            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div>
    </header>
    <!-- Header Area End -->

    <div class="shop_sidebar_area">

        <!-- ##### Single Widget ##### -->
        <div class="widget catagory mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30">Catagories</h6>

            <!--  Catagories  -->
            <div class="catagories-menu">
                <ul id='catsList'></ul>
            </div>
        </div>

        <!-- ##### Single Widget ##### -->
        <div class="widget brands mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30">Brands</h6>

            <div class="widget-desc" id='brandsList'></div>
        </div>

        <!-- ##### Single Widget ##### -->
        <div class="widget price mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30">Price</h6>

            <div class="widget-desc">
                <div class="slider-range" id='priceRange'>
                    <div data-min="0" data-max="0" data-unit="&#8358;"
                        class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                        data-value-min="0" data-value-max="0" data-label-result="">
                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                    </div>
                    <div class="range-price">&#8358;<span class='price-min'></span> - &#8358;<span
                            class='price-max'></span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="amado_product_area section-padding-100">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                        <!-- Total Products -->
                        <div class="total-products">
                            <p>Showing 1-8 0f 25</p>
                            <div class="view d-flex">
                                <a class="active" href="#" onClick="changeProductView(this)"><i class="fa fa-th-large"
                                        aria-hidden="true"></i></a>
                                <a href="#" onClick="changeProductView(this)"><i class="fa fa-bars"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Sorting -->
                        <div class="product-sorting d-flex">
                            <div class="sort-by-date d-flex align-items-center mr-15">
                                <p>Sort by</p>
                                <form action="#" method="get">
                                    <select name="select" id="sortBydate">
                                        <option value="value">Newest</option>
                                        <option value="value">Popular</option>
                                    </select>
                                </form>
                            </div>
                            <div class="view-product d-flex align-items-center">
                                <p>View</p>
                                <form action="#" method="get">
                                    <select name="select" id="viewProduct" onChange="countProductsFetch(this)"></select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="productsDiv"></div>

            <div class="row">
                <div class="col-12">
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination justify-content-end mt-50">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Main Content Wrapper End ##### -->

<script src='js/custom/productsFetch.js'></script>
<script src='js/custom/catsList.js'></script>
<script src='js/custom/brandsList.js'></script>
<script src='js/custom/priceRange.js'></script>
<script src='js/custom/viewProductList.js'></script>
<script src='js/custom/populateCart.js'></script>