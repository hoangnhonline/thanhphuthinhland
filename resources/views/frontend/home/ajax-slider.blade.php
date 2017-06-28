<div class="container">
    <div class="row">
        <div class="col-sm-3 slider-left"></div>
        <div class="col-sm-9 header-top-right">
            <div class="homeslider">
                <div class="content-slide">
                    <?php 
                    $bannerArr = DB::table('banner')->where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
                    ?>
                    @if($bannerArr)
                    <ul id="contenhomeslider">
                      @foreach($bannerArr as $banner)
                      <li>
                      @if($banner->ads_url !='')
                      <a href="{{ $banner->ads_url }}">
                      @endif
                      <img alt="Funky roots" src="{{ Helper::showImage($banner->image_url) }}" title="Funky roots">
                      @if($banner->ads_url !='')
                      </a>
                      @endif
                      </li>
                      @endforeach                        
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>