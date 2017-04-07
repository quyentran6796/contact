 
<html>

<head>
    <title>CONTACT US FAU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset('foostart/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset('foostart/js/jquery-1.11.0.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('foostart/js/bootstrap.js')}}" type="text/javascript"></script>

    <?php
    if (!class_exists('lessc')) {
        include ('foostart/libs/lessc.inc.php');
    }
    $less = new lessc;
    $less->compileFile('foostart/less/type-11.less', 'foostart/css/type-11.css');
    ?>
    <link href="{{asset('foostart/css/nivo-slider.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('foostart/css/type-11.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset('foostart/js/jquery-migrate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('foostart/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
    <script src="{{asset('//cloud.tinymce.com/stable/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({

        selector: 'textarea', // change this value according to your HTML
        plugin: 'a_tinymce_plugin',
        a_plugin_option: true,
        a_configuration_option: 400
    });
</script>

</head>
<body>
    <div class="type-11">
        <div class="row">
            <div class="heading">
                <!--TITLE-->
                <div class="p-title">
                    <h2>Thức ăn gia súc gia cầm</h2>
                </div>
                <!--END TITLE-->
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="row"> 
                    <div class="the-content">
                        <div id="infoDealer" class="infoContact clearfix">
                            <div class="info_dealer info_contact">
                                <div>
                                    <!--INFOR COMPANY-->
                                    <div itemscope="" itemtype="http://schema.org/Organization">
                                        <p class="name" itemprop="name">CÔNG TY TNHH NÔNG NGHIỆP QUỐC TẾ FAU</p>
                                        <p class="address" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">Số 71, Hà Huy Giáp, Khu Văn Hải, Long Thành, Đồng Nai</p>
                                        <p class="address2">Số 78/79, đường Huỳnh Mẫn Đạt, ấp Bình Hóa, xã Hóa An, Biên Hòa, Đồng Nai</p>
                                        <p class="phone" itemprop="telephone">0613 955 982</p>
                                        <p class="fax" itemprop="faxNumber">0613 955 972</p>
                                        <p class="email" itemprop="email">aufeed.fau@gmail.com</p>
                                        <p class="website" itemprop="url">www.fau.com.vn</p>
                                    </div>
                                    <!--END INFO COMPANY-->
                                </div>
                                <div class="Qcode">
                                    <img src="http://chart.apis.google.com/chart?chf=a,s,000000|bg,s,FFFFFF&amp;chs=150x150&amp;chld=M|1&amp;cht=qr&amp;chl=BEGIN%3AVCARD%0AVERSION%3A2.1%0AN%3A%0AORG%3AC%C3%94NG+TY+TNHH+N%C3%94NG+NGHI%E1%BB%86P+QU%E1%BB%90C+T%E1%BA%BE+FAU%0ATITLE%3A%0ATEL%3BWORK%3BVOICE%3A0613+955+982%0ATEL%3BHOME%3BVOICE%3A0613+955+972%0AEMAIL%3BPREF%3BINTERNET%3Aaufeed.fau%40gmail.com%0AURL%3Awww.fau.com.vn%0ANOTE%3AS%E1%BB%91+71%2C+H%C3%A0+Huy+Gi%C3%A1p%2C+Khu+V%C4%83n+H%E1%BA%A3i%2C+Long+Th%C3%A0nh%2C+%C4%90%E1%BB%93ng+Nai%0AEND%3AVCARD&amp;choe=UTF-8">
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="clear"></div>
                        </div>
                        <div class="formContact">
                            <div id="formContact" class="form validate">
                                <div class="row">
                                    {!! Form::open([ 'method' => 'post',
                                    'route' => 'send',
                                    'id' => @$contact->contact_id,
                                    'files'=>true])!!}
                                    <!-- SAMPLE NAME TEXT-->
                                    
                                    <div class="row-form col-md-7 col-sm-9 col-xs-12">
                                        <label for="name">Họ tên <span>(*)</span></label>
                                        <input type="text"  class="form-control" name="contact_name" >
                                        <div class="clear"></div>
                                    </div>

                                    <!--EMAIL-->
                                    <div class="row-form col-md-7 col-sm-9 col-xs-12">
                                        <label>Email <span>(*)</span></label>
                                        <input type="text" name="contact_email" id="email" class="form-control" value="">
                                        <div class="clear"></div>
                                    </div>
                                    <!--END EMAIL-->
                                    <!--PHONE-->
                                    <div class="row-form col-md-7 col-sm-9 col-xs-12">
                                        <label class="l-phone" for="phone">Điện thoại </label>
                                        <input type="text"   class="form-control" name="contact_phone">
                                        <div class="clear"></div>
                                    </div>
                                    <!--END PHONE-->
                                    <!--COMPANY-->
                                    <div class="row-form col-md-7 col-sm-9 col-xs-12">
                                        <label for="company">Công ty</label>
                                        <input type="text"  class="form-control" name="contact_company">
                                        <div class="clear"></div>
                                    </div>
                                    <!--END COMPANY-->
                                    <!--CONTENT CONTACT-->
                                    <div class="row-form col-md-7 col-sm-9 col-xs-12">
                                        <label for="f-content">Nội dung liên lạc <span>(*)</span></label>
                                        <textarea class="form-control" name="contact_message"></textarea>
                                        <div class="clear"></div>
                                    </div>
                                    <!--END CONTENT CONTACT-->
                                    
                                    
                                    <!-- /END SAMPLE NAME TEXT -->
                                    <div class="col-md-6 col-xs-12 under_form" style="
                                    padding:14px;
                                    float:left;">
                                    {!! Form::hidden('id',@$contact->contact_id) !!}
                                    <!-- SAVE BUTTON -->
                                    {!! Form::submit('Gửi', array("class"=>"btn")) !!}
                                    
                                    <button type="reset" class="btn"  ><span>Làm lại</span></button>
                                    <!-- /SAVE BUTTON -->
                                    {!! Form::close()!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>