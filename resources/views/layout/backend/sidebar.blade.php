<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ URL::asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->full_name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      @if(Auth::user()->role == 3)      
      <li {{ \Request::route()->getName() == "settings.noti" ? "class=active" : "" }}>
        <a href="{{ route('settings.noti') }}">
          <i class="fa fa-pencil-square-o"></i> 
          <span>Thông báo chung</span>         
        </a>       
      </li>
      @endif
      <li class="treeview {{ in_array(\Request::route()->getName(), ['product.index', 'product.create', 'product.edit', 'estate-type.index', 'estate-type.edit', 'estate-type.create', 'cate.index', 'cate.edit', 'cate.create']) ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-opencart"></i> 
          <span>Bất động sản</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li {{ in_array(\Request::route()->getName(), ['product.index', 'product.edit']) ? "class=active" : "" }}><a href="{{ route('product.index') }}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          <li {{ \Request::route()->getName() == "product.create" ? "class=active" : "" }}><a href="{{ route('product.create') }}"><i class="fa fa-circle-o"></i> Thêm BĐS</a></li>         
          @if(Auth::user()->role > 1)
          <li {{ in_array(\Request::route()->getName(), ['estate-type.index', 'estate-type.edit', 'estate-type.create']) ? "class=active" : "" }}><a href="{{ route('estate-type.index') }}"><i class="fa fa-circle-o"></i> Danh mục</a></li>
          @endif
        </ul>
      </li>
      <li {{ in_array(\Request::route()->getName(), ['pro-content.index', 'pro-content.create', 'pro-content.edit', 'landing-projects.index', 'landing-projects.create', 'landing-projects.edit']) ? "class=active" : "" }}>
        <a href="{{ route('landing-projects.index') }}">
          <i class="fa fa-pencil-square-o"></i> 
          <span>Dự án (Landing page)</span>         
        </a>       
      </li>
      <li {{ in_array(\Request::route()->getName(), ['product.kygui']) ? "class=active" : "" }}>
        <a href="{{ route('product.kygui') }}">
          <i class="fa fa-pencil-square-o"></i> 
          <span>Tin ký gửi</span>         
        </a>       
      </li>
      <li {{ in_array(\Request::route()->getName(), ['cart.create', 'cart.edit', 'cart.index','cart-product.create', 'cart-product.edit', 'cart-product.index']) ? "class=active" : "" }}>
        <a href="{{ route('cart.index') }}">
          <i class="fa fa-pencil-square-o"></i> 
          <span>Giỏ hàng</span>         
        </a>       
      </li>       
      <li class="treeview {{ in_array(\Request::route()->getName(), ['work-group.create', 'work-group.edit', 'work-group.index', 'user-work.create', 'user-work.edit', 'user-work.index']) ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-twitch"></i> 
          <span>Công việc</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li {{ in_array(\Request::route()->getName(), ['user-work.create', 'user-work.edit', 'user-work.index']) ? "class=active" : "" }}><a href="{{ route('user-work.index') }}"><i class="fa fa-circle-o"></i> Công việc </a></li>
          @if(Auth::user()->role > 1)
          <li {{ in_array(\Request::route()->getName(), ['work-group.create', 'work-group.edit', 'work-group.index']) ? "class=active" : "" }}><a href="{{ route('work-group.index') }}"><i class="fa fa-circle-o"></i> Nhóm công việc</a></li>          
          @endif
        </ul>
      </li>
      @if(Auth::user()->role > 1)
      <li {{ in_array(\Request::route()->getName(), ['customer.edit', 'customer.index']) ? "class=active" : "" }}>
        <a href="{{ route('customer.index') }}">
          <i class="fa fa-pencil-square-o"></i> 
          <span>Khách hàng</span>         
        </a>       
      </li>
      <li {{ (in_array(\Request::route()->getName(), ['custom-link.edit', 'custom-link.index', 'custom-link.create']) && isset($block_id) && $block_id == 1 )? "class=active" : "" }}>
        <a href="{{ route('custom-link.index', ['block_id' => 1 ]) }}">
          <i class="fa fa-pencil-square-o"></i> 
          <span>Liên kết nổi bật</span>         
        </a>       
      </li>
      @endif
      
      <li class="treeview {{ in_array(\Request::route()->getName(), ['pages.index', 'pages.create']) ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-twitch"></i> 
          <span>Trang</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li {{ in_array(\Request::route()->getName(), ['pages.index', 'pages.edit']) ? "class=active" : "" }}><a href="{{ route('pages.index') }}"><i class="fa fa-circle-o"></i> Trang</a></li>
          <li {{ in_array(\Request::route()->getName(), ['pages.create']) ? "class=active" : "" }}><a href="{{ route('pages.create') }}"><i class="fa fa-circle-o"></i> Thêm trang</a></li>          
        </ul>
      </li>
      
      <li class="treeview {{ in_array(\Request::route()->getName(), ['articles.index', 'articles.create', 'articles.edit','articles-cate.create', 'articles-cate.index', 'articles-cate.edit']) ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-pencil-square-o"></i> 
          <span>Bài viết</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li {{ in_array(\Request::route()->getName(), ['articles.edit', 'articles.index']) ? "class=active" : "" }}><a href="{{ route('articles.index') }}"><i class="fa fa-circle-o"></i> Bài viết</a></li>
          <li {{ in_array(\Request::route()->getName(), ['articles.create']) ? "class=active" : "" }} ><a href="{{ route('articles.create', ['cate_id' => 1]) }}"><i class="fa fa-circle-o"></i> Thêm bài viết</a></li>
          @if(Auth::user()->role == 3)
        <li {{ in_array(\Request::route()->getName(), ['articles-cate.create', 'articles-cate.index', 'articles-cate.edit']) ? "class=active" : "" }} ><a href="{{ route('articles-cate.index') }}"><i class="fa fa-circle-o"></i> Danh mục bài viết</a></li>      
        @endif    
        </ul>
       
      </li>      
        <li {{ in_array(\Request::route()->getName(), ['tag.edit', 'tag.index']) ? "class=active" : "" }}>
          <a href="{{ route('tag.index') }}">
            <i class="fa fa-pencil-square-o"></i> 
            <span>Tags / Tiện ích</span>          
          </a>       
        </li>
        
      @if(Auth::user()->role > 1)
      <li {{ in_array(\Request::route()->getName(), ['newsletter.edit', 'newsletter.index']) ? "class=active" : "" }}>
        <a href="{{ route('newsletter.index') }}">
          <i class="fa fa-pencil-square-o"></i> 
          <span>Newsletter</span>         
        </a>       
      </li>

      <li {{ in_array(\Request::route()->getName(), ['contact.edit', 'contact.index']) ? "class=active" : "" }}>
        <a href="{{ route('contact.index') }}">
          <i class="fa fa-pencil-square-o"></i> 
          <span>Liên hệ</span>          
        </a>       
      </li>
      @endif
      @if(Auth::user()->role == 3)
      <li {{ in_array(\Request::route()->getName(), ['banner.list', 'banner.edit', 'banner.create']) ? "class=active" : "" }}>
        <a href="{{ route('banner.list') }}">
          <i class="fa fa-file-image-o"></i> 
          <span>Banner</span>          
        </a>       
      </li>      
      @endif
      @if(Auth::user()->role > 1)
      <li class="treeview {{ in_array(\Request::route()->getName(), ['account.index', 'info-seo.index', 'settings.index', 'settings.noti']) || (in_array(\Request::route()->getName(), ['custom-link.edit', 'custom-link.index', 'custom-link.create']) && isset($block_id) && $block_id == 2 ) ? 'active' : '' }}">
        <a href="#">
          <i class="fa  fa-gears"></i>
          <span>Cài đặt</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @if(Auth::user()->role == 3)
        
          <li {{ \Request::route()->getName() == "settings.index" ? "class=active" : "" }}><a href="{{ route('settings.index') }}"><i class="fa fa-circle-o"></i> Thông tin NhaDat</a></li>
          <li {{ (in_array(\Request::route()->getName(), ['custom-link.edit', 'custom-link.index', 'custom-link.create']) && isset($block_id) && $block_id == 2 )? "class=active" : "" }}>
            <a href="{{ route('custom-link.index', ['block_id' => 2 ]) }}">
              <i class="fa fa-circle-o"></i>
              <span>Link Footer</span>         
            </a>       
          </li>
          <li {{ \Request::route()->getName() == "info-seo.index" ? "class=active" : "" }}><a href="{{ route('info-seo.index') }}"><i class="fa fa-circle-o"></i> Cài đặt SEO</a></li>
          @endif
          <li {{ \Request::route()->getName() == "account.index" ? "class=active" : "" }}><a href="{{ route('account.index') }}"><i class="fa fa-circle-o"></i> Users</a></li>          
        </ul>
      </li>
      @endif
      <!--<li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<style type="text/css">
  .skin-blue .sidebar-menu>li>.treeview-menu{
    padding-left: 15px !important;
  }
</style>