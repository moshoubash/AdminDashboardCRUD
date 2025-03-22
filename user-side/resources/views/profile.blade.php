@extends('layouts.layout')
@section('content')
<style>
        
        .logo {
            font-weight: 700;
            font-size: 24px;
            color: #fff;
        }
        
        .nav-link {
            color: #e53637;
            margin: 0 15px;
            font-weight: 500;
        }
        
        .nav-link:hover {
            color: #e53637;
        }
        
        .btn-custom {
            background-color: #e53637;
            border-color: #e53637;
            color: #fff;
        }
        
        .btn-custom:hover {
            background-color: #d82828;
            border-color: #d82828;
            color: #fff;
        }
        
        .profile-header {
            padding: 30px 0;
            border-bottom: 1px solid #dee2e6;
        }
        
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        .profile-stats {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        
        .profile-tab {
            background-color: #fff;
            border-radius: 5px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        
        .footer {
            background-color: #111;
            color: #fff;
            padding: 60px 0 30px;
            margin-top: 60px;
        }
        
        .footer-title {
            color: #fff;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .footer-link {
            color: #b7b7b7;
            display: block;
            margin-bottom: 10px;
        }
        
        .footer-link:hover {
            color: #e53637;
            text-decoration: none;
        }
        
        .social-links a {
            color: #b7b7b7;
            margin-right: 15px;
            font-size: 18px;
        }
        
        .social-links a:hover {
            color: #e53637;
        }
        
        .product-card {
            border: none;
            transition: all 0.3s;
            margin-bottom: 30px;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .product-img {
            height: 250px;
            object-fit: cover;
        }
        
        .product-title {
            font-weight: 600;
            margin-top: 15px;
        }
        
        .product-price {
            color: #e53637;
            font-weight: 700;
        }
        
        .nav-tabs .nav-link.active {
            color: #e53637;
            border-color: #e53637 #dee2e6 #fff;
        }
        
        .order-item {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
        }
    </style>
    <!-- Profile Header -->
    <section class="profile-header bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <img src="/api/placeholder/150/150" alt="Profile Picture" class="profile-img">
                </div>
                <div class="col-md-9">
                    <h2 class="mb-1">John Doe</h2>
                    <p class="text-muted">Member since January 2023</p>
                    <div class="mt-3">
                        <button class="btn btn-custom mr-2"><i class="fas fa-edit mr-1"></i> Edit Profile</button>
                        <button class="btn btn-outline-secondary"><i class="fas fa-cog mr-1"></i> Settings</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Profile Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Profile Sidebar -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="profile-stats mb-4">
                        <div class="row text-center">
                            <div class="col-4">
                                <h4>25</h4>
                                <p class="text-muted mb-0">Orders</p>
                            </div>
                            <div class="col-4">
                                <h4>12</h4>
                                <p class="text-muted mb-0">Reviews</p>
                            </div>
                            <div class="col-4">
                                <h4>8</h4>
                                <p class="text-muted mb-0">Wishlists</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="profile-stats">
                        <h5 class="mb-4">Personal Information</h5>
                        <div class="mb-3">
                            <small class="text-muted d-block">Full Name</small>
                            <p class="mb-0">John Robert Doe</p>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block">Email</small>
                            <p class="mb-0">johndoe@example.com</p>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block">Phone</small>
                            <p class="mb-0">+1 (555) 123-4567</p>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block">Address</small>
                            <p class="mb-0">123 Fashion Street, New York, NY 10001</p>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block">Birth Date</small>
                            <p class="mb-0">January 15, 1990</p>
                        </div>
                    </div>
                </div>
                
                <!-- Profile Main Content -->
                <div class="col-lg-8">
                    <div class="profile-tab">
                        <ul class="nav nav-tabs mb-4" id="profileTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="orders-tab" data-toggle="tab" href="#orders" role="tab">My Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="wishlist-tab" data-toggle="tab" href="#wishlist" role="tab">Wishlist</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab">My Reviews</a>
                            </li>
                        </ul>
                        
                        <div class="tab-content" id="profileTabContent">
                            <!-- Orders Tab -->
                            <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="order-item">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <h6 class="mb-1">Order #MF8762</h6>
                                            <small class="text-muted">March 15, 2025</small>
                                        </div>
                                        <div>
                                            <span class="badge badge-success">Delivered</span>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="/api/placeholder/80/80" alt="Product" class="img-fluid">
                                        </div>
                                        <div class="col-md-7">
                                            <h6 class="mb-1">Men's Casual T-Shirt</h6>
                                            <p class="mb-0 text-muted">Size: L, Color: Black, Qty: 1</p>
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <p class="mb-0 font-weight-bold">$29.99</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-sm btn-outline-secondary">View Details</button>
                                        <button class="btn btn-sm btn-custom">Track Order</button>
                                    </div>
                                </div>
                                
                                <div class="order-item">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <h6 class="mb-1">Order #MF8745</h6>
                                            <small class="text-muted">March 05, 2025</small>
                                        </div>
                                        <div>
                                            <span class="badge badge-success">Delivered</span>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="/api/placeholder/80/80" alt="Product" class="img-fluid">
                                        </div>
                                        <div class="col-md-7">
                                            <h6 class="mb-1">Men's Denim Jacket</h6>
                                            <p class="mb-0 text-muted">Size: M, Color: Blue, Qty: 1</p>
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <p class="mb-0 font-weight-bold">$89.99</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-sm btn-outline-secondary">View Details</button>
                                        <button class="btn btn-sm btn-custom">Write a Review</button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Wishlist Tab -->
                            <div class="tab-pane fade" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card product-card">
                                            <div class="position-relative">
                                                <img src="/api/placeholder/300/300" alt="Product" class="card-img-top product-img">
                                                <button class="btn btn-sm btn-danger position-absolute" style="top: 10px; right: 10px;">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                            <div class="card-body p-3">
                                                <h5 class="product-title">Slim Fit Blazer</h5>
                                                <p class="product-price mb-2">$129.99</p>
                                                <button class="btn btn-custom btn-sm btn-block">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card product-card">
                                            <div class="position-relative">
                                                <img src="/api/placeholder/300/300" alt="Product" class="card-img-top product-img">
                                                <button class="btn btn-sm btn-danger position-absolute" style="top: 10px; right: 10px;">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                            <div class="card-body p-3">
                                                <h5 class="product-title">Leather Watch</h5>
                                                <p class="product-price mb-2">$79.99</p>
                                                <button class="btn btn-custom btn-sm btn-block">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card product-card">
                                            <div class="position-relative">
                                                <img src="/api/placeholder/300/300" alt="Product" class="card-img-top product-img">
                                                <button class="btn btn-sm btn-danger position-absolute" style="top: 10px; right: 10px;">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                            <div class="card-body p-3">
                                                <h5 class="product-title">Casual Sneakers</h5>
                                                <p class="product-price mb-2">$59.99</p>
                                                <button class="btn btn-custom btn-sm btn-block">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Reviews Tab -->
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="media mb-4 pb-4 border-bottom">
                                    <img src="/api/placeholder/64/64" alt="Product" class="mr-3" style="width: 64px;">
                                    <div class="media-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h5 class="mb-0">Men's Casual T-Shirt</h5>
                                            <small class="text-muted">March 10, 2025</small>
                                        </div>
                                        <div class="text-warning mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Excellent quality and comfortable fit. The material is soft and breathable, perfect for casual wear. Will definitely buy more colors!</p>
                                        <div class="d-flex">
                                            <button class="btn btn-sm btn-outline-secondary mr-2"><i class="fas fa-edit mr-1"></i> Edit</button>
                                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt mr-1"></i> Delete</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="media">
                                    <img src="/api/placeholder/64/64" alt="Product" class="mr-3" style="width: 64px;">
                                    <div class="media-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h5 class="mb-0">Men's Denim Jacket</h5>
                                            <small class="text-muted">February 28, 2025</small>
                                        </div>
                                        <div class="text-warning mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p>This denim jacket is everything I wanted and more. The quality is top-notch, and the fit is perfect. I've received many compliments when wearing it. Highly recommended!</p>
                                        <div class="d-flex">
                                            <button class="btn btn-sm btn-outline-secondary mr-2"><i class="fas fa-edit mr-1"></i> Edit</button>
                                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt mr-1"></i> Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection