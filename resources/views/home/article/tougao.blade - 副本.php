@extends('home.index')  
@section('content')

    <link rel="stylesheet" href="/homes/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="/homes/kindeditor/themes/simple/simple.css" />
    <div class="article col-xs-12 col-sm-8 col-md-8">
    <div id="publishBarArea" class="publishBarArea"style="margin-top: 100px;">
    <form action="/home/article/store" method="post"enctype="multipart/form-data">
      <div class="textareawrap">
         <center>
          <textarea type="text" class="title"name="title" id="title" placeholder=" 请填写标题" maxlength="32"style="height: 50px;display: block;width: 700px;margin:auto;outline: none;border:1px solid #ccc;color: #333;font-size: 30px;border-radius: 20px;"></textarea></br>
        
            <textarea id="editor_id" name="content" style="width:700px;height:300px;margin-left:300px;border-radius: 10px;">&lt;strong&gt;请输入内容&lt;/strong&gt;
            </textarea>
              {{csrf_field()}}
              <input type="submit" name="" style="color: #fff;
    background: #000;width: 90px;
    height: 30px;
    line-height: 25px;
    margin: 10px 0;
    border-radius: 30px;
    font-size: 16px;
    text-align: center;">
          </center>

      </div>
    </form>
  </div>
  </div>
           <div class="sidebar col-xs-12 col-sm-4 col-md-4"">
                  <div class="widget suxingme_topic">
            <h3><span>推荐专题</span></h3>
            <ul class="widget_suxingme_topic">
                      <li> <a href="#" title="wordpress主题推荐">
                        <div class="overlay"></div>
                        <div class="image" style="background-image: url(/homes/images/13.jpg);"></div>
                        <div class="title">
                        <h4>wordpress主题推荐</h4>
                        <div class="meta"><span>查看专题</span></div>
                      </div>
                        </a> </li>
                    </ul>
            <ul class="widget_suxingme_topic">
                      <li> <a href="#" title="wordpress视频主题">
                        <div class="overlay"></div>
                        <div class="image" style="background-image: url(/homes/images/5.jpg);"></div>
                        <div class="title">
                        <h4>wordpress视频主题</h4>
                        <div class="meta"><span>查看专题</span></div>
                      </div>
                        </a> </li>
                    </ul>
            <ul class="widget_suxingme_topic">
                      <li> <a href="#" title="wordpress杂志主题">
                        <div class="overlay"></div>
                        <div class="image" style="background-image: url(/homes/images/6.jpg);"></div>
                        <div class="title">
                        <h4>wordpress杂志主题</h4>
                        <div class="meta"><span>查看专题</span></div>
                      </div>
                        </a> </li>
                    </ul>
          </div>
                  <div class="widget widget_suxingme_postlist">
            <h3><span>最新文章</span></h3>
            <ul class="recent-posts-widget">
                      <li class="one"> <a href="#" title="响应式个人杂志WordPress博客主题">
                        <div class="overlay"></div>
                        <img class="lazy" src="/homes/images/18.jpg" alt="响应式个人杂志WordPress博客主题" />
                        <div class="title"> <span>2017-10-25</span>
                        <h4>响应式个人杂志WordPress博客主题</h4>
                      </div>
                        </a> </li>
                      <li class="others">
                <div class="image"><a href="#" title="Magneto响应WordPress杂志和博客主题"> <img class="lazy" src="/homes/images/9.jpg" alt="Magneto响应WordPress杂志和博客主题" /> </a></div>
                <div class="title">
                          <h4><a href="#" title="Magneto响应WordPress杂志和博客主题">Magneto响应WordPress杂志和博客主题</a></h4>
                          <span>2017-10-25</span> </div>
              </li>
                      <li class="others">
                <div class="image"><a href="#" title="Linx - WordPress博客和杂志的主题"> <img class="lazy" src="/homes/images/10.jpg" alt="Linx - WordPress博客和杂志的主题" /> </a></div>
                <div class="title">
                          <h4><a href="#" title="Linx - WordPress博客和杂志的主题">Linx - WordPress博客和杂志的主题</a></h4>
                          <span>2017-10-25</span> </div>
              </li>
                      <li class="others">
                <div class="image"><a href="#" title="个人生活博客和杂志的WordPress主题"> <img class="lazy" src="/homes/images/11.jpg" alt="个人生活博客和杂志的WordPress主题" /> </a></div>
                <div class="title">
                          <h4><a href="#" title="个人生活博客和杂志的WordPress主题">个人生活博客和杂志的WordPress主题</a></h4>
                          <span>2017-10-25</span> </div>
              </li>
                      <li class="others">
                <div class="image"><a href="#" title="Penta响应博客的WordPress主题"> <img class="lazy" src="/homes/images/12.jpg" alt="Penta响应博客的WordPress主题" /> </a></div>
                <div class="title">
                          <h4><a href="#" title="Penta响应博客的WordPress主题">Penta响应博客的WordPress主题泄漏</a></h4>
                          <span>2017-10-25</span> </div>
              </li>
                    </ul>
          </div>
                            <div class="widget suxingme_social">
            <h3><span>关注我们 么么哒！</span></h3>
            <div class="attentionus">
                      <ul class="items clearfix">
                <span class="social-widget-link social-link-weibo"> <span class="social-widget-link-count"><i class="icon-weibo"></i>maolai博客</span> <span class="social-widget-link-title">新浪微博</span> <a href="http://www.lmlblog.com" target="_blank" rel="nofollow" ></a></span> <span class="social-widget-link social-link-tencent-weibo"> <span class="social-widget-link-count"><i class="icon-tencent-weibo"></i>maolai博客</span> <span class="social-widget-link-title">腾讯微博</span> <a href="http://www.lmlblog.com" target="_blank" rel="nofollow" ></a> </span> <span class="social-widget-link social-link-qq"> <span class="social-widget-link-count"><i class="icon-qq"></i>2195335317</span> <span class="social-widget-link-title">QQ号</span> <a href="http://wpa.qq.com/msgrd?v=3&uin=2195335317&site=qq&menu=yes" rel="nofollow" ></a> </span> <span class="social-widget-link social-link-email"> <span class="social-widget-link-count"><i class="icon-mail"></i>lmlblog@qq.com</span> <span class="social-widget-link-title">QQ邮箱</span> <a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=lmlblog@qq.com" target="_blank" rel="nofollow" ></a> </span> <span class="social-widget-link social-link-wechat"> <span class="social-widget-link-count"><i class="icon-wechat"></i>lmlblog</span> <span class="social-widget-link-title">微信公众号</span> <a id="tooltip-s-weixin" href="javascript:void(0);"></a> </span>
              </ul>
                    </div>
          </div>
                </div>
                
            </div>
  

            <script charset="utf-8" src="/homes/kindeditor/kindeditor-all.js"></script>
<script charset="utf-8" src="/homes/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="/homes/kindeditor/lang/zh-CN.js"></script>
<script>
       
         var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#editor_id', {
                        themeType : 'simple'
                });
        });
</script>
    @stop