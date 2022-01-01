<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from spacingtech.com/html/vegist-final/vegist/index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Oct 2021 13:51:54 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<!-- Head -->
@include('endUser.layouts.head')
<!-- End HEad -->
<body class="home-1">
<!-- top notificationbar start -->
<section class="top1">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="top-home">
                    <li class="top-home-li">
                        <!-- mobile search start -->
                        <div class="r-search">
                            <a href="#r-search-modal" class="search-popuup" data-bs-toggle="modal"><i class="fa fa-search"></i></a>
                            <div class="modal fade" id="r-search-modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="m-drop-search">
                                                <input type="text" name="search" placeholder="Search products, brands or advice">
                                                <button class="search-btn" type="button"><i class="fa fa-search"></i></button>
                                            </div>
                                            <button type="button" class="close" data-bs-dismiss="modal"><i class="ion-close-round"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- mobile search end -->
                    </li>
                    <li class="top-home-li t-content">
                        <!-- offer text start -->
                        <div class="top-content">
                            <p class="top-slogn"><span class="top-c">free shipping</span> orders from all item</p>
                        </div>
                        <!-- offer text end -->
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- top notificationbar end -->

<!-- header start -->
@include('endUser.layouts.header')
<!-- header end -->

<!-- mobile menu start -->
@include('endUser.layouts.header-mobile')
<!-- mobile menu end -->

@yield('content')
<!-- Footer Start -->
@include('endUser.layouts.footer')
<!-- Footer End -->

<!-- back to top start -->
<a href="javascript:void(0)" class="scroll" id="top">
    <span><i class="fa fa-angle-double-up"></i></span>
</a>
<!-- back to top end -->
<div class="mm-fullscreen-bg"></div>
@include('endUser.layouts.footer-script')
</body>
<!-- Mirrored from spacingtech.com/html/vegist-final/vegist/index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Oct 2021 13:54:05 GMT -->
</html>
