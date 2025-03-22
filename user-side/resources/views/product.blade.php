@extends('layouts.layout')
@section('content')
    <style>
        :root {
            --primary-color: #e53637;
            --heading-color: #111111;
            --text-color: #666666;
            --white-color: #ffffff;
            --border-color: #e1e1e1;
            --background-color: #f3f2ee;
        }

        body {
            font-family: 'Nunito Sans', sans-serif;
            color: var(--text-color);
            background-color: var(--white-color);
        }

        h1, h2, h3, h4, h5, h6 {
            color: var(--heading-color);
            font-weight: 700;
            margin: 0;
        }

        a {
            text-decoration: none;
            color: var(--heading-color);
            transition: all 0.3s;
        }

        a:hover {
            color: var(--primary-color);
            text-decoration: none;
        }

        .header {
            background-color: var(--white-color);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .logo {
            padding: 20px 0;
            font-size: 24px;
            font-weight: 700;
            color: var(--heading-color);
        }

        .logo span {
            color: var(--primary-color);
        }

        .nav-menu a {
            display: inline-block;
            margin-right: 30px;
            font-size: 16px;
            text-transform: uppercase;
            font-weight: 600;
            color: var(--heading-color);
            padding: 25px 0;
        }

        .nav-menu a:hover, .nav-menu a.active {
            color: var(--primary-color);
        }

        .nav-right {
            text-align: right;
        }

        .nav-right a {
            display: inline-block;
            margin-left: 20px;
            font-size: 18px;
        }

        .badge-cart {
            background-color: var(--primary-color);
            color: var(--white-color);
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 50%;
            position: absolute;
            top: -5px;
            right: -8px;
        }

        .breadcrumb-section {
            background-color: var(--background-color);
            padding: 50px 0;
        }

        .breadcrumb-option {
            font-size: 15px;
        }

        .breadcrumb-option a {
            margin-right: 20px;
            position: relative;
        }

        .breadcrumb-option a::after {
            content: '>';
            position: absolute;
            right: -15px;
            top: 0;
            font-size: 15px;
        }

        .breadcrumb-option span {
            color: var(--text-color);
        }

        .product-details {
            padding: 80px 0;
        }

        .product-img img {
            min-width: 100%;
        }

        .product-thumb {
            margin-top: 20px;
        }

        .product-thumb img {
            width: 90px;
            height: 90px;
            object-fit: cover;
            cursor: pointer;
            margin-right: 10px;
            opacity: 0.6;
            transition: all 0.3s;
        }

        .product-thumb img:hover, .product-thumb img.active {
            opacity: 1;
        }

        .product-title {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .product-price {
            font-size: 24px;
            color: var(--primary-color);
            margin-bottom: 20px;
            font-weight: 700;
        }

        .product-rating {
            margin-bottom: 15px;
        }

        .product-rating i {
            color: #ffc107;
            margin-right: 2px;
        }

        .product-rating span {
            color: var(--text-color);
            margin-left: 5px;
        }

        .product-description {
            margin-bottom: 30px;
        }

        .product-details-widget {
            margin-bottom: 35px;
        }

        .size-widget span {
            display: inline-block;
            font-size: 14px;
            color: var(--heading-color);
            margin-right: 10px;
            font-weight: 600;
        }

        .size-widget a {
            display: inline-block;
            padding: 5px 12px;
            border: 1px solid var(--border-color);
            margin-right: 5px;
            font-size: 14px;
        }

        .size-widget a:hover, .size-widget a.active {
            background-color: var(--primary-color);
            color: var(--white-color);
            border-color: var(--primary-color);
        }

        .color-widget span {
            display: inline-block;
            font-size: 14px;
            color: var(--heading-color);
            margin-right: 10px;
            font-weight: 600;
        }

        .color-widget a {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 5px;
            position: relative;
        }

        .color-widget a.black {
            background-color: #111111;
        }

        .color-widget a.blue {
            background-color: #3b82f6;
        }

        .color-widget a.red {
            background-color: #e53637;
        }

        .color-widget a.grey {
            background-color: #888888;
        }

        .color-widget a.active::after {
            content: '✓';
            position: absolute;
            color: white;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 12px;
        }

        .quantity {
            display: flex;
            margin-bottom: 30px;
        }

        .pro-qty {
            width: 140px;
            height: 50px;
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .pro-qty .qtybtn {
            width: 40px;
            text-align: center;
            font-size: 18px;
            cursor: pointer;
            color: var(--heading-color);
        }

        .pro-qty input {
            width: 60px;
            text-align: center;
            border: none;
            height: 48px;
            font-size: 16px;
            font-weight: 600;
        }

        .primary-btn {
            display: inline-block;
            font-size: 14px;
            font-weight: 700;
            padding: 12px 30px;
            color: var(--white-color);
            background-color: var(--primary-color);
            text-transform: uppercase;
            border: none;
            letter-spacing: 2px;
            cursor: pointer;
        }

        .primary-btn:hover {
            opacity: 0.8;
            color: white;
        }

        .product-options {
            margin-top: 30px;
        }

        .product-options span {
            display: block;
            font-size: 14px;
            color: var(--heading-color);
            margin-bottom: 10px;
        }

        .product-options a {
            margin-right: 15px;
            font-size: 14px;
            color: var(--text-color);
        }

        .product-options a i {
            margin-right: 5px;
        }

        .tab-section {
            padding-bottom: 80px;
        }

        .nav-tabs {
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 30px;
        }

        .nav-tabs .nav-item {
            margin-bottom: -1px;
        }

        .nav-tabs .nav-link {
            font-size: 18px;
            color: var(--heading-color);
            font-weight: 600;
            border: none;
            padding: 0 0 15px;
            margin-right: 40px;
        }

        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
        }

        .tab-pane {
            padding: 0 20px;
        }

        .tab-description p {
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .tab-customer-review {
            display: flex;
            margin-bottom: 30px;
        }

        .review-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 20px;
            overflow: hidden;
        }

        .review-text h6 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .review-text .product-rating {
            margin-bottom: 10px;
        }

        .review-text p {
            margin-bottom: 10px;
        }

        .review-text span {
            font-size: 12px;
            color: var(--text-color);
        }

        .related-products {
            padding-bottom: 80px;
        }

        .section-title {
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 36px;
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 50%;
            height: 2px;
            background-color: var(--primary-color);
        }

        .product-item {
            margin-bottom: 30px;
        }

        .product-item:hover .product-hover {
            opacity: 1;
            transform: translateY(0);
        }

        .product-item:hover .product-img img {
            transform: scale(1.1);
        }

        .product-img {
            position: relative;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .product-img img {
            min-width: 100%;
            transition: all 0.5s;
        }

        .product-hover {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.9);
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.5s;
        }

        .product-hover ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        .product-hover ul li {
            margin: 0 5px;
        }

        .product-hover ul li a {
            display: block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            color: var(--heading-color);
            background-color: var(--white-color);
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .product-hover ul li a:hover {
            background-color: var(--primary-color);
            color: var(--white-color);
        }

        .product-text {
            text-align: center;
        }

        .product-text h6 {
            margin-bottom: 10px;
        }

        .product-text .product-price {
            font-size: 18px;
            margin-bottom: 0;
        }

        .product-text .product-price span {
            font-size: 16px;
            color: var(--text-color);
            text-decoration: line-through;
            margin-right: 10px;
        }

        .footer {
            background-color: var(--heading-color);
            padding: 80px 0 30px;
            color: var(--white-color);
        }

        .footer-widget {
            margin-bottom: 40px;
        }

        .footer-widget h6 {
            color: var(--white-color);
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .footer-widget ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-widget ul li {
            margin-bottom: 10px;
        }

        .footer-widget ul li a {
            color: var(--text-color);
            font-size: 14px;
        }

        .footer-widget ul li a:hover {
            color: var(--primary-color);
        }

        .footer-widget p {
            margin-bottom: 20px;
            color: var(--text-color);
            font-size: 14px;
            line-height: 1.8;
        }

        .footer-widget .footer-newslatter {
            position: relative;
        }

        .footer-widget .footer-newslatter input {
            width: 100%;
            height: 48px;
            padding: 0 20px;
            border: 1px solid #3d3d3d;
            background-color: transparent;
            color: var(--white-color);
        }

        .footer-widget .footer-newslatter button {
            position: absolute;
            right: 0;
            top: 0;
            height: 48px;
            border: none;
            background-color: transparent;
            color: var(--text-color);
            padding: 0 15px;
            cursor: pointer;
        }

        .footer-copyright {
            border-top: 1px solid #3d3d3d;
            padding-top: 20px;
            text-align: center;
            font-size: 14px;
            color: var(--text-color);
        }

        .footer-copyright i {
            color: var(--primary-color);
        }

        @media (max-width: 991px) {
            .nav-menu {
                display: none;
            }
            .mobile-menu {
                display: block;
                float: right;
                margin-top: 15px;
                font-size: 24px;
            }
        }

        @media (max-width: 767px) {
            .product-details {
                padding: 50px 0;
            }
            .breadcrumb-section {
                padding: 30px 0;
            }
            .section-title h2 {
                font-size: 28px;
            }
            .tab-section, .related-products {
                padding-bottom: 50px;
            }
            .nav-tabs .nav-link {
                font-size: 16px;
                margin-right: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Product Details Section Begin -->
    <section class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-img">
                        <img src="/api/placeholder/600/700" alt="Product Image">
                    </div>
                    <div class="product-thumb">
                        <img src="/api/placeholder/90/90" alt="Thumbnail 1" class="active">
                        <img src="/api/placeholder/90/90" alt="Thumbnail 2">
                        <img src="/api/placeholder/90/90" alt="Thumbnail 3">
                        <img src="/api/placeholder/90/90" alt="Thumbnail 4">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-details-content">
                        <h3 class="product-title">Premium Wool Blend Blazer</h3>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-alt"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product-price">
                            $189.99
                        </div>
                        <div class="product-description">
                            <p>Elevate your formal attire with our Premium Wool Blend Blazer. Crafted from a luxurious wool blend fabric, this blazer offers exceptional comfort and durability while maintaining a sophisticated appearance. The tailored fit and detailed stitching ensure a refined silhouette suitable for both professional settings and special occasions.</p>
                        </div>
                        <div class="product-details-widget">
                            <div class="size-widget mb-4">
                                <span>Size:</span>
                                <a href="#" class="active">S</a>
                                <a href="#">M</a>
                                <a href="#">L</a>
                                <a href="#">XL</a>
                                <a href="#">XXL</a>
                            </div>
                            <div class="color-widget">
                                <span>Color:</span>
                                <a href="#" class="black active"></a>
                                <a href="#" class="blue"></a>
                                <a href="#" class="grey"></a>
                                <a href="#" class="red"></a>
                            </div>
                        </div>
                        <div class="quantity">
                            <div class="pro-qty">
                                <span class="qtybtn">-</span>
                                <input type="text" value="1">
                                <span class="qtybtn">+</span>
                            </div>
                            <a href="#" class="primary-btn">Add to cart</a>
                        </div>
                        <div class="product-options">
                            <span>SKU: MF-BLZ-001</span>
                            <span>Categories: Men's Fashion, Formal Wear, Blazers</span>
                            <div class="mt-3">
                                <a href="#"><i class="far fa-heart"></i> Add to wishlist</a>
                                <a href="#"><i class="fas fa-exchange-alt"></i> Compare</a>
                                <a href="#"><i class="fas fa-share-alt"></i> Share</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Tab Section Begin -->
    <section class="tab-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab">Specifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab">Customer Reviews (18)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-1" role="tabpanel">
                            <div class="tab-description">
                                <p>Our Premium Wool Blend Blazer is the perfect addition to your wardrobe, offering versatility and style for various occasions. The tailored cut provides a modern silhouette while maintaining comfort throughout the day.</p>
                                <p>Crafted from a premium wool blend (70% wool, 30% polyester), this blazer offers the perfect balance of warmth, comfort, and durability. The interior is fully lined with a smooth satin-like fabric, ensuring easy wear over any shirt or sweater.</p>
                                <p>Features include a two-button front closure, notched lapels, four-button cuffs, and a single back vent for ease of movement. The blazer includes two front flap pockets, a breast pocket, and three interior pockets for functionality.</p>
                                <p>This versatile piece can be dressed up for formal events with a crisp dress shirt and tie, or styled more casually with a t-shirt and jeans for a smart-casual look.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-2" role="tabpanel">
                            <div class="tab-specification">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Material</th>
                                            <td>70% Wool, 30% Polyester</td>
                                        </tr>
                                        <tr>
                                            <th>Lining</th>
                                            <td>100% Polyester</td>
                                        </tr>
                                        <tr>
                                            <th>Fit</th>
                                            <td>Regular fit, slightly tapered at the waist</td>
                                        </tr>
                                        <tr>
                                            <th>Closure</th>
                                            <td>Two-button front</td>
                                        </tr>
                                        <tr>
                                            <th>Pockets</th>
                                            <td>Two front flap pockets, one breast pocket, three interior pockets</td>
                                        </tr>
                                        <tr>
                                            <th>Care Instructions</th>
                                            <td>Dry clean only</td>
                                        </tr>
                                        <tr>
                                            <th>Country of Origin</th>
                                            <td>Italy</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-3" role="tabpanel">
                            <div class="tab-reviews">
                                <div class="tab-customer-review">
                                    <div class="review-img">
                                        <img src="/api/placeholder/80/80" alt="Customer">
                                    </div>
                                    <div class="review-text">
                                        <h6>James Wilson</h6>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p>Exceptional quality blazer that fits perfectly. The wool blend is comfortable and looks premium. I've received many compliments wearing this to business meetings and formal events.</p>
                                        <span>March 15, 2025</span>
                                    </div>
                                </div>
                                <div class="tab-customer-review">
                                    <div class="review-img">
                                        <img src="/api/placeholder/80/80" alt="Customer">
                                    </div>
                                    <div class="review-text">
                                        <h6>Michael Thompson</h6>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Great blazer for the price. The material is high quality and the stitching is well done. My only issue is that it runs slightly small, so I'd recommend sizing up if you're between sizes.</p>
                                        <span>March 10, 2025</span>
                                    </div>
                                </div>
                                <div class="tab-customer-review">
                                    <div class="review-img">
                                        <img src="/api/placeholder/80/80" alt="Customer">
                                    </div>
                                    <div class="review-text">
                                        <h6>David Rodriguez</h6>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-alt"></i>
                                        </div>
                                        <p>Versatile and stylish blazer that transitions well from office to evening events. The fabric has a nice weight to it and the black color is rich and doesn't fade. Very satisfied with this purchase.</p>
                                        <span>March 5, 2025</span>
                                    </div>
                                </div>
                                <a href="#" class="primary-btn mt-4">View All Reviews</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tab Section End -->

    <!-- Related Products Section Begin -->
    <section class="related-products">
        <div class="container">
            <div class="section-title">
                <h2>Related Products</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="product-item">
                        <div class="product-img">
                            <img src="/api/placeholder/270/310" alt="Product">
                            <div class="product-hover">
                                <ul>
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-exchange-alt"></i></a></li>
                                    <li><a href="#"><i class="fa fa-search"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-text">
                            <h6><a href="#">Classic Oxford Shirt</a></h6>
                            <div class="product-price">$69.99 <span>$89.99</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product-item">
                        <div class="product-img">
                            <img src="/api/placeholder/270/310" alt="Product">
                            <div class="product-hover">
                                <ul>
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-exchange-alt"></i></a></li>
                                    <li><a href="#"><i class="fa fa-search"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-text">
                            <h6><a href="#">Slim Fit Dress Pants</a></h6>
                            <div class="product-price">$79.99</div>
                        </div>
                    </div>
                </div>
            </section>
            @endsection