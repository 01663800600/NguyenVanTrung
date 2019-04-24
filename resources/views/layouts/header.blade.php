<header class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <!-- Logo -->
                    <a class="navbar-brand" href=""> <img  width="10%" src="img/core-img/Logo.JPG" alt="Logo" class="img-thumbnail" > VietHanIT một điểm tựa</a>
                    <!-- Navbar Toggler -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <!-- Navbar -->
                    <div class="collapse navbar-collapse" id="worldNav">
                        <ul class="navbar-nav ml-auto">

                            @if(Auth::check())
                            <li class="nav-item active">

                                <h6 class="nav-link">Chào : {{ Auth::user()->name }} <a  href="#" data-toggle="modal" data-target="#logoutModal">Đăng Xuất </a><span class="sr-only">(current)</span></h6>
                            </li>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="friend.php">Bạn bè</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">Profile</a>
                            </li>
                            
                            @else
                            <li class="nav-item active">
                                <a class="nav-link" href="login">Đăng nhập <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dangky">Đăng ký</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Diễn đàng </a>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Giới thiệu</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="single-blog.html">Giới thiệu website</a>
                                    <a class="dropdown-item" href="single-blog.html">Giới thiệu Người dùng</a>
                                    <a class="dropdown-item" href="regular-page.html">Giới thiệu nhóm học</a>
                                </div>
                            </li>
                        </ul>
                        <!-- Search Form  -->
                        <div id="search-wrapper">
                            <form action="#">
                                <input type="text" id="search" placeholder="Search something...">
                                <div id="close-icon"></div>
                                <input class="d-none" type="submit" value="">
                            </form>
                        </div>
                    </div>

                </nav>
            </div>
        </div>


    </div>
</header>