<?php

Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');


// ---admin section---

//category
Route::get('admin/categories', 'Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@storecategory')->name('store.category');
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@deletecategory');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@editcategory');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@updatecategory');

//Brands
Route::get('admin/brands', 'Admin\Brand\BrandController@brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Brand\BrandController@storebrand')->name('store.brand');
Route::get('delete/brand/{id}', 'Admin\Brand\BrandController@deletebrand');
Route::get('edit/brand/{id}', 'Admin\Brand\BrandController@editbrand');
Route::post('update/brand/{id}', 'Admin\Brand\BrandController@updatebrand');

//Subcategory
Route::get('admin/subcategories', 'Admin\Subcategory\SubcategoryController@subcategory')->name('subcategories');
Route::post('admin/store/subcategory', 'Admin\Subcategory\SubcategoryController@storesubcategory')->name('store.subcategory');
Route::get('delete/subcategory/{id}', 'Admin\Subcategory\SubcategoryController@deletesubcategory');
Route::get('edit/subcategory/{id}', 'Admin\Subcategory\SubcategoryController@editsubcategory');
Route::post('update/subcategory/{id}', 'Admin\Subcategory\SubcategoryController@updatesubcategory');


//Coupon
Route::get('admin/coupons', 'Admin\Coupon\CouponController@coupon')->name('coupons');
Route::post('admin/store/coupon', 'Admin\Coupon\CouponController@StoreCoupon')->name('store.coupon');
Route::get('delete/coupon/{id}', 'Admin\Coupon\CouponController@deleteCoupon');
Route::get('edit/coupon/{id}', 'Admin\Coupon\CouponController@editCoupon');
Route::post('update/coupon/{id}', 'Admin\Coupon\CouponController@updateCoupon');
Route::post('user/apply/coupon', 'Admin\Coupon\CouponController@userCoupon')->name('apply.coupon');
Route::get('coupon/remove/', 'Admin\Coupon\CouponController@removeCoupon')->name('remove.coupon');


//Newslater
Route::post('store/newslater', 'Admin\Newslater\NewslaterController@StoreNewslater')->name('store.newslater');
Route::get('admin/newslater', 'Admin\Newslater\NewslaterController@Newslater')->name('admin.newslater');
Route::get('delete/newslater/{id}', 'Admin\Newslater\NewslaterController@deleteNewslater');

//product
Route::get('admin/product/all', 'Admin\Product\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Admin\Product\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'Admin\Product\ProductController@store')->name('store.product');
Route::get('inactive/product/{id}', 'Admin\Product\ProductController@Inactive');
Route::get('active/product/{id}', 'Admin\Product\ProductController@Active');
Route::get('delete/product/{id}', 'Admin\Product\ProductController@DeleteProduct');
Route::get('view/product/{id}', 'Admin\Product\ProductController@ViewProduct');
Route::get('edit/product/{id}', 'Admin\Product\ProductController@EditProduct');
Route::post('update/product/withoutphoto/{id}', 'Admin\Product\ProductController@UpdateProductWithoutPhoto');
Route::post('update/product/photo/{id}', 'Admin\Product\ProductController@UpdateProductPhoto');

//Blogs routes
Route::get('admin/add/post', 'Admin\Blog\PostController@create')->name('add.blogpost');
Route::post('admin/store/post', 'Admin\Blog\PostController@store')->name('store.post');
Route::get('admin/all/post', 'Admin\Blog\PostController@index')->name('all.blogpost');
Route::get('delete/post/{id}', 'Admin\Blog\PostController@DeletePost');
Route::get('edit/post/{id}', 'Admin\Blog\PostController@EditPost');
Route::post('update/post/{id}', 'Admin\Blog\PostController@update');

//blog route for frontend
Route::get('/blog/post', 'BlogController@blog')->name('blog.post');
Route::get('/language/bangla', 'BlogController@Bangla')->name('language.bangla');
Route::get('/language/english', 'BlogController@English')->name('language.english');

//Order routes
Route::get('admin/pending/order', 'Admin\OrderController@NewOrder')->name('admin.neworder');
Route::get('admin/view/order/{id}', 'Admin\OrderController@ViewOrder');
Route::get('admin/payment/accept/{id}', 'Admin\OrderController@PaymentAccept');
Route::get('admin/payment/cancel/{id}', 'Admin\OrderController@PaymentCancel');

Route::get('admin/accept/payment', 'Admin\OrderController@AcceptPaymentOrder')->name('admin.accept.payment');
Route::get('admin/progress/payment', 'Admin\OrderController@ProgressPaymentOrder')->name('admin.progress.payment');
Route::get('admin/success/payment', 'Admin\OrderController@SuccessPaymentOrder')->name('admin.success.payment');
Route::get('admin/cancel/payment', 'Admin\OrderController@CancelPaymentOrder')->name('admin.cancel.order');
Route::get('admin/delevery/progress/{id}', 'Admin\OrderController@DeleveryProgress');
Route::get('admin/delevery/done/{id}', 'Admin\OrderController@DeleveryDone');


//Get subcategory by ajax
Route::get('get/subcategory/{category_id}', 'Admin\Product\ProductController@GetSubCat');

//Wishlist
Route::get('add/wishlist/{id}', 'Admin\WishlistController@AddWishlist');
Route::get('user/wishlist/','Admin\WishlistController@Wishlist')->name('user.wishlist');

//cart
Route::get('add/to/cart/{id}', 'Admin\CartController@AddCart');
Route::get('cart/check', 'Admin\CartController@cartCheck');
Route::get('products/cart', 'Admin\CartController@showCart')->name('show.cart');
Route::get('remove/cart/{rowId}', 'Admin\CartController@removeCart');
Route::post('update/cart/item', 'Admin\CartController@updateCart')->name('update.cartitem');
Route::get('cart/product/view/{id}','Admin\CartController@ViewProduct');
Route::post('insert/into/cart/','Admin\CartController@InsertCart')->name('insert.into.cart');
Route::get('user/checkout/','Admin\CartController@Checkout')->name('user.checkout');
Route::get('payment/page/','Admin\CartController@paymentPage')->name('payment.step');

//Payment route
Route::post('user/payment/process/','PaymentController@payment')->name('payment.process');
Route::post('user/stripe/charge/','PaymentController@StripeCharge')->name('stripe.charge');

// Socialite
Route::get('/auth/redirect/{provider}', 'Admin\SocialController@redirect');
Route::get('/callback/{provider}', 'Admin\SocialController@callback');


// -- Frontend start form here
// Product Details
Route::get('/product/details/{id}/{product_name}', 'ProductController@ProductView');
Route::post('/cart/product/add/{id}', 'ProductController@AddCart');

Route::get('/product/add/{id}', 'ProductController@AddCart');
Route::get('/products/{id}', 'ProductController@productsView');







