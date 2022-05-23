<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{asset('assets/backend/images/user.png')}}" class="rounded-circle user-photo"
                alt="User Profile Picture">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name"
                    data-toggle="dropdown"><strong>Alizee Thomas</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="page-profile2.html"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
                </ul>
            </div>
            <hr>
            <ul class="row list-unstyled">
                <li class="col-4">
                    <small>Sales</small>
                    <h6>456</h6>
                </li>
                <li class="col-4">
                    <small>Order</small>
                    <h6>1350</h6>
                </li>
                <li class="col-4">
                    <small>Revenue</small>
                    <h6>$2.13B</h6>
                </li>
            </ul>
        </div>

        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat"><i
                        class="icon-book-open"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i
                        class="icon-settings"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#question"><i
                        class="icon-question"></i></a></li>
        </ul>

        <div class="tab-content p-l-0 p-r-0">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        <li class="{{Request::is('admin/dashboard')? 'active' : ''}}">
                            <a href="{{route('admin')}}"><i class="icon-grid"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li  class="{{Request::is('admin/banner*')? 'active' : ''}}">
                            <a href="javascript:void(0);" class="has-arrow"><i class="fa fa-picture-o"></i> <span>Banner</span></a>
                            <ul>
                                <li><a href="{{route('banner.index')}}">All Banners</a></li>
                                <li><a href="{{route('banner.create')}}">Add Banner</a></li>
                            </ul>
                        </li>

                        <li class="{{Request::is('admin/category*')? 'active' : ''}}">
                            <a href="javascript:void(0);" class="has-arrow"><i class="fa fa-sitemap" aria-hidden="true"></i> <span>Category</span></a>
                            <ul>
                                <li><a href="{{route('category.index')}}">All Categories</a></li>
                                <li><a href="{{route('category.create')}}">Add Category</a></li>
                            </ul>
                        </li>
                        <li class="{{Request::is('admin/brand*')? 'active' : ''}}">
                            <a href="javascript:void(0);" class="has-arrow"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <span>Brand</span></a>
                            <ul>
                                <li><a href="{{route('brand.index')}}">All Brands</a></li>
                                <li><a href="{{route('brand.create')}}">Add Brand</a></li>
                            </ul>
                        </li>

                        <li class="{{Request::is('admin/product*')? 'active' : ''}}">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-briefcase"></i> <span>Product</span></a>
                            <ul>
                                <li><a href="{{route('product.index')}}">All Products</a></li>
                                <li><a href="{{route('product.create')}}">Add Product</a></li>
                            </ul>
                        </li>

                        <li class="{{Request::is('admin/cart*')? 'active' : ''}}">
                            <a href="javascript:void(0);" class="has-arrow"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Cart</span></a>
                            <ul>
                                <li><a href="javascript:void(0);">Cart Details</a></li>
                                <li><a href="javascript:void(0);">Edit Cart</a></li>
                            </ul>
                        </li>

                        <li class="{{Request::is('admin/post-category*')? 'active' : ''}}">
                            <a href="javascript:void(0);" class="has-arrow"><i class=" icon-list"></i> <span>Post Category</span></a>
                            <ul>
                                <li><a href="javascript:void(0);">Add</a></li>
                                <li><a href="javascript:void(0);">Edit</a></li>
                            </ul>
                        </li>
                        <li class="{{Request::is('admin/post-tag*')? 'active' : ''}}">
                            <a href="javascript:void(0);" class="has-arrow"><i class="fa fa-tag" aria-hidden="true"></i>
                                <span>Post Tag</span></a>
                            <ul>
                                <li><a href="javascript:void(0);">Add</a></li>
                                <li><a href="javascript:void(0);">Edit</a></li>
                            </ul>
                        </li>
                        <li class="{{Request::is('admin/posts*')? 'active' : ''}}">
                            <a href="javascript:void(0);" class="has-arrow"><i class="fa fa-list-alt" aria-hidden="true"></i><span>Posts</span></a>
                            <ul>
                                <li><a href="javascript:void(0);">Add</a></li>
                                <li><a href="javascript:void(0);">Edit</a></li>
                            </ul>
                        </li>
                        <li class="{{Request::is('admin/orders*')? 'active' : ''}}">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-layers"></i> <span>Orders</span></a>
                            <ul>
                                <li><a href="javascript:void(0);">Add</a></li>
                                <li><a href="javascript:void(0);">Edit</a></li>
                            </ul>
                        </li>

                        <li class="{{Request::is('admin/review-management*')? 'active' : ''}}">
                            <a href="javascript:void(0);" class="has-arrow"><i class="fa fa-star" aria-hidden="true"></i><span>Review Management</span></a>
                            <ul>
                                <li><a href="javascript:void(0);">Add</a></li>
                                <li><a href="javascript:void(0);">Edit</a></li>
                            </ul>
                        </li>
                        <li class="{{Request::is('admin/coupons*')? 'active' : ''}}">
                            <a href="javascript:void(0);" class="has-arrow"><i class="fa fa-ticket" aria-hidden="true"></i><span>Coupons</span></a>
                            <ul>
                                <li><a href="javascript:void(0);">Add</a></li>
                                <li><a href="javascript:void(0);">Edit</a></li>
                            </ul>
                        </li>
                        <li class="{{Request::is('admin/users*')? 'active' : ''}}">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-users" aria-hidden="true"></i><span>Users</span></a>
                            <ul>
                                <li><a href="javascript:void(0);">Add</a></li>
                                <li><a href="javascript:void(0);">Edit</a></li>
                            </ul>
                        </li>
                        <li class="{{Request::is('admin/comments*')? 'active' : ''}}">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-bubbles" aria-hidden="true"></i><span>Comments</span></a>
                            <ul>
                                <li><a href="javascript:void(0);">Add</a></li>
                                <li><a href="javascript:void(0);">Edit</a></li>
                            </ul>
                        </li>

                        <li class="{{Request::is('admin/settings*')? 'active' : ''}}">
                            <a href="javascript:void(0);"><i class="fa fa-wrench" aria-hidden="true"></i> <span>Settings</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="tab-pane p-l-15 p-r-15" id="Chat">
                <form>
                    <div class="input-group m-b-20">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </form>
                <ul class="right_chat list-unstyled">
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object "
                                    src="{{asset('assets/backend/images/xs/avatar4.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Chris Fox</span>
                                    <span class="message">Designer, Blogger</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object "
                                    src="{{asset('assets/backend/images/xs/avatar5.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Joge Lucky</span>
                                    <span class="message">Java Developer</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="offline">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object "
                                    src="{{asset('assets/backend/images/xs/avatar2.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Isabella</span>
                                    <span class="message">CEO, Thememakker</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="offline">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object "
                                    src="{{asset('assets/backend/images/xs/avatar1.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Folisise Chosielie</span>
                                    <span class="message">Art director, Movie Cut</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object "
                                    src="{{asset('assets/backend/images/xs/avatar3.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Alexander</span>
                                    <span class="message">Writter, Mag Editor</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-pane p-l-15 p-r-15" id="setting">
                <h6>Choose Skin</h6>
                <ul class="choose-skin list-unstyled">
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="cyan" class="active">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="blush">
                        <div class="blush"></div>
                        <span>Blush</span>
                    </li>
                </ul>
                <hr>
                <h6>General Settings</h6>
                <ul class="setting-list list-unstyled">
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Report Panel Usag</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox" checked>
                            <span>Email Redirect</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox" checked>
                            <span>Notifications</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Auto Updates</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Offline</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Location Permission</span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="tab-pane p-l-15 p-r-15" id="question">
                <form>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </form>
                <ul class="list-unstyled question">
                    <li class="menu-heading">HOW-TO</li>
                    <li><a href="javascript:void(0);">How to Create Campaign</a></li>
                    <li><a href="javascript:void(0);">Boost Your Sales</a></li>
                    <li><a href="javascript:void(0);">Website Analytics</a></li>
                    <li class="menu-heading">ACCOUNT</li>
                    <li><a href="javascript:void(0);">Cearet New Account</a></li>
                    <li><a href="javascript:void(0);">Change Password?</a></li>
                    <li><a href="javascript:void(0);">Privacy &amp; Policy</a></li>
                    <li class="menu-heading">BILLING</li>
                    <li><a href="javascript:void(0);">Payment info</a></li>
                    <li><a href="javascript:void(0);">Auto-Renewal</a></li>
                    <li class="menu-button m-t-30">
                        <a href="javascript:void(0);" class="btn btn-primary"><i class="icon-question"></i> Need
                            Help?</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
