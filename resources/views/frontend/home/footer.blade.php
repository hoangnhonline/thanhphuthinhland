<footer class="footer">
	<div class="block-menu-bottom">
        <ul class="container">
            <li><a href="#" rel="nofollow">Giới thiệu</a></li>
            <li><a href="#" rel="nofollow">Hướng dẫn sử dụng</a></li>
            <li><a href="#" rel="nofollow">Quy định</a></li>
            <li><a href="#" rel="nofollow">Liên hệ</a></li>
            
            <li><a href="#" rel="nofollow">Điều khoản thỏa thuận</a></li>
            <li><a href="#" rel="nofollow">Báo giá</a></li>
        </ul>
    </div>
    <div class="container">
    	<div class="block-footer row">
    		<div class="block-logo-footer col-sm-4">
                <a href="/" title="Đô thị">
                	<img src="http://thanhphuthinhland/uploads/2017/06/13/logopl-1497290939.png" alt="">
                </a>

            </div>
            <div class="block-footer-address col-sm-4">
                <address>
					{!! $settingArr['cty_info'] !!}
				</address>
            </div>
            <div class="block-menu-bottom-bottom col-sm-4">
				<label>Thông Tin Mua Bán</label>
                <ul>
                	@if($footerLink)
                	@foreach($footerLink as $link)
					<li><a href="{{ $link->link_url }}" title="{!! $link->link_text !!}">{!! $link->link_text !!}</a></li>
					@endforeach
					@endif
                </ul>
<!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,3844607,4,1,120,40,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3844607&101" alt="" border="0"></a></noscript>
<!-- Histats.com  END  -->
            </div>
    	</div>
    </div>
    <!--<div class="block-info-bottom">
    	<div class="container">
    		<p><strong>CÔNG TY CỔ PHẦN MUA BÁN</strong>. MST: 0102344810, cấp ngày 10/08/2007. SĐT: 08-73001234</p>
    		<p><strong>Trụ sở chính</strong> Số 28-30 Đường số 2, khu phố Hưng Gia 5, phường Tân Phong, Quận 7, TP. Hồ Chí Minh</p>
    		<p>muaban.net có trách nhiệm chuyển tải thông tin. Không chịu bất kỳ trách nhiệm nào từ các tin này. <a href="#" title="">xem chi tiết</a></p>
    	</div>
    </div>-->
</footer><!-- /footer -->