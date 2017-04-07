<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
  <title>TODO supply a title</title>
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
$less->compileFile('foostart/less/type-10.less', 'foostart/css/type-10.css');
?>
<link href="{{asset('foostart/css/nivo-slider.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('foostart/css/type-10.css')}}" rel="stylesheet" type="text/css"/>
<script src="{{asset('foostart/js/jquery-migrate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('foostart/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
</head>
<body>
  <div class="type-10">
    <div class="row">
      <div class="heading">
        <!--TITLE-->
        <div class="p-title">
          <h2>NỘI DUNG ĐÃ GỬI</h2>
        </div>
        <!--END TITLE-->
      </div>
    </div>
    <div class="row">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <div class="row"> 
              <div class="the-content">
                <div class="table-hiring">
                  <table>
                    <thead>
                      <!--TITLE TABLE-->
                      <tr>

                        <th>STT</th>
                        <th>HỌ VÀ TÊN</th>
                        <th>EMAIL</th>
                        <th style="width: 10%;">SỐ ĐIỆN THOẠI</th>
                        <th style="width: 15%;">CÔNG TY</th>
                        <th style="width: 20%;">LỜI NHẮN</th>
                        <th style="width:170px;">TÙY CHỌN</th>
                      </tr>
                      <!--END TITLE TABLE-->
                    </thead>
                    
                    <?php foreach($contact as $contact): ?>
                      <tbody>

                        <!--CONTENT TABLE-->
                        <tr>
                          <td><?php echo $contact->contact_id ?></td>
                          <td><?php echo $contact->contact_name ?></td>
                          <td><?php echo $contact->contact_email ?></td>
                          <td><?php echo $contact->contact_phone ?></td>
                          <td><?php echo $contact->contact_company ?></td>
                          <td><?php echo $contact->contact_message ?></td>
                          <td>
                            <a style="margin: 2px;" href="{!! URL::route('contact.edit',['id' => $contact->contact_id, '_token' => csrf_token()]) !!}"
                             class="btn btn-info pull-right margin-left-5">
                             EDIT </a>
                             <a style="margin: 2px;" href="{!! URL::route('contact.delete',['id' => $contact->contact_id, '_token' => csrf_token()]) !!}"
                               class="btn btn-danger pull-right margin-left-5">
                               DELETE </a>
                             </td>
                           </tr>
                           <!--END CONTENT TABLE-->
                         </tbody>
                       <?php endforeach; ?>
                     </table>
                      
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-md-2">
               <div class="row">
                <div class="panel panel-info" style="margin-top: 30px; margin-left: 5px;" >
                  <div class="panel-heading">
                    <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('contact::contact_admin.page_search_front') ?></h3>
                  </div>
                  <div class="panel-body">

                    {!! Form::open(['route' => 'detail','method' => 'get']) !!}

                    <!--TITLE-->
                    <div class="form-group">
                      {!! Form::label('contact_name', trans('contact::contact_admin.contact_name_label_front')) !!}
                      {!! Form::text('contact_name', @$params['contact_name'], ['class' => 'form-control', 'placeholder' => trans('contact::contact_admin.contact_name_placeholder_front')]) !!}
                    </div>

                    <!--/END TITLE-->
                    {!! Form::submit(trans('contact::contact_admin.frontsearch').'', ["class" => "btn btn-info pull-right"]) !!}
                    {!! Form::close() !!}
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
